<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'nama' => 'required', 'string', 'max:191',
            'alamat' => 'required', 'string', 'max:191',
            'tgl_lahir' => 'required', 'date',
            'no_hp' => 'required', 'string', 'max:20',
            'kelompok' => 'required',
            'asal_sekolah' => 'required','max:191',
            'no_ujian' => '',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed'
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
        $maxpeserta = User::max('no_ujian');
        if($maxpeserta == 0) {
            $maxpeserta = 1;
        }
        $noujian = sprintf("%09s",abs($maxpeserta +1)); 
        return User::create([
            'nama' => $data['nama'],
            'no_ujian' => $noujian,
            'alamat' => $data['alamat'],
            'tgl_lahir' => $data['tgl_lahir'],
            'no_hp' => $data['no_hp'],
            'kelompok' => $data['kelompok'],
            'asal_sekolah' => $data['asal_sekolah'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
