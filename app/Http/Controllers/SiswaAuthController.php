<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Siswa;

class SiswaAuthController extends Controller
{
    use AuthenticatesUsers;

	public function signup(){
		return view('siswa.register');
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'nisn' => 'required|digits_between:10,10|unique:siswa,nisn',
            'nama' => 'required|min:3',
            'email' => 'required|min:6|unique:siswa',
            'password' => 'required|min:6'
        ]);

        DB::table('siswa')->insert([
			// 'nisn' => $request->nisn,
			'nama' => $request->nama,
			'email' => $request->email,
			'password' => bcrypt($request->password)
		]);

		return redirect()->route('siswa.login')->with(['jenis' => 'success','pesan' => 'Berhasil Daftar, Silahkan Log in']);
    }

    public function login()
    {
        return view('siswa.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if(\Auth()->guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('siswa.predaftar');
        }

        return redirect()->back()->with(['jenis' => 'danger','pesan' => 'Gagal login. NISN atau Password salah']);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('siswa.login');
    }
}
