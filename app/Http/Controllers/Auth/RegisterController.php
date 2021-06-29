<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    #protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'max:255'],
            'dob' => ['required'],
            'phone_name' => ['required'],
            'phone_series' => ['required'],
        ],[
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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $dob = date('Y-m-d', strtotime($data['dob']));
        $createuser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'dob' => $dob,
            'phone_name' => $data['phone_name'],
            'phone_series' => $data['phone_series'],
            'description' => $data['description'],
        ]);
        
        $createuser->roles()->attach(3);
        return $createuser;
    }
    public function showRegistrationForm()
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
        return view('auth.register', $data);
    }
}
