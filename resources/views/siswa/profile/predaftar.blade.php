@extends('layouts.siswa')

@section('titlePage')
    Data Diri
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                @if(Session::has('pesan'))
                    <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
                @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div><br />
                    @endif
                <form method="post" action="{{ route('siswa.predaftarProses') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <h3 class=""><b>Data Siswa</b></h3>
                        <div class="form-row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="{{ $siswa->nama }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="{{ $siswa->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" required>{{ $siswa->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control cdp" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') }}" required>
                                </div>

                            </div>

                            <div class="col-md-2">
                                <p class="h6 mt-2 alert-warning p-2" >*Upload foto 3x4 Formal ukuran file maksimal 2 MB</p>
                                <div class="card">
                                    <div class="imgWrap">
                                        @if($siswa->foto == null)
                                            <img id="image-preview" src="{{ url('img/user.png') }}" class="card-img-top img-fluid" width="100px" />
                                        @else
                                            <img id="image-preview" src="{{ url('file/siswa/' . $siswa->id_siswa . '/' . $siswa->foto) }}" class="card-img-top img-fluid" width="100px" />
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <div class="custom-file">
                                            <input type="file" name="foto" id="image-source" onchange="previewImage();" class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" id="namafile" for="inputFile">Foto</label>
                                        </div>
                                    </div>
                                    <script>
                                        function previewImage() {
                                            document.getElementById("image-preview").style.display = "block";
                                            var oFReader = new FileReader();
                                            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                                            oFReader.onload = function(oFREvent) {
                                                document.getElementById("image-preview").src = oFREvent.target.result;
                                            };
                                        };
                                        $(document).ready(function() {
                                            $('input[type="file"]').change(function(e) {
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
                            <div class="form-group col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" class="form-control" style="width: 100%;" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}" required>
                                    <option value="none" selected disabled hidden> Pilih Jenis Kelamin </option>
                                    <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nomor_telp">Nomor HP Orang Tua</label>
                                <input type="text" class="form-control" id="nomor_telp" placeholder="Masukkan Nomor HP Orang Tua" name="nomor_telp" value="{{ $siswa->nomor_telp }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nomor_hp">Nomor HP/WA</label>
                                <input type="text" class="form-control" id="nomor_hp" placeholder="Masukkan Nomor HP/WA" name="nomor_hp" value="{{ $siswa->nomor_hp }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="agama">Agama</label>
                                <select name="agama" class="form-control select2" value="{{ $siswa->agama }}" required>
                                    <option value="none" selected disabled hidden>Pilih Agama</option>
                                    <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen Katolik" @if ($siswa->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                    <option value="Kristen Protestan" @if ($siswa->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                    <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Kong Hu Cu" @if ($siswa->agama == 'Kong Hu Cu') selected @endif>Kong Hu Cu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="asal_smp">Asal SMP</label>
                                <input type="text" class="form-control" id="asal_smp" placeholder="Masukkan Asal SMP" name="asal_smp" value="{{ $siswa->asal_smp }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="status_keluarga">Status Keluarga</label>
                                <select name="status_keluarga" class="form-control" value="{{ $siswa->status_keluarga }}" required>
                                    <option value="" selected disabled hidden>Pilih Status Keluarga...</option>
                                    <option value="0" @if ($siswa->status_keluarga == 0) selected @endif>Anak Kandung</option>
                                    <option value="1" @if ($siswa->status_keluarga == 1) selected @endif>Anak Angkat</option>
                                    <option value="2" @if ($siswa->status_keluarga == 2) selected @endif>Anak Yatim</option>
                                    <option value="3" @if ($siswa->status_keluarga == 3) selected @endif>Anak Piatu</option>
                                    <option value="4" @if ($siswa->status_keluarga == 4) selected @endif>Anak Yatim Piatu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kebutuhan_khusus">Kebutuhan Khusus</label>
                                <select name="kebutuhan_khusus[]" class="multi-selectize" required multiple>
                                    <option value="" selected disabled hidden>Pilih Kebutuhan Khusus...</option>
                                    <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tidak Ada</option>
                                    <option value="Tuna Netra" @php echo in_array('Tuna Netra', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Netra</option>
                                    <option value="Tuna Rungu" @php echo in_array('Tuna Rungu', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Rungu</option>
                                    <option value="Tuna Grahita" @php echo in_array('Tuna Grahita', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Grahita</option>
                                    <option value="Tuna Daksa" @php echo in_array('Tuna Daksa', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Daksa</option>
                                    <option value="Tuna Laras" @php echo in_array('Tuna Laras', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Laras</option>
                                    <option value="Tuna Wicara" @php echo in_array('Tuna Wicara', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Wicara</option>
                                    <option value="Tuna Ganda" @php echo in_array('Tuna Ganda', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Tuna Ganda</option>
                                    <option value="Hiper Aktif" @php echo in_array('Hiper Aktif', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Hiper Aktif</option>
                                    <option value="Cerdas Istimewa" @php echo in_array('Cerdas Istimewa', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Cerdas Istimewa</option>
                                    <option value="Bakat Istimewa" @php echo in_array('Bakat Istimewa', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Bakat Istimewa</option>
                                    <option value="Kesulitan belajar" @php echo in_array('Kesulitan belajar', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Kesulitan belajar</option>
                                    <option value="Narkoba" @php echo in_array('Narkoba', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Narkoba</option>
                                    <option value="Indigo" @php echo in_array('Indigo', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Indigo</option>
                                    <option value="Down Syndrome" @php echo in_array('Down Syndrome', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Down Syndrome</option>
                                    <option value="Autis" @php echo in_array('Autis', explode('|', $siswa->kebutuhan_khusus))? 'selected' : '' @endphp>Autis</option>
                                </select>
                            </div>
                        </div>


                        <h3 class="mt-5"><b>Data Orang Tua</b></h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                <select name="pendidikan_ayah" class="form-control" value="{{ $siswa->pendidikan_ayah }}" required>
                                    <option value="" selected disabled hidden>Pilih Pendidikan Ayah...</option>
                                    <option value="0" @if ($siswa->pendidikan_ayah == 0) selected @endif>Tidak Sekolah</option>
                                    <option value="1" @if ($siswa->pendidikan_ayah == 1) selected @endif>Putus SD</option>
                                    <option value="2" @if ($siswa->pendidikan_ayah == 2) selected @endif>SD Sederajat</option>
                                    <option value="3" @if ($siswa->pendidikan_ayah == 3) selected @endif>SMP Sederajat</option>
                                    <option value="4" @if ($siswa->pendidikan_ayah == 4) selected @endif>SMA Sederajat</option>
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
                                <select name="pendidikan_ibu" class="form-control" value="{{ $siswa->pendidikan_ibu }}" required>
                                    <option value="" selected disabled hidden>Pilih Pendidikan Ibu...</option>
                                    <option value="0" @if ($siswa->pendidikan_ibu == 0) selected @endif>Tidak Sekolah</option>
                                    <option value="1" @if ($siswa->pendidikan_ibu == 1) selected @endif>Putus SD</option>
                                    <option value="2" @if ($siswa->pendidikan_ibu == 2) selected @endif>SD Sederajat</option>
                                    <option value="3" @if ($siswa->pendidikan_ibu == 3) selected @endif>SMP Sederajat</option>
                                    <option value="4" @if ($siswa->pendidikan_ibu == 4) selected @endif>SMA Sederajat</option>
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
                                <select name="pekerjaan_ayah" class="form-control" value="{{ $siswa->pekerjaan_ayah }}" required>
                                    <option value="" selected disabled hidden>Pilih Pekerjaaan Ayah...</option>
                                    <option value="0" @if ($siswa->pekerjaan_ayah == 0) selected @endif>Tidak Bekerja</option>
                                    <option value="1" @if ($siswa->pekerjaan_ayah == 1) selected @endif>Nelayan</option>
                                    <option value="2" @if ($siswa->pekerjaan_ayah == 2) selected @endif>Petani</option>
                                    <option value="3" @if ($siswa->pekerjaan_ayah == 3) selected @endif>Peternak</option>
                                    <option value="4" @if ($siswa->pekerjaan_ayah == 4) selected @endif>PNS/TNI/Polri</option>
                                    <option value="5" @if ($siswa->pekerjaan_ayah == 5) selected @endif>Karyawan Swasta</option>
                                    <option value="6" @if ($siswa->pekerjaan_ayah == 6) selected @endif>Pedagang Kecil</option>
                                    <option value="7" @if ($siswa->pekerjaan_ayah == 7) selected @endif>Pedagang Besar</option>
                                    <option value="8" @if ($siswa->pekerjaan_ayah == 8) selected @endif>Wiraswasta</option>
                                    <option value="9" @if ($siswa->pekerjaan_ayah == 9) selected @endif>Wirausaha</option>
                                    <option value="10" @if ($siswa->pekerjaan_ayah == 10) selected @endif>Buruh</option>
                                    <option value="11" @if ($siswa->pekerjaan_ayah == 11) selected @endif>Pensiunan</option>
                                    <option value="12" @if ($siswa->pekerjaan_ayah == 12) selected @endif>Meninggal Dunia</option>
                                    <option value="13" @if ($siswa->pekerjaan_ayah == 13) selected @endif>Lain - Lain</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <select name="pekerjaan_ibu" class="form-control" value="{{ $siswa->pekerjaan_ibu }}" required>
                                    <option value="" selected disabled hidden>Pilih Pekerjaan Ibu...</option>
                                    <option value="0" @if ($siswa->pekerjaan_ibu == 0) selected @endif>Tidak Bekerja</option>
                                    <option value="1" @if ($siswa->pekerjaan_ibu == 1) selected @endif>Nelayan</option>
                                    <option value="2" @if ($siswa->pekerjaan_ibu == 2) selected @endif>Petani</option>
                                    <option value="3" @if ($siswa->pekerjaan_ibu == 3) selected @endif>Peternak</option>
                                    <option value="4" @if ($siswa->pekerjaan_ibu == 4) selected @endif>PNS/TNI/Polri</option>
                                    <option value="5" @if ($siswa->pekerjaan_ibu == 5) selected @endif>Karyawan Swasta</option>
                                    <option value="6" @if ($siswa->pekerjaan_ibu == 6) selected @endif>Pedagang Kecil</option>
                                    <option value="7" @if ($siswa->pekerjaan_ibu == 7) selected @endif>Pedagang Besar</option>
                                    <option value="8" @if ($siswa->pekerjaan_ibu == 8) selected @endif>Wiraswasta</option>
                                    <option value="9" @if ($siswa->pekerjaan_ibu == 9) selected @endif>Wirausaha</option>
                                    <option value="10" @if ($siswa->pekerjaan_ibu == 10) selected @endif>Buruh</option>
                                    <option value="11" @if ($siswa->pekerjaan_ibu == 11) selected @endif>Pensiunan</option>
                                    <option value="12" @if ($siswa->pekerjaan_ibu == 12) selected @endif>Meninggal Dunia</option>
                                    <option value="13"@if ($siswa->pekerjaan_ibu == 13) selected @endif>Lain - Lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gaji_ayah">Gaji Ayah</label>
                                <select name="gaji_ayah" class="form-control" value="{{ $siswa->gaji_ayah }}" required>
                                    <option value="" selected disabled hidden>Pilih Gaji Ayah...</option>
                                    <option value="0" @if ($siswa->gaji_ayah == 0) selected @endif>Kurang dari Rp. 500.000</option>
                                    <option value="1" @if ($siswa->gaji_ayah == 1) selected @endif>Rp. 500.000 - Rp. 1.000.000</option>
                                    <option value="2" @if ($siswa->gaji_ayah == 2) selected @endif>Rp. 1.000.000 - Rp. 2.000.000</option>
                                    <option value="3" @if ($siswa->gaji_ayah == 3) selected @endif>Rp. 2.000.000 - Rp. 5.000.000</option>
                                    <option value="4" @if ($siswa->gaji_ayah == 4) selected @endif>Rp. 5.000.000 - Rp. 20.000.000</option>
                                    <option value="5" @if ($siswa->gaji_ayah == 5) selected @endif>Lebih dari Rp. 2.000.000</option>
                                    <option value="6" @if ($siswa->gaji_ayah == 6) selected @endif>Meninggal Dunia</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gaji_ibu">Gaji Ibu</label>
                                <select name="gaji_ibu" class="form-control" value="{{ $siswa->gaji_ibu }}" required>
                                    <option value="" selected disabled hidden>Pilih Gaji Ibu...</option>
                                    <option value="0" @if ($siswa->gaji_ibu == 0) selected @endif>Kurang dari Rp. 500.000</option>
                                    <option value="1" @if ($siswa->gaji_ibu == 1) selected @endif>Rp. 500.000 - Rp. 1.000.000</option>
                                    <option value="2" @if ($siswa->gaji_ibu == 2) selected @endif>Rp. 1.000.000 - Rp. 2.000.000</option>
                                    <option value="3" @if ($siswa->gaji_ibu == 3) selected @endif>Rp. 2.000.000 - Rp. 5.000.000</option>
                                    <option value="4" @if ($siswa->gaji_ibu == 4) selected @endif>Rp. 5.000.000 - Rp. 20.000.000</option>
                                    <option value="5" @if ($siswa->gaji_ibu == 5) selected @endif>Lebih dari Rp. 2.000.000</option>
                                    <option value="6" @if ($siswa->gaji_ibu == 6) selected @endif>Meninggal Dunia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kebutuhan_khusus_ayah">Kebutuhan Khusus Ayah</label>
                                <select name="kebutuhan_khusus_ayah[]" class="multi-selectize" required multiple>
                                    <option value="" selected disabled hidden>Pilih Kebutuhan Khusus...</option>
                                    <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tidak Ada</option>
                                    <option value="Tuna Netra" @php echo in_array('Tuna Netra', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Netra</option>
                                    <option value="Tuna Rungu" @php echo in_array('Tuna Rungu', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Rungu</option>
                                    <option value="Tuna Grahita" @php echo in_array('Tuna Grahita', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Grahita</option>
                                    <option value="Tuna Daksa" @php echo in_array('Tuna Daksa', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Daksa</option>
                                    <option value="Tuna Laras" @php echo in_array('Tuna Laras', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Laras</option>
                                    <option value="Tuna Wicara" @php echo in_array('Tuna Wicara', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Wicara</option>
                                    <option value="Tuna Ganda" @php echo in_array('Tuna Ganda', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Tuna Ganda</option>
                                    <option value="Hiper Aktif" @php echo in_array('Hiper Aktif', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Hiper Aktif</option>
                                    <option value="Cerdas Istimewa" @php echo in_array('Cerdas Istimewa', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Cerdas Istimewa</option>
                                    <option value="Bakat Istimewa" @php echo in_array('Bakat Istimewa', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Bakat Istimewa</option>
                                    <option value="Kesulitan belajar" @php echo in_array('Kesulitan belajar', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Kesulitan belajar</option>
                                    <option value="Narkoba" @php echo in_array('Narkoba', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Narkoba</option>
                                    <option value="Indigo" @php echo in_array('Indigo', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Indigo</option>
                                    <option value="Down Syndrome" @php echo in_array('Down Syndrome', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Down Syndrome</option>
                                    <option value="Autis" @php echo in_array('Autis', explode('|', $siswa->kebutuhan_khusus_ayah))? 'selected' : '' @endphp>Autis</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kebutuhan_khusus_ibu">Kebutuhan Khusus Ibu</label>
                                <select name="kebutuhan_khusus_ibu[]" class="multi-selectize" required multiple>
                                    <option value="" selected disabled hidden>Pilih Kebutuhan Khusus...</option>
                                    <option value="Tidak Ada" @php echo in_array('Tidak Ada', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tidak Ada</option>
                                    <option value="Tuna Netra" @php echo in_array('Tuna Netra', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Netra</option>
                                    <option value="Tuna Rungu" @php echo in_array('Tuna Rungu', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Rungu</option>
                                    <option value="Tuna Grahita" @php echo in_array('Tuna Grahita', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Grahita</option>
                                    <option value="Tuna Daksa" @php echo in_array('Tuna Daksa', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Daksa</option>
                                    <option value="Tuna Laras" @php echo in_array('Tuna Laras', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Laras</option>
                                    <option value="Tuna Wicara" @php echo in_array('Tuna Wicara', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Wicara</option>
                                    <option value="Tuna Ganda" @php echo in_array('Tuna Ganda', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Tuna Ganda</option>
                                    <option value="Hiper Aktif" @php echo in_array('Hiper Aktif', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Hiper Aktif</option>
                                    <option value="Cerdas Istimewa" @php echo in_array('Cerdas Istimewa', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Cerdas Istimewa</option>
                                    <option value="Bakat Istimewa" @php echo in_array('Bakat Istimewa', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Bakat Istimewa</option>
                                    <option value="Kesulitan belajar" @php echo in_array('Kesulitan belajar', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Kesulitan belajar</option>
                                    <option value="Narkoba" @php echo in_array('Narkoba', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Narkoba</option>
                                    <option value="Indigo" @php echo in_array('Indigo', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Indigo</option>
                                    <option value="Down Syndrome" @php echo in_array('Down Syndrome', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Down Syndrome</option>
                                    <option value="Autis" @php echo in_array('Autis', explode('|', $siswa->kebutuhan_khusus_ibu))? 'selected' : '' @endphp>Autis</option>

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
