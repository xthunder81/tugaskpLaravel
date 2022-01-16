<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaAdminController extends Controller
{

    public function index()
    {
        $siswa = Siswa::get();
        return view('admin.siswa.index', compact('siswa'));
    }


    public function create()
    {
        return view('admin.siswa.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'unique:siswa|required|max:10|min:10',
            'email' => 'unique:siswa|required|email',
            'password' => 'required|min:8',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telp' => 'required',
            'nomor_hp' => 'required',
            'agama' => 'required|in:Islam,Kristen Katolik,Kristen Protestan,Hindu, Buddha,Kong Hu Cu',
            'asal_smp' => 'required',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama' => ucwords(strtolower($request->nama)),
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telp' => $request->nomor_telp,
            'nomor_hp' => $request->nomor_hp,
            'agama' => $request->agama,
            'asal_smp' => $request->asal_smp,
        ]);

        return redirect(route('admin.siswa'))->with('success', 'Berhasil Menambah Siswa');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|max:10|min:10',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telp' => 'required',
            'nomor_hp' => 'required',
            'agama' => 'required|in:Islam,Kristen Katolik,Kristen Protestan,Hindu, Buddha,Kong Hu Cu',
            'asal_smp' => 'required',
        ]);

        Siswa::find($id)->update([
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama' => ucwords(strtolower($request->nama)),
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_telp' => $request->nomor_telp,
            'nomor_hp' => $request->nomor_hp,
            'agama' => $request->agama,
            'asal_smp' => $request->asal_smp,
        ]);

        return redirect(route('admin.siswa'))->with('success', 'Berhasil Mengedit Siswa');

    }


    public function destroy($id)
    {
            $siswa = Siswa::findOrFail($id);
            $siswa->delete();

            return redirect(route('admin.siswa'))->with('success','Siswa Berhasil dihapus');
    }

    public function resetPassword($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->password = bcrypt("1234567890");
        $siswa->save();

        return redirect(route('admin.siswa'))->with('success','Berhasil mereset password menjadi 1234567890');
    }
}
