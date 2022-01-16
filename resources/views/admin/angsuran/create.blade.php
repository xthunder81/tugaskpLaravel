@extends('layouts.app')

@section('titlePage')
    Tambah Kategori Angsuran
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
            <form action="{{ route('admin.angsuran.store') }}" method="post" role="form" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Angsuran</label>
                        <select name="kategori_angsuran" class="selectize selectized">
                            <option value="" selected disabled>Pilih Kategori Angsuran...</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id_kategori_cicil }}">{{ $k->nama_cicil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Siswa</label>
                        <select name="siswa" class="selectize selectized">
                            <option value="" selected disabled>Pilih Siswa...</option>
                            @foreach($siswa as $k)
                                <option value="{{ $k->id_siswa }}">{{ $k->nama }} ({{ $k->nisn }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nilai Angsuran</label>
                        <input type="text" name="nilai_angsuran" class="form-control uang" id="nama" placeholder="Masukkan Nilai...">
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
