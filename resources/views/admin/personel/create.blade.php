@extends('layouts.app')

@section('titlePage')
    Tambah Personel
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
            <form action="{{ route('admin.personel.store') }}" method="post" role="form" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP" required data-eye>
                        <div class="invalid-feedback">
                            NIP tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_admin">Nama Personel</label>
                        <input type="text" name="nama_admin" class="form-control" id="nama_admin" placeholder="Masukkan Nama Personel" required autofocus>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" name="password" id="password" type="password" placeholder="Masukkan Password" aria-describedby="basic-addon2" required data-eye>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-eye-slash text-success" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="level">Level Akses</label>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
