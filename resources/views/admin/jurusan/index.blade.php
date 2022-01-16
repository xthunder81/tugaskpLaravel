@extends('layouts.app')

@section('titlePage')
    Management Jurusan
@endsection

@section('content')
   <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('admin.jurusan.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>Nomor</th>
                                <th>Nama Jurusan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jurusan as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_jurusan}}</td>
                                    <td><a href="{{ route('admin.jurusan.edit', $data->id_jurusan)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Nama Jurusan"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.jurusan.destroy', $data->id_jurusan)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Yakin ingin HAPUS Jurusan ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Jurusan"><i class="fas fa-trash"></i></button>
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
