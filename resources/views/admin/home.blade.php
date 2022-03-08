@extends('layouts.app')

@section('titlePage')
    Dashboard
@endsection

@section('content')
@if(Session::has('pesan'))
    <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
@endif
<div class="row">
    <div class="col-12">
        <h3><b>Report progress</b></h3>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ count($siswa) }}</h3>

                <p>Akun Terdaftar</p>
            </div>
            <!-- <div class="small-box-footer">Akun</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $dataDiriLengkap }}</h3>

                <p>Data Diri Lengkap</p>
            </div>
            <!-- <div class="small-box-footer">Formulir PMS</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $registrasi }}</h3>

                <p>Siswa Registrasi</p>
            </div>
            <!-- <div class="small-box-footer">Pendaftaran MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $menungguVerifikasiPembayaranFormulir }}</h3>

                <p>Menunggu Verifikasi Pembayaran Formulir</p>
            </div>
            <!-- <div class="small-box-footer">Pendaftaran PMS</div> -->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $menungguDiterima }}</h3>

                <p>Menunggu di Terima</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $diterima }}</h3>

                <p>Siswa Diterima</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $menungguVerifikasiPembayaranDaftarUlang }}</h3>

                <p>Menunggu Verifikasi Pembayaran Daftar Ulang</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $sudahDiterimadiSekolah }}</h3>

                <p>Di Terima Di Sekolah</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>

    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $tidakDiterima }}</h3>

                <p>Siswa Tidak Diterima</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <h3><b>Report Akhir</b></h3>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>@uang($rupiahDariFormulir)</h3>

                <p>Total Rupiah dari Formulir</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>@uang($hasilDariDaftarUlang)</h3>

                <p>Total Rupiah dari Daftar Ulang</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>

    {{-- <!-- @php
        for($i = 0; $i < count($namaJurusan); $i++){
            @endphp
                <div class="col-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahSiswaDiterimaDijurusan[$i] }}</h3>

                            <p>Siswa diterima dari Jurusan {{ $namaJurusan[$i] }}</p>
                        </div>
                        <!-- <div class="small-box-footer">Formulir MM</div> -->
                    </div>
                </div>
            @php
        }
    @endphp --> --}}

</div>
@endsection
