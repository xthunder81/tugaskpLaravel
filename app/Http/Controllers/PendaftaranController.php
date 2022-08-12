<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Siswa;
use App\Formulir;
use App\Pendaftaran;
use Illuminate\Support\Facades\DB;
use PDF;

class PendaftaranController extends Controller
{
    public function index(){
        $pendaftaran = DB::table('pendaftarans')
        ->select('pendaftarans.*','formulirs.*', 'users.*', 'siswas.*', 'jurusans.*')
        ->join('formulirs', 'formulirs.id_formulir','=','pendaftarans.formulir_id')
        ->join('users', 'users.id','=','formulirs.user_id')
        ->join('siswas', 'siswas.id_siswa','=','formulirs.siswa_id')
        ->join('jurusans', 'jurusans.id_jurusan','=','formulirs.jurusan_id')
        ->get();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function create(){
        $formulir = DB::table('formulirs')
        ->select('formulirs.*', 'users.*', 'siswas.*', 'jurusans.*')
        ->join('users', 'users.id','=','formulirs.user_id')
        ->join('siswas', 'siswas.id_siswa','=','formulirs.siswa_id')
        ->join('jurusans', 'jurusans.id_jurusan','=','formulirs.jurusan_id')
        ->get();

        return view('admin.pendaftaran.create', compact('formulir'));
    }

    public function store(Request $req){
        $petugas = \Auth::user()->id;
        $id_formulir = $req->get('formulir');
        $kaos_olahraga = $req->get('kaos_olahraga') == "on"? 1 : 0;
        $jas_almamater = $req->get('jas_almamater') == "on"? 1 : 0;
        $topi = $req->get('topi') == "on"? 1 : 0;
        $ikat_pinggang = $req->get('ikat_pinggang') == "on"? 1 : 0;
        $baju_batik = $req->get('baju_batik') == "on"? 1 : 0;
        $baju_praktik = $req->get('baju_praktik') == "on"? 1 : 0;
        $rompi = $req->get('rompi') == "on"? 1 : 0;
        $dasi = $req->get('dasi') == "on"? 1 : 0;

        $pendaftaran = new Pendaftaran();
        $pendaftaran->formulir_id = $id_formulir;
        $pendaftaran->user_id = $petugas;
        $pendaftaran->kaos_olahraga = $kaos_olahraga;
        $pendaftaran->jas_almamater = $jas_almamater;
        $pendaftaran->jas_almamater = $jas_almamater;
        $pendaftaran->topi = $topi;
        $pendaftaran->ikat_pinggang = $ikat_pinggang;
        $pendaftaran->baju_batik = $baju_batik;
        $pendaftaran->baju_praktik = $baju_praktik;
        $pendaftaran->rompi = $rompi;
        $pendaftaran->dasi = $dasi;
        $pendaftaran->save();

        return redirect()->route('pendaftaran');
    }

    public function show($id){
        // $formulir = Formulir::where('id_formulir', $id)->firstOrFail();
        // dd($formulir);
    }

    public function print($id){
        $pendaftaran = DB::table('pendaftarans')
        ->select('pendaftarans.*','formulirs.*', 'users.*', 'siswas.*', 'gelombangs.*')
        ->join('formulirs', 'formulirs.id_formulir','=','pendaftarans.formulir_id')
        ->join('users', 'users.id','=','pendaftarans.user_id')
        ->join('siswas', 'siswas.id_siswa','=','formulirs.siswa_id')
        ->join('gelombangs', 'gelombangs.id_gelombang','=','formulirs.gelombang_id')
        ->where('id_pendaftaran', $id)
        ->first();

        $pdf = PDF::loadView('admin.pendaftaran.print', compact('pendaftaran'));
        $pdf->setOption('margin-top',4);
        $pdf->setOption('margin-bottom',2);
        // $pdf->setOption('margin-left',3);
        // $pdf->setOption('margin-right',3);
        $pdf->setPaper('A5', 'landscape');
        return $pdf->stream('Kwitansi-Pendaftaran-'.$pendaftaran->nama.'.pdf');
    }
}
