<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image as Img;
use App\Image;
use App\User;
use File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->uri = 'images';
        $this->title = 'Foto';
        $this->role = 3;
    }
    public function index()
    {
        $data['title'] = $this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = $this->title;
        $data['lists'] = Image::orderBy('id', 'DESC')->paginate(20);
        $data['users'] = User::whereHas('roles', function($query){
            $query->where('roles.id', $this->role);
        })->orderBy('name', 'ASC')->paginate(100);
        return view('backend.'.$this->uri.'.list', $data);
    }
    public function search(Request $request)
    {
        if(!$request->get('query') && !$request->get('peserta'))
        {
            return redirect()->route('panel.image.index');
        }
        $data['title'] = 'Pencarian '.$this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = $this->title;
        $model = Image::with('user');
        if($request->get('query'))
        {
            $model->where(function($query) use ($request){
                return $query->where('images.description', 'like', '%'.strip_tags($request->get('query')).'%');
            });
        }
        if($request->get('peserta'))
        {
            $model->where('owner', $request->get('peserta'));
        }
        $data['lists'] = $model->paginate(20);
        $data['users'] = User::whereHas('roles', function($query){
            $query->where('roles.id', $this->role);
        })->orderBy('name', 'ASC')->paginate(100);
        return view('backend.'.$this->uri.'.list', $data);
    }
    public function create()
    {
        $data['title'] = 'Unggah '.$this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = 'Unggah '.$this->title;
        return view('backend.'.$this->uri.'.create', $data);
    }
    public function store(Request $request, Image $image)
    {
        $validasi = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,JPEG,PNG,JPG,GIF,SVG|max:20046',
            ],[
                'file.required' => 'Gambar tidak boleh kosong',
                'file.mimes' => 'File tidak didukung',
                'file.max' => 'Ukuran maksimal 20Mb',
            ]);
        if($validasi->validate())
        {
            $id = Auth::user()->id;
            $img = Img::make($request->file);
            $path = 'assets/images/'.$id.'/';
            $dir = public_path($path);
            if(!File::isDirectory($dir))
            {
                File::makeDirectory($dir);
            }
            $file_name = Str::slug($request->file->getClientOriginalName(), '-').'-'.time();
            $name = $file_name.$request->file->extension();
            $img->save($dir.$name);
            
            $image->owner = $id;
            $image->path = $path.$name;
            $image->desctiption = trim($request->desctiption);
            $image->save();
            $request->session()->flash('success', $this->title.' baru ditambahkan');
        }else{
            $request->session()->flash('error', 'Error saat menambah '.$this->title.'!');
        }
        return redirect()->route('panel.image.index');
    }
    public function edit(Image $image)
    {
        $data['title'] = 'Ubah '.$this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = 'Ubah '.$this->title;
        $data['row'] = $image;
        return view('backend.'.$this->uri.'.edit', $data);
    }
    public function update(Request $request, Image $image)
    {
        $image->desctiption = trim($request->desctiption);
        if($image->save())
        {
            $request->session()->flash('success', 'Sukses Update '.$this->title);
        }else{
            $request->session()->flash('error', 'Error saat Update '.$this->title.'!');
        }
        return redirect()->route('panel.image.index');
    }
    public function destroy(Request $request, Image $image)
    {
        $path = public_path($image->path);
        $isExists = File::exists($path);
        if($isExists)
        {
            File::delete($path);
        }
        $image->delete();
        $request->session()->flash('success', $this->title.' dihapus!');
        return redirect()->route('panel.image.index');
    }
}
