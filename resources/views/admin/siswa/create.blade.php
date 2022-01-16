@extends('layouts.app')

@section('titlePage')
    Tambah Siswa
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form method="post" action="{{ route('admin.siswa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <label for="name">NISN:</label>
                                    <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" placeholder="NISN SIswa"/>
                                    @error('nisn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="nama">Nama Lengkap:</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap SIswa"/>
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="name">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email SIswa"/>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="name">Password:</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password Siswa"/>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Alamat Lengkap:</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="exampleFormControlTextarea1" name="alamat" rows="3" placeholder="Alamat Lengkap Siswa">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="name">Tempat Lahir:</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir"/>
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="name">Tanggal Lahir:</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"/>
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="name">No Telp:</label>
                                    <input type="number" class="form-control @error('nomor_telp') is-invalid @enderror" name="nomor_telp" value="{{ old('nomor_telp') }}" placeholder="Nomor Telp Orang Tua / SIswa"/>
                                    @error('nomor_telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="nama">No HP:</label>
                                    <input type="number" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Nomor HP SIswa"/>
                                    @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <select name="jenis_kelamin" class="form-control select2 @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="NULL">PILIH JENIS KELAMIN</option>
                                        <option value="P" @if (old('jenis_kelamin') == "P") {{ 'selected' }} @endif>PEREMPUAN</option>
                                        <option value="L" @if (old('jenis_kelamin') == "L") {{ 'selected' }} @endif>LAKI-LAKI</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-4 mb-2">
                                    <label for="name">Agama:</label>
                                    <select name="agama" class="form-control select2 @error('agama') is-invalid @enderror">
                                        <option value="NULL">PILIH AGAMA</option>
                                        <option value="Islam" @if (old('agama') == "Islam") {{ 'selected' }} @endif>Islam</option>
                                        <option value="Kristen Katolik" @if (old('agama') == "Kristen Katolik") {{ 'selected' }} @endif>Kristen Katolik</option>
                                        <option value="Kristen Protestan" @if (old('agama') == "Kristen Protestan") {{ 'selected' }} @endif>Kristen Protestan</option>
                                        <option value="Hindu" @if (old('agama') == "Hindu") {{ 'selected' }} @endif>Hindu</option>
                                        <option value="Buddha" @if (old('agama') == "Buddha") {{ 'selected' }} @endif>Buddha</option>
                                        <option value="Kong Hu Cu" @if (old('agama') == "Kong Hu Cu") {{ 'selected' }} @endif>Kong Hu Cu</option>
                                    </select>
                                    @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <label for="name">Asal SMP:</label>
                                    <input type="asal_smp" class="form-control @error('asal_smp') is-invalid @enderror" name="asal_smp" value="{{ old('asal_smp') }}" placeholder="Nama SMP Asal"/>
                                    @error('asal_smp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
