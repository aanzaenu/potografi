<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->title = 'Profil';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = file_get_contents(public_path('json/mobiles.json'));
        $json = json_decode($datas);
        $array = array();
        $nomor = 0;
        $bren = '';
        foreach($json as $key=>$value)
        {
            if($bren == $value->brand){
                continue;
            }else{
                $array[$nomor]['brand'] = $value->brand;
                $nomor++;
            }
            $bren = $value->brand;
        }
        $data['brands'] = $array;
        $data['row'] = Auth::user();
        $data['title'] = $this->title." - ".env('APP_NAME', 'Awesome Website');
        $data['pagetitle'] = $this->title;
        return view('backend.users.edit', $data);
    }
    public function update(Request $request, User $user)
    {
        $passwordv = '';
        if($request->input('password'))
        {
            $passwordv = ['required', 'min:8'];
        }
        
        $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id . ',id'],
                'password' => $passwordv,
                'phone' => ['required', 'max:255'],
                'dob' => ['required'],
                'phone_name' => ['required'],
                'phone_series' => ['required'],
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 8 karakter',
                'phone.required' => 'No.Telepon harus diisi',
                'dob.required' => 'Tempat Tanggal Lahir harus diisi',
                'phone_name.required' => 'Merk Handphone/Smartphone tidak boleh kosong',
                'phone_series.required' => 'Seri Handphone/Smartphone tidak boleh kosong',
            ]
        );
        $dob = date('Y-m-d', strtotime($request->input('dob')));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password'))
        {
            $user->password = Hash::make($request->input('password'));
        }
        $user->phone = $request->input('phone');
        $user->dob = $dob;
        $user->phone_name = $request->input('phone_name');
        $user->phone_series = $request->input('phone_series');
        $user->description = $request->input('description');
        if($user->save())
        {

            $request->session()->flash('success', 'Sukses update '.$this->title);
        }else{
            $request->session()->flash('error', 'Error saat update '.$this->title.'!');
        }
        return redirect()->back();
    }
}
