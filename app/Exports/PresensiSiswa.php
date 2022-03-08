<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class PresensiSiswa implements FromView, WithTitle
{

    public function view(): View
    {
        $daftarulang = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 1)
        ->where('pembayaran.status_pembayaran', 1)
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.presensi', compact('daftarulang'));
    }

    public function title(): string
    {
        return "Presensi Siswa";
    }
}
