@extends('layouts.app')

@section('titlePage')
    Edit Personel
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div><br />
            @endif
            <form action="{{ route('admin.personel.update') }}" method="post" role="form" id="quickForm">
                <input type="hidden" name="id" value="{{ $personel->id_admin }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">nip</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP" value="{{ $personel->nip }}" required autofocus>
                        <div class="invalid-feedback">
                            NIP tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_admin">Nama Personel</label>
                        <input type="text" name="nama_admin" class="form-control" id="nama_admin" placeholder="Masukkan Nama Personel" value="{{ $personel->nama_admin }}"required autofocus>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="level">Level Akses</label>
                            <select name="level" class="form-control"
                                data-placeholder="Pilih Level Akses" value="{{ $personel->level }}" required>
                                {{-- <option value="" selected disabled hidden>Status Tempat TInggal...</option> --}}
                                <option value="2" @if ($personel->level == 2) selected @endif>User
                                </option>
                                <option value="1" @if ($personel->level == 1) selected @endif>Administrator
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status_admin">Status Personel</label>
                            <select name="status_admin" class="form-control"
                                data-placeholder="Pilih Status Personel" value="{{ $personel->status_admin }}" required>
                                {{-- <option value="" selected disabled hidden>Status Tempat TInggal...</option> --}}
                                <option value="1" @if ($personel->status_admin == 1) selected @endif >Aktif
                                </option>
                                <option value="0" @if ($personel->status_admin == 0) selected @endif>Tidak Aktif
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
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
