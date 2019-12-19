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
            'email' => 'required', 'string', 'email', 'max:191', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'password_confirmation' => 'required', 'same:password'
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
        $validation = Validator::make($data,[
            "nama" => "required|max:191",
            "alamat" => "required|max:191",
            "asal_sekolah" => "required|max:191",
            "tgl_lahir" => "required|date",
            "no_hp" => "required|max:20",
            "kelompok" => "required",
            "email" => "required|max:191|unique:users",
            "password" => "required|min:8|max:191",
            "password_confirmation" => "required|same:password"
        ])->validate();

        $maxpeserta = User::max('no_ujian');
        if($maxpeserta == 0) {
            $maxpeserta = 1;
        }
        $noujian = sprintf("%09s",abs($maxpeserta +1));

        $request = request();
        // $file = Image::make($request->file('foto'))->resize(240,320)->insert('pas_foto','public');
        $file = $request->file('foto')->store('pas_foto', 'public');
        return User::create([
            'nama' => $data['nama'],
            'no_ujian' => $noujian,
            'alamat' => $data['alamat'],
            'foto_url' => $file,
            'kelas' => $data['kelas'],
            'tgl_lahir' => $data['tgl_lahir'],
            'no_hp' => $data['no_hp'],
            'kelompok' => $data['kelompok'],
            'asal_sekolah' => $data['asal_sekolah'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
