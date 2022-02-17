@extends('layouts.siswa')

@section('titlePage')
Data Diri
@endsection

@section('content')

<style>
    .form-control:focus {
        border-color: #5cb85c;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(24, 213, 109, 0.5);
    }

</style>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            @if(Session::has('pesan'))
                <p class="alert alert-{{ Session::get('jenis') }}">
                    {{ Session::get('pesan') }}</p>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('siswa.predaftarProses') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <h3 class=""><b>Data Siswa</b></h3>

                    <div class="form-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik"
                                    value="{{ $siswa->nik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap"
                                    name="nama" value="{{ $siswa->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email"
                                    name="email" value="{{ $siswa->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_ktp">Alamat Sesuai KTP / KK</label>
                                <textarea class="form-control" id="alamat_ktp"
                                    placeholder="Masukkan Alamat Sesuai KTP / KK" name="alamat"
                                    required>{{ $siswa->alamat_ktp }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Domisili</label>
                                <textarea class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat"
                                    required>{{ $siswa->alamat_domisili }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <p class="h6 mt-2 alert-warning p-2">*Upload foto 3x4 Formal ukuran file maksimal 2 MB</p>
                            <div class="card">
                                <div class="imgWrap">
                                    @if($siswa->foto == null)
                                        <img id="image-preview" src="{{ url('img/user.png') }}"
                                            class="card-img-top img-fluid" width="100px" />
                                    @else
                                        <img id="image-preview"
                                            src="{{ url('file/siswa/' . $siswa->id_siswa . '/' . $siswa->foto) }}"
                                            class="card-img-top img-fluid" width="100px" />
                                    @endif
                                </div>

                                <div class="card-body">
                                    <div class="custom-file">
                                        <input type="file" name="foto" id="image-source" onchange="previewImage();"
                                            class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" id="namafile" for="inputFile">Foto</label>
                                    </div>
                                </div>
                                <script>
                                    function previewImage() {
                                        document.getElementById("image-preview").style.display = "block";
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                                        oFReader.onload = function (oFREvent) {
                                            document.getElementById("image-preview").src = oFREvent.target.result;
                                        };
                                    };
                                    $(document).ready(function () {
                                        $('input[type="file"]').change(function (e) {
                                            var geekss = e.target.files[0].name;
                                            $("namafile").text(geekss);
                                            document.getElementById("namafile").innerHTML = geekss;
                                        });
                                    });

                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir"
                                placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                                value="{{ $siswa->tempat_lahir }}" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control cdp" id="tanggal_lahir"
                                placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir"
                                value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') }}"
                                required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-control" style="width: 100%;" name="jenis_kelamin"
                                value="{{ $siswa->jenis_kelamin }}" required>
                                <option value="none" selected disabled hidden> Pilih Jenis Kelamin </option>
                                <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nomor_telp">Nomor Telpon</label>
                            <input type="text" class="form-control" id="nomor_telp" placeholder="Masukkan Nomor Telpon"
                                name="nomor_telp" value="{{ $siswa->nomor_telp }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nomor_hp">Nomor HP/WA</label>
                            <input type="text" class="form-control" id="nomor_hp" placeholder="Masukkan Nomor HP/WA"
                                name="nomor_hp" value="{{ $siswa->nomor_hp }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="asal_sd">Asal SD</label>
                            <input type="text" class="form-control" id="asal_sd" placeholder="Masukkan Asal SD"
                                name="asal_sd" value="{{ $siswa->asal_sd }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat_sekolah">Alamat Asal SD</label>
                            <input type="text" class="form-control" id="alamat_sekolah"
                                placeholder="Masukkan Alamat Asal SD" name="alamat_sekolah"
                                value="{{ $siswa->alamat_sekolah }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status_tempattinggal">Status Tempat Tinggal</label>
                            <select name="status_tempattinggal" class="form-control"
                                data-placeholder="Pilih Transportasi..." value="{{ $siswa->status_keluarga }}"
                                required>
                                {{-- <option value="" selected disabled hidden>Status Tempat TInggal...</option> --}}
                                <option value="0" @if ($siswa->status_tempattinggal == 0) selected @endif>Orang Tua
                                </option>
                                <option value="1" @if ($siswa->status_tempattinggal == 1) selected @endif>Kos
                                </option>
                                <option value="2" @if ($siswa->status_tempattinggal == 2) selected @endif>Kerabat
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transportasi">Transportasi</label>
                            <select name="transportasi[]" class="select2 select2-purple"
                                multiple="multiple" data-dropdown-css-class="select2-success"
                                data-placeholder="Pilih Transportasi..." style="width: 100%;" tags="true">
                                {{-- <option value="" selected disabled hidden>Pilih Transportasi...</option> --}}
                                <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->transportasi))?
                                    'selected' : '' @endphp>Tidak Ada / Jalan Kaki</option>
                                <option value="Diantarkan Orang Tua (Motor)" @php echo in_array('Diantarkan Orang Tua
                                    (Motor)', explode('|', $siswa->transportasi))?
                                    'selected' : '' @endphp>Diantarkan Orang Tua (Motor)</option>
                                <option value="Diantarkan Orang Tua (Mobil)" @php echo in_array('Diantarkan Orang Tua
                                    (Mobil)', explode('|', $siswa->transportasi))?
                                    'selected' : '' @endphp>Diantarkan Orang Tua (Mobil)</option>
                                <option value="Bersepeda" @php echo in_array('Bersepeda', explode('|', $siswa->transportasi))?
                                    'selected' : '' @endphp>Bersepeda</option>
                                <option value="Ojek Online" @php echo in_array('Ojek Online', explode('|', $siswa->transportasi))?
                                    'selected' : '' @endphp>Ojek Online</option>

                            </select>
                        </div>
                    </div>


                    <h3 class="mt-5"><b>Data Orang Tua</b></h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah"
                                name="nama_ayah" value="{{ $siswa->nama_ayah }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu"
                                name="nama_ibu" value="{{ $siswa->nama_ibu }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pendidikan_ayah">Pendidikan Ayah</label>
                            <select name="pendidikan_ayah" class="form-control" value="{{ $siswa->pendidikan_ayah }}"
                                required>
                                <option value="" selected disabled hidden>Pilih Pendidikan Ayah...</option>
                                <option value="0" @if ($siswa->pendidikan_ayah == 0) selected @endif>Tidak Sekolah
                                </option>
                                <option value="1" @if ($siswa->pendidikan_ayah == 1) selected @endif>Putus SD</option>
                                <option value="2" @if ($siswa->pendidikan_ayah == 2) selected @endif>SD Sederajat
                                </option>
                                <option value="3" @if ($siswa->pendidikan_ayah == 3) selected @endif>SMP Sederajat
                                </option>
                                <option value="4" @if ($siswa->pendidikan_ayah == 4) selected @endif>SMA Sederajat
                                </option>
                                <option value="5" @if ($siswa->pendidikan_ayah == 5) selected @endif>D1</option>
                                <option value="6" @if ($siswa->pendidikan_ayah == 6) selected @endif>D2</option>
                                <option value="7" @if ($siswa->pendidikan_ayah == 7) selected @endif>D3</option>
                                <option value="8" @if ($siswa->pendidikan_ayah == 8) selected @endif>D4/S1</option>
                                <option value="9" @if ($siswa->pendidikan_ayah == 9) selected @endif>S2</option>
                                <option value="10" @if ($siswa->pendidikan_ayah == 10) selected @endif>S3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pendidikan_ibu">Pendidikan Ibu</label>
                            <select name="pendidikan_ibu" class="form-control" value="{{ $siswa->pendidikan_ibu }}"
                                required>
                                <option value="" selected disabled hidden>Pilih Pendidikan Ibu...</option>
                                <option value="0" @if ($siswa->pendidikan_ibu == 0) selected @endif>Tidak Sekolah
                                </option>
                                <option value="1" @if ($siswa->pendidikan_ibu == 1) selected @endif>Putus SD</option>
                                <option value="2" @if ($siswa->pendidikan_ibu == 2) selected @endif>SD Sederajat
                                </option>
                                <option value="3" @if ($siswa->pendidikan_ibu == 3) selected @endif>SMP Sederajat
                                </option>
                                <option value="4" @if ($siswa->pendidikan_ibu == 4) selected @endif>SMA Sederajat
                                </option>
                                <option value="5" @if ($siswa->pendidikan_ibu == 5) selected @endif>D1</option>
                                <option value="6" @if ($siswa->pendidikan_ibu == 6) selected @endif>D2</option>
                                <option value="7" @if ($siswa->pendidikan_ibu == 7) selected @endif>D3</option>
                                <option value="8" @if ($siswa->pendidikan_ibu == 8) selected @endif>D4/S1</option>
                                <option value="9" @if ($siswa->pendidikan_ibu == 9) selected @endif>S2</option>
                                <option value="10" @if ($siswa->pendidikan_ibu == 10) selected @endif>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaan_ayah">Pekerjaaan Ayah</label>
                            <select name="pekerjaan_ayah" class="form-control" value="{{ $siswa->pekerjaan_ayah }}"
                                required>
                                <option value="" selected disabled hidden>Pilih Pekerjaaan Ayah...</option>
                                <option value="0" @if ($siswa->pekerjaan_ayah == 0) selected @endif>Tidak Bekerja
                                </option>
                                <option value="1" @if ($siswa->pekerjaan_ayah == 1) selected @endif>Nelayan</option>
                                <option value="2" @if ($siswa->pekerjaan_ayah == 2) selected @endif>Petani</option>
                                <option value="3" @if ($siswa->pekerjaan_ayah == 3) selected @endif>Peternak</option>
                                <option value="4" @if ($siswa->pekerjaan_ayah == 4) selected @endif>PNS/TNI/Polri
                                </option>
                                <option value="5" @if ($siswa->pekerjaan_ayah == 5) selected @endif>Karyawan Swasta
                                </option>
                                <option value="6" @if ($siswa->pekerjaan_ayah == 6) selected @endif>Pedagang Kecil
                                </option>
                                <option value="7" @if ($siswa->pekerjaan_ayah == 7) selected @endif>Pedagang Besar
                                </option>
                                <option value="8" @if ($siswa->pekerjaan_ayah == 8) selected @endif>Wiraswasta</option>
                                <option value="9" @if ($siswa->pekerjaan_ayah == 9) selected @endif>Wirausaha</option>
                                <option value="10" @if ($siswa->pekerjaan_ayah == 10) selected @endif>Buruh</option>
                                <option value="11" @if ($siswa->pekerjaan_ayah == 11) selected @endif>Pensiunan</option>
                                <option value="12" @if ($siswa->pekerjaan_ayah == 12) selected @endif>Meninggal Dunia
                                </option>
                                <option value="13" @if ($siswa->pekerjaan_ayah == 13) selected @endif>Lain - Lain
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <select name="pekerjaan_ibu" class="form-control" value="{{ $siswa->pekerjaan_ibu }}"
                                required>
                                <option value="" selected disabled hidden>Pilih Pekerjaan Ibu...</option>
                                <option value="0" @if ($siswa->pekerjaan_ibu == 0) selected @endif>Tidak Bekerja
                                </option>
                                <option value="1" @if ($siswa->pekerjaan_ibu == 1) selected @endif>Nelayan</option>
                                <option value="2" @if ($siswa->pekerjaan_ibu == 2) selected @endif>Petani</option>
                                <option value="3" @if ($siswa->pekerjaan_ibu == 3) selected @endif>Peternak</option>
                                <option value="4" @if ($siswa->pekerjaan_ibu == 4) selected @endif>PNS/TNI/Polri
                                </option>
                                <option value="5" @if ($siswa->pekerjaan_ibu == 5) selected @endif>Karyawan Swasta
                                </option>
                                <option value="6" @if ($siswa->pekerjaan_ibu == 6) selected @endif>Pedagang Kecil
                                </option>
                                <option value="7" @if ($siswa->pekerjaan_ibu == 7) selected @endif>Pedagang Besar
                                </option>
                                <option value="8" @if ($siswa->pekerjaan_ibu == 8) selected @endif>Wiraswasta</option>
                                <option value="9" @if ($siswa->pekerjaan_ibu == 9) selected @endif>Wirausaha</option>
                                <option value="10" @if ($siswa->pekerjaan_ibu == 10) selected @endif>Buruh</option>
                                <option value="11" @if ($siswa->pekerjaan_ibu == 11) selected @endif>Pensiunan</option>
                                <option value="12" @if ($siswa->pekerjaan_ibu == 12) selected @endif>Meninggal Dunia
                                </option>
                                <option value="13" @if ($siswa->pekerjaan_ibu == 13) selected @endif>Lain - Lain
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gaji_ayah">Gaji Ayah</label>
                            <select name="gaji_ayah" class="form-control" value="{{ $siswa->gaji_ayah }}" required>
                                <option value="" selected disabled hidden>Pilih Gaji Ayah...</option>
                                <option value="0" @if ($siswa->gaji_ayah == 0) selected @endif>Kurang dari Rp. 500.000
                                </option>
                                <option value="1" @if ($siswa->gaji_ayah == 1) selected @endif>Rp. 500.000 - Rp.
                                    1.000.000</option>
                                <option value="2" @if ($siswa->gaji_ayah == 2) selected @endif>Rp. 1.000.000 - Rp.
                                    2.000.000</option>
                                <option value="3" @if ($siswa->gaji_ayah == 3) selected @endif>Rp. 2.000.000 - Rp.
                                    5.000.000</option>
                                <option value="4" @if ($siswa->gaji_ayah == 4) selected @endif>Rp. 5.000.000 - Rp.
                                    20.000.000</option>
                                <option value="5" @if ($siswa->gaji_ayah == 5) selected @endif>Lebih dari Rp. 2.000.000
                                </option>
                                <option value="6" @if ($siswa->gaji_ayah == 6) selected @endif>Meninggal Dunia</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gaji_ibu">Gaji Ibu</label>
                            <select name="gaji_ibu" class="form-control" value="{{ $siswa->gaji_ibu }}" required>
                                <option value="" selected disabled hidden>Pilih Gaji Ibu...</option>
                                <option value="0" @if ($siswa->gaji_ibu == 0) selected @endif>Kurang dari Rp. 500.000
                                </option>
                                <option value="1" @if ($siswa->gaji_ibu == 1) selected @endif>Rp. 500.000 - Rp.
                                    1.000.000</option>
                                <option value="2" @if ($siswa->gaji_ibu == 2) selected @endif>Rp. 1.000.000 - Rp.
                                    2.000.000</option>
                                <option value="3" @if ($siswa->gaji_ibu == 3) selected @endif>Rp. 2.000.000 - Rp.
                                    5.000.000</option>
                                <option value="4" @if ($siswa->gaji_ibu == 4) selected @endif>Rp. 5.000.000 - Rp.
                                    20.000.000</option>
                                <option value="5" @if ($siswa->gaji_ibu == 5) selected @endif>Lebih dari Rp. 2.000.000
                                </option>
                                <option value="6" @if ($siswa->gaji_ibu == 6) selected @endif>Meninggal Dunia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="transportasi_ayah">Kebutuhan Khusus Ayah</label>
                            <select name="transportasi_ayah[]" class="select2 select2-success" required
                                multiple="multiple" style="width: 100%">
                                <option value="" selected disabled hidden>Pilih Kebutuhan Khusus...</option>
                                <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tidak Ada</option>
                                <option value="Tuna Netra" @php echo in_array('Tuna Netra', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Netra</option>
                                <option value="Tuna Rungu" @php echo in_array('Tuna Rungu', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Rungu</option>
                                <option value="Bersepeda" @php echo in_array('Bersepeda', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Bersepeda</option>
                                <option value="Tuna Daksa" @php echo in_array('Tuna Daksa', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Daksa</option>
                                <option value="Tuna Laras" @php echo in_array('Tuna Laras', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Laras</option>
                                <option value="Tuna Wicara" @php echo in_array('Tuna Wicara', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Wicara</option>
                                <option value="Tuna Ganda" @php echo in_array('Tuna Ganda', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Tuna Ganda</option>
                                <option value="Hiper Aktif" @php echo in_array('Hiper Aktif', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Hiper Aktif</option>
                                <option value="Cerdas Istimewa" @php echo in_array('Cerdas Istimewa', explode('|',
                                    $siswa->transportasi_ayah))? 'selected' : '' @endphp>Cerdas Istimewa</option>
                                <option value="Bakat Istimewa" @php echo in_array('Bakat Istimewa', explode('|',
                                    $siswa->transportasi_ayah))? 'selected' : '' @endphp>Bakat Istimewa</option>
                                <option value="Kesulitan belajar" @php echo in_array('Kesulitan belajar', explode('|',
                                    $siswa->transportasi_ayah))? 'selected' : '' @endphp>Kesulitan belajar</option>
                                <option value="Narkoba" @php echo in_array('Narkoba', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Narkoba</option>
                                <option value="Indigo" @php echo in_array('Indigo', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Indigo</option>
                                <option value="Down Syndrome" @php echo in_array('Down Syndrome', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Down Syndrome</option>
                                <option value="Autis" @php echo in_array('Autis', explode('|', $siswa->
                                    transportasi_ayah))? 'selected' : '' @endphp>Autis</option>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transportasi_ibu">Kebutuhan Khusus Ibu</label>
                            <select name="transportasi_ibu[]" class="select2 select2-success" required multiple
                                style="width: 100%">
                                <option value="" selected disabled hidden>Pilih Kebutuhan Khusus...</option>
                                <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tidak Ada</option>
                                <option value="Tuna Netra" @php echo in_array('Tuna Netra', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Netra</option>
                                <option value="Tuna Rungu" @php echo in_array('Tuna Rungu', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Rungu</option>
                                <option value="Bersepeda" @php echo in_array('Bersepeda', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Bersepeda</option>
                                <option value="Tuna Daksa" @php echo in_array('Tuna Daksa', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Daksa</option>
                                <option value="Tuna Laras" @php echo in_array('Tuna Laras', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Laras</option>
                                <option value="Tuna Wicara" @php echo in_array('Tuna Wicara', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Wicara</option>
                                <option value="Tuna Ganda" @php echo in_array('Tuna Ganda', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Tuna Ganda</option>
                                <option value="Hiper Aktif" @php echo in_array('Hiper Aktif', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Hiper Aktif</option>
                                <option value="Cerdas Istimewa" @php echo in_array('Cerdas Istimewa', explode('|',
                                    $siswa->transportasi_ibu))? 'selected' : '' @endphp>Cerdas Istimewa</option>
                                <option value="Bakat Istimewa" @php echo in_array('Bakat Istimewa', explode('|',
                                    $siswa->transportasi_ibu))? 'selected' : '' @endphp>Bakat Istimewa</option>
                                <option value="Kesulitan belajar" @php echo in_array('Kesulitan belajar', explode('|',
                                    $siswa->transportasi_ibu))? 'selected' : '' @endphp>Kesulitan belajar</option>
                                <option value="Narkoba" @php echo in_array('Narkoba', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Narkoba</option>
                                <option value="Indigo" @php echo in_array('Indigo', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Indigo</option>
                                <option value="Down Syndrome" @php echo in_array('Down Syndrome', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Down Syndrome</option>
                                <option value="Autis" @php echo in_array('Autis', explode('|', $siswa->
                                    transportasi_ibu))? 'selected' : '' @endphp>Autis</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
