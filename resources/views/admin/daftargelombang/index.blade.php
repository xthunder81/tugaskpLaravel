@extends('layouts.app')

@section('titlePage')
    Management Daftar Gelombang
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.daftargelombang.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>Nama</th>
                                <!-- <th>Status</th> -->
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($daftargelombang as $data)
                                <tr>
                                    <td>{{$data->nama_daftar_gelombang}}</td>
                                    <td>

                                    <a href="{{ route('admin.daftargelombang.edit', $data->id_daftar_gelombang)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Nama daftargelombang"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.daftargelombang.destroy', $data->id_daftar_gelombang)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin MENGHAPUS Daftar Gelombang ini?')" data-toggle="tooltip" data-placement="top" title="Hapus daftargelombang"><i class="fas fa-trash"></i></button>
                                        </form>
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
