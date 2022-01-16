@extends('layouts.app')

@section('titlePage')
    Management Blog
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                          <a class="btn btn-primary" href="{{ route('admin.blog.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blog as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('admin.blog.edit', $b->id_blog) }}"  data-toggle="tooltip" data-placement="top" title="Edit Blog"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('admin.blog.destroy', $b->id_blog) }}" onclick="return confirm('Yakin ingin HAPUS Blog ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Blog"><i class="nav-icon fas fa-trash"></i</a>
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
