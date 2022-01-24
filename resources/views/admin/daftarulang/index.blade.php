@extends('layouts.app')

@section('titlePage')
    Management Daftar Ulang
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No Formulir</th>
                <th>Nama</th>
                <th>TTL</th>
                {{-- <th>Jurusan</th> --}}
                <th>Gelombang</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftarulang as $f)
                <tr>
                    <td>{{ $f->id_pendaftaran }}</td>
                    <td>{{ $f->nama }}</td>
                    <td>{{ $f->tempat_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $f->tanggal_lahir)->format('d-m-Y') }}</td>
                    {{-- <td>{{ $f->nama_jurusan }}</td> --}}
                    <td>{{ $f->nama_gelombang }}</td>
                    <td>{{ \Carbon\Carbon::parse($f->created_at)->format('d M Y') }}</td>
                    <td>@if($f->status_pembayaran==1) <span class="badge badge-success" >Terverifikasi </span>@else <span class="badge badge-warning" >Belum Verifikasi</span>@endif</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.daftarulang.show', $f->id_pendaftaran ) }}"><i class="fas fa-eye"></i> View</a>
                        <!-- <a class="btn btn-primary btn-sm" href="{{ route('admin.formulir.print', $f->id_pendaftaran ) }}">Print</a> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                        </div>
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

