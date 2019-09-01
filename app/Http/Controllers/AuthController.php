<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginPage() {
    	// return view('login');
    }

    public function login() {
    	// action here
    }

    public function showRegisterPage() {
    	$program_studi = \App\ProgramStudi::all();
    	return view('auth.register', compact('program_studi'));
    }

    public function register(Request $request) {
    	$min_year = (int)date('Y')-10;
    	$request->validate([
            'nim' => 'required|numeric|digits:8|unique:mahasiswa',
    		'no_ktp' => 'required|numeric|digits:16|unique:mahasiswa',
    		'nama' => 'required',
    		'tanggal_lahir' => 'required|date',
    		'tempat_lahir' => 'required',
    		'jenis_kelamin' => 'required',
    		'no_telepon_hp' => 'required|numeric',
    		'no_telepon_rumah' => 'nullable|numeric',
    		'asal_kabupaten' => 'required',
    		'alamat_asal' => 'required',
			'alamat_sekarang' => 'required',
			'kode_program_studi' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required' 
    	]);

        $user_body = $request->only('email', 'password');
        $user_body['password'] = Hash::make($user_body['password']);
        $user_body = array_merge($user_body, ['role' => 2]);
        $user = User::create($user_body);
        $mahasiswa_body = array_merge($request->all(), ['user_id' => $user->id]);
    	$mahasiswa = Mahasiswa::create($mahasiswa_body);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(Auth::check()) {
            return redirect('/home');
        }

        return redirect(url()->previous());
    }
}
