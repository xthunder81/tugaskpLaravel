@extends('layouts.app')

@section('titlePage')
    Management Kategori Angsuran
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                          <a class="btn btn-primary" href="{{ route('admin.kategoriangsuran.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama Angsuran</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($angsuran as $f)
                                <tr>
                                    <td>{{ $f->nama_cicil }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('admin.kategoriangsuran.edit', $f->id_kategori_cicil) }}"  data-toggle="tooltip" data-placement="top" title="Edit Kategori Angsuran"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('admin.kategoriangsuran.destroy', $f->id_kategori_cicil) }}" onclick="return confirm('Yakin ingin HAPUS Kategori Angsuran ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Angsuran"><i class="nav-icon fas fa-trash"></i</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('content')
    <div class="row mb-4">
        <a class="btn btn-primary" href="{{ route('admin.tahunajaran.create') }}">Tambah Data</a>
    </div>
    @if(Session::has('pesan'))
        <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
    @endif

@endsection
