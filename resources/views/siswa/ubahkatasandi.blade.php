@extends('layouts.siswa')

@section('titlePage')
    Ubah Kata Sandi
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
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
            <form action="{{ route('siswa.ubahkatasandi.store') }}" method="post" role="form" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" name="sandi" type="password" placeholder="Masukkan password baru..."  aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
