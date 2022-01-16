@extends('layouts.app')

@section('titlePage')
    Management Angsuran
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                          <a class="btn btn-primary" href="{{ route('admin.angsuran.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>Kategori Angsuran</th>
                                <th>Siswa</th>
                                <th>Nilai Angsuran</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($angsuran as $f)
                                <tr>
                                    <td>{{ $f->nama_cicil }}</td>
                                    <td>{{ $f->nama }} ({{ $f->nisn }})</td>
                                    <td>@uang($f->nilai_cicil)</td>
                                    <td>{{ \Carbon\Carbon::parse($f->created_at)->format('d M Y') }}</td>
                                    <td>
                                        <!-- <a class="btn btn-primary btn-xs" href="{{ route('admin.angsuran.edit', $f->id_cicil) }}"  data-toggle="tooltip" data-placement="top" title="Edit Angsuran"><i class="fas fa-edit"></i></a> -->
                                        <a class="btn btn-danger btn-xs" href="{{ route('admin.angsuran.destroy', $f->id_cicil) }}" onclick="return confirm('Yakin ingin HAPUS Angsuran ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Angsuran"><i class="nav-icon fas fa-trash"></i</a>
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
