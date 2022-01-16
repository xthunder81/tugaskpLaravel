@extends('layouts.siswa')

@section('titlePage')
    Riwayat Pendaftaran
@endsection

@section('content')
    @if(Session::has('pesan'))
        <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Pendaftaran</th>
                <th>Nomor Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach($riwayat as $g)
                <tr>
                    <td>{{ $g->nama_gelombang }} {{ $g->nama_jurusan }} - {{ $g->nama_tahun_ajaran }}</td>
                    <td>{{ $g->id_pendaftaran }}</td>
                    <td>

                        @if($status[$no] == 1)
                        <!-- 1 -->

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#BayarFormulir{{ $g->id_pendaftaran }}"> Bayar Formulir</button>

                        <div class="modal fade" id="BayarFormulir{{ $g->id_pendaftaran }}" tabindex="-1" role="dialog" aria-labelledby="BayarFormulirLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="BayarFormulirLabel">Bayar Formulir</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Petunjuk Pembayaran : <br>
                                    1. Transfer
                                        <ul>
                                            <li>Transfer uang sejumlah @uang(env("HARGAFORMULIR", "")) ke rekening berikut :
                                                    {!! env("REKENING", "") !!}
                                            </li>
                                            <li>Upload bukti transfer berupa foto struk/tangkap layar pada kolom dibawah ini</li>
                                                <form action="{{ route('siswa.bayar.formulir') }}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_pendaftaran" value="{{ $g->id_pendaftaran }}">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="BuktiBayarFormulir{{ $g->id_pendaftaran }}" aria-describedby="BuktiBayarFormulirAddon{{ $g->id_pendaftaran }}" accept="application/pdf,image/*">
                                                                <label class="custom-file-label" id="namaFile{{ $g->id_pendaftaran }}" for="BuktiBayarFormulir{{ $g->id_pendaftaran }}">Upload Bukti Pembayaran Formulir</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="submit" id="BuktiBayarFormulirAddon{{ $g->id_pendaftaran }}"><i class="fas fa-upload"></i> Unggah</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            <li>Tunggu verifikasi dari admin 1x 24 Jam</li>
                                            <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#BuktiBayarFormulir{{ $g->id_pendaftaran }}").change(function (e) {
                                                        var geekss = e.target.files[0].name;
                                                        $("namaFile{{ $g->id_pendaftaran }}").text(geekss);
                                                        document.getElementById("namaFile{{ $g->id_pendaftaran }}").innerHTML = geekss;
                                                    });
                                                });
                                            </script>
                                        </ul>
                                    2. Bayar Di Loket
                                        <ul>
                                            <li>Bayar ke loket sejumlah @uang(env("HARGAFORMULIR", ""))</li>
                                            <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                        </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @elseif($status[$no] == 2)
                            <p>Menunggu Verifikasi Pembayaran dari Admin...</p>
                        @elseif($status[$no] == 3)
                        <!-- 2 -->
                            <p>Pembayaran Sudah Di Verifikasi, Silahkan tunggu proses seleksi...</p>
                        <!-- <a href="{{ route('siswa.printFormulir', $g->id_pendaftaran) }}" class="btn btn-primary btn-sm">Download Formulir</a>
                        <a href="#" class="btn btn-primary btn-sm">Download Nomor Ujian</a> -->
                        @elseif($status[$no] == 4)
                        <!-- 3 -->
                        <p>Pembayaran Anda Tidak Valid Silahkan Upload Bukti Pembayaran Dengan Benar</p>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#BayarFormulir{{ $g->id_pendaftaran }}"> Bayar Formulir</button>

                        <div class="modal fade" id="BayarFormulir{{ $g->id_pendaftaran }}" tabindex="-1" role="dialog" aria-labelledby="BayarFormulirLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="BayarFormulirLabel">Bayar Formulir</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Petunjuk Pembayaran :<br>
                                    1. Transfer
                                        <ul>
                                            <li>Transfer uang sejumlah @uang(env("HARGAFORMULIR", "")) ke rekening berikut :
                                                    {!! env("REKENING", "") !!}
                                            </li>
                                            <li>Upload bukti transfer berupa foto struk/tangkap layar pada kolom dibawah ini</li>
                                                <form action="{{ route('siswa.bayar.formulir') }}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_pendaftaran" value="{{ $g->id_pendaftaran }}"">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="BuktiBayarFormulir{{ $g->id_pendaftaran }}" aria-describedby="BuktiBayarFormulirAddon{{ $g->id_pendaftaran }}"  accept="application/pdf,image/*">
                                                                <label class="custom-file-label" id="namaFile{{ $g->id_pendaftaran }}" for="BuktiBayarFormulir{{ $g->id_pendaftaran }}">Upload Bukti Pembayaran Formulir</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary" type="submit" id="BuktiBayarFormulirAddon{{ $g->id_pendaftaran }}"><i class="fas fa-upload"></i> Unggah</button>
                                                            </div>

                                                        </div>
                                                </form>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#BuktiBayarFormulir{{ $g->id_pendaftaran }}").change(function (e) {
                                                        var geekss = e.target.files[0].name;
                                                        $("namaFile{{ $g->id_pendaftaran }}").text(geekss);
                                                        document.getElementById("namaFile{{ $g->id_pendaftaran }}").innerHTML = geekss;
                                                    });
                                                });
                                            </script>
                                            <li>Tunggu verifikasi dari admin 1x 24 Jam</li>
                                            <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                        </ul>
                                    2. Bayar Di Loket
                                        <ul>
                                            <li>Bayar ke loket sejumlah @uang(env("HARGAFORMULIR", ""))</li>
                                            <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                        </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @elseif($status[$no] == 5)
                            <p>Selamat Anda dinyatakan Lolos seleksi : </p>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#BayarDaftarUlang{{ $g->id_pendaftaran }}"> Bayar Daftar Ulang</button>

                            <div class="modal fade" id="BayarDaftarUlang{{ $g->id_pendaftaran }}" tabindex="-1" role="dialog" aria-labelledby="BayarDaftarUlangLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="BayarDaftarUlangLabel">Bayar Daftar Ulang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Petunjuk Pembayaran :<br>
                                        1. Transfer
                                            <ul>
                                                <li>Transfer uang sejumlah @uang($g->biaya) ke rekening berikut :
                                                    {!! env("REKENING", "") !!}
                                                </li>
                                                <li>Upload bukti transfer berupa foto struk/tangkap layar pada kolom dibawah ini</li>
                                                    <form action="{{ route('siswa.bayar.daftarUlang') }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id_pendaftaran" value="{{ $g->id_pendaftaran }}"">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input" id="BayarBuktiDaftarUlang{{ $g->id_pendaftaran }}" aria-describedby="BayarBuktiDaftarUlangAddon{{ $g->id_pendaftaran }}" accept="application/pdf,image/*">
                                                                    <label class="custom-file-label"  id="namaFile{{ $g->id_pendaftaran }}" for="BayarBuktiDaftarUlang{{ $g->id_pendaftaran }}">Upload Bukti Pembayaran Daftar Ulang</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary" type="submit" id="BayarBuktiDaftarUlangAddon{{ $g->id_pendaftaran }}"><i class="fas fa-upload"></i>  Unggah</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#BayarDaftarUlang{{ $g->id_pendaftaran }}").change(function (e) {
                                                            var geekss = e.target.files[0].name;
                                                            $("namaFile{{ $g->id_pendaftaran }}").text(geekss);
                                                            document.getElementById("namaFile{{ $g->id_pendaftaran }}").innerHTML = geekss;
                                                        });
                                                    });
                                                </script>
                                                <li>Tunggu verifikasi dari admin 1x 24 Jam</li>
                                                <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                            </ul>
                                        2. Bayar Di Loket
                                            <ul>
                                                <li>Bayar ke loket sejumlah @uang($g->biaya)</li>
                                                <li>Selalu cek Menu Riwayat Pendaftaran untuk langkah selanjutnya</li>
                                            </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        @elseif($status[$no] == 6)
                            <p>Menunggu Verifikasi Pembayaran dari Admin...</p>
                        @elseif($status[$no] == 7)
                            <p>Selamat Anda sudah menjadi siswa di sekolah ini</p>
                            <p>{!! env('INFOSELANJUTNYA', '') !!}</a></p>
                        @elseif($status[$no] == 8)
                            <p>Anda Tidak Di Terima Di Sekolah Ini</p>
                        @endif

                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
