<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image as Img;
use App\Image;
use File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->uri = 'images';
        $this->title = 'Foto';
    }
    public function create()
    {
        return view('images.upload');
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
            $image->desctiption = $request->desctiption;
            $image->save();
            $request->session()->flash('success', $this->title.' baru ditambahkan');
        }else{
            $request->session()->flash('error', 'Error saat menambah '.$this->title.'!');
        }
        return redirect()->route('home');
    }
}
