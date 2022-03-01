<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required'
        ]);

        if(\Auth()->guard('admin')->attempt(['nip' => $request->nip, 'password' => $request->password, 'status_admin' => 1])){
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with(['jenis' => 'danger','pesan' => 'Gagal login. NIP atau Password salah']);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('admin.login');
    }
}
