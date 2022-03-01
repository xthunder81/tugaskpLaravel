@extends('layouts.app')

@section('titlePage')
    Lihat Daftar Ulang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">

            <table class="table bordered">
                <tr>
                    <td>Nomor Pendaftaran</td>
                    <td>:</td>
                    <td>{{ $formulir->id_pendaftaran }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $formulir->nisn }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $formulir->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $formulir->alamat_domisili }}</td>
                </tr>
                <tr>
                    <td>TTL </td>
                    <td>:</td>
                    <td>{{ $formulir->tempat_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $formulir->tanggal_lahir)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td>:</td>
                    <td>{{ $formulir->jenis_kelamin == 'L' ? "Laki - Laki" : "Perempuan" }}</td>
                </tr>
                <tr>
                    <td>Nomor Telp </td>
                    <td>:</td>
                    <td>{{ $formulir->nomor_telp }}</td>
                </tr>
                <tr>
                    <td>Nomor HP </td>
                    <td>:</td>
                    <td>{{ $formulir->nomor_hp }}</td>
                </tr>
                <tr>
                    <td>Agama </td>
                    <td>:</td>
                    <td>{{ $formulir->agama }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah </td>
                    <td>:</td>
                    <td>{{ $formulir->asal_smp }}</td>
                </tr>
                <tr>
                    <td>Status Keluarga</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->status_keluarga){
                                case 0:
                                    echo "Anak Kandung";
                                    break;
                                case 1:
                                    echo "Anak Angkat";
                                    break;
                                case 2:
                                    echo "Anak Yatim";
                                    break;
                                case 3:
                                    echo "Anak Piatu";
                                    break;
                                case 4:
                                    echo "Anak Yatim Piatu";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Kebutuhan Khusus</td>
                    <td>:</td>
                    <td>{{ $formulir->kebutuhan_khusus }}</td>
                </tr>
                <tr>
                    <td>foto </td>
                    <td>:</td>
                    <td><img src="{{ url('file/siswa/' . $formulir->id_siswa . '/' . $formulir->foto) }}" alt="Foto Siswa" style="width: 300px; height: auto;"></td>
                </tr>

                <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Ayah</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pendidikan_ayah){
                                case 0:
                                    echo "Tidak Sekolah";
                                    break;
                                case 1:
                                    echo "Putus SD";
                                    break;
                                case 2:
                                    echo "SD Sederajat";
                                    break;
                                case 3:
                                    echo "SMP Sederajat";
                                    break;
                                case 4:
                                    echo "SMA Sederajat";
                                    break;
                                case 5:
                                    echo "D1";
                                    break;
                                case 6:
                                    echo "D2";
                                    break;
                                case 7:
                                    echo "D3";
                                    break;
                                case 8:
                                    echo "D4/S1";
                                    break;
                                case 9:
                                    echo "S1";
                                    break;
                                case 10:
                                    echo "S2";
                                    break;
                                case 11:
                                    echo "S3";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pekerjaan_ayah){
                                case 0:
                                    echo "Tidak Bekerja";
                                    break;
                                case 1:
                                    echo "Nelayan";
                                    break;
                                case 2:
                                    echo "Petani";
                                    break;
                                case 3:
                                    echo "Peternak";
                                    break;
                                case 4:
                                    echo "PNS/TNI/Polri";
                                    break;
                                case 5:
                                    echo "Karyawan Swasta";
                                    break;
                                case 6:
                                    echo "Pedagang Kecil";
                                    break;
                                case 7:
                                    echo "Pedagang Besar";
                                    break;
                                case 8:
                                    echo "Wiraswasta";
                                    break;
                                case 9:
                                    echo "Wirausaha";
                                    break;
                                case 10:
                                    echo "Buruh";
                                    break;
                                case 11:
                                    echo "Pensiunan";
                                    break;
                                case 12:
                                    echo "Meninggal Dunia";
                                    break;
                                case 13:
                                    echo "Lain-Lain";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Gaji Ayah</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->gaji_ayah){
                                case 0:
                                    echo "Kurang dari Rp. 500.000";
                                    break;
                                case 1:
                                    echo "Rp. 500.000 - Rp. 1.000.000";
                                    break;
                                case 2:
                                    echo "Rp. 1.000.000 - Rp. 2.000.000";
                                    break;
                                case 3:
                                    echo "Rp. 2.000.000 - Rp. 5.000.000";
                                    break;
                                case 4:
                                    echo "Rp. 5.000.000 - Rp. 20.000.000";
                                    break;
                                case 5:
                                    echo "Lebih dari Rp. 2.000.000";
                                    break;
                                case 6:
                                    echo "Meninggal Dunia";
                                    break;
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Ibu</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pendidikan_ibu){
                                case 0:
                                    echo "Tidak Sekolah";
                                    break;
                                case 1:
                                    echo "Putus SD";
                                    break;
                                case 2:
                                    echo "SD Sederajat";
                                    break;
                                case 3:
                                    echo "SMP Sederajat";
                                    break;
                                case 4:
                                    echo "SMA Sederajat";
                                    break;
                                case 5:
                                    echo "D1";
                                    break;
                                case 6:
                                    echo "D2";
                                    break;
                                case 7:
                                    echo "D3";
                                    break;
                                case 8:
                                    echo "D4/S1";
                                    break;
                                case 9:
                                    echo "S1";
                                    break;
                                case 10:
                                    echo "S2";
                                    break;
                                case 11:
                                    echo "S3";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->pekerjaan_ibu){
                                case 0:
                                    echo "Tidak Bekerja";
                                    break;
                                case 1:
                                    echo "Nelayan";
                                    break;
                                case 2:
                                    echo "Petani";
                                    break;
                                case 3:
                                    echo "Peternak";
                                    break;
                                case 4:
                                    echo "PNS/TNI/Polri";
                                    break;
                                case 5:
                                    echo "Karyawan Swasta";
                                    break;
                                case 6:
                                    echo "Pedagang Kecil";
                                    break;
                                case 7:
                                    echo "Pedagang Besar";
                                    break;
                                case 8:
                                    echo "Wiraswasta";
                                    break;
                                case 9:
                                    echo "Wirausaha";
                                    break;
                                case 10:
                                    echo "Buruh";
                                    break;
                                case 11:
                                    echo "Pensiunan";
                                    break;
                                case 12:
                                    echo "Meninggal Dunia";
                                    break;
                                case 13:
                                    echo "Lain-Lain";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Gaji Ibu</td>
                    <td>:</td>
                    <td>
                        <?php
                            switch($formulir->gaji_ibu){
                                case 0:
                                    echo "Kurang dari Rp. 500.000";
                                    break;
                                case 1:
                                    echo "Rp. 500.000 - Rp. 1.000.000";
                                    break;
                                case 2:
                                    echo "Rp. 1.000.000 - Rp. 2.000.000";
                                    break;
                                case 3:
                                    echo "Rp. 2.000.000 - Rp. 5.000.000";
                                    break;
                                case 4:
                                    echo "Rp. 5.000.000 - Rp. 20.000.000";
                                    break;
                                case 5:
                                    echo "Lebih dari Rp. 2.000.000";
                                    break;
                                case 6:
                                    echo "Meninggal Dunia";
                                    break;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Mendaftar  </td>
                    <td>:</td>
                    <td>{{ $formulir->nama_gelombang }} {{ $formulir->nama_jurusan }}</td>
                </tr>
                <tr>
                    <td>Dokumen  </td>
                    <td>:</td>
                    <td>
                        <ul>
                                @foreach($dokumen as $d)
                                    <li>
                                        @if($dok_siswa[$loop->index] != null)
                                            <a href="{{ url('file/siswa/' . $dok_siswa[$loop->index]['siswa_Id'] . '/' . $dok_siswa[$loop->index]['file_dokumen']) }}" target="_blank">{{ $d->nama_dokumen  }}</a>
                                        @else
                                            Siswa Belum Mengupload Dokumen {{ $d->nama_dokumen }}
                                        @endif
                                    </li>
                                @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Nilai  </td>
                    <td>:</td>
                    <td>
                        <ul>
                                @foreach($nilai as $n)
                                    <li>
                                        @if($nil_siswa[$loop->index] != null)
                                            {{ $n->nama_nilai }} : {{ $nil_siswa[$loop->index]['nilai'] }}
                                        @else
                                            Siswa Belum Mengupload Nilai {{ $n->nama_nilai }}
                                        @endif
                                    </li>
                                @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Bukti Pembayaran Daftar Ulang  </td>
                    <td>:</td>
                    <td>
                        <ul>
                            @if($formulir->bukti_pembayaran != null)
                                <a href="{{ url('file/siswa/' . $formulir->siswa_id . '/' . $formulir->bukti_pembayaran) }}" target="_blank">Bukti Pembayaran</a>
                            @else
                                Siswa Belum mengupload Bukti Pembayaran
                            @endif
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td>
                        <style>span a{color:#fff;}</style>
                            @if($formulir->status_pembayaran == 1)
                            <span class="badge badge-success" style="line-height: normal;">Siswa Ini sudah Diterima Pembayarannya Silahkan Cetak Presensi Di Menu <a href="{{ route('admin.unduhpresensi') }}">"Unduh Presensi"</a></span>
                            @else
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-check"></i> Verifikasi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin Ingin Verifikasi Siswa Ini? Cek bukti bayar Daftar Ulang  jika siswa menggunakan metode transfer. Jika menggunakan metode pembayaran diloket bisa langsung diverifikasi.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.daftarulang.verifikasi', $formulir->id_pendaftaran) }}"><i class="fas fa-check"></i> Verifikasi</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            @endif
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
@endsection
