@extends('layouts.app')

@section('titlePage')
    Management Biaya Gelombang
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.biayagelombang.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>Biaya</th>
                                <th>Rincian Biaya Daftar Ulang</th>
                                <th>Jurusan</th>
                                <th>Gelombang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($biayagelombang as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->biaya}}</td>
                                    <td>{{$data->rincian_biaya_daftar_ulang}}</td>
                                    <td>{{$data->nama_jurusan}}</td>
                                    <td>{{$data->nama_gelombang}}</td>
                                    <td><a href="{{ route('admin.biayagelombang.edit', $data->id_biaya_gelombang)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Biaya Gelombang">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.biayagelombang.destroy', $data->id_biaya_gelombang)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin MENGHAPUS Biaya Gelombang ini?')" type="submit" data-toggle="tooltip" data-placement="top" title="Hapus Biaya Gelombang"><i class="fas fa-trash"></i></button>
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
