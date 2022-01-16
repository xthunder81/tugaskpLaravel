@extends('layouts.app')

@section('titlePage')
    Management Pendaftaran
@endsection

@section('content')
    <div class="row mb-4">
        <a class="btn btn-primary" href="{{ route('pendaftaran.create') }}">Tambah Data</a>
    </div>
    <table id="datatables">
        <thead>
            <tr>
                <th>No Reg</th>
                <th>No Formulir</th>
                <th>Petugas</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>HP</th>
                <th>Asal Sekolah</th>
                <th>Program Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $f)
                <tr>
                    <td>{{ $f->id_formulir }}</td>
                    <td>{{ $f->nomor_formulir }}</td>
                    <td>{{ $f->name }}</td>
                    <td>{{ $f->nama }}</td>
                    <td>{{ $f->alamat }}</td>
                    <td>{{ $f->no_hp }}</td>
                    <td>{{ $f->asal_sekolah }}</td>
                    <td>{{ $f->nama_jurusan }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('pendaftaran.show', $f->id_pendaftaran) }}">View</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('pendaftaran.print', $f->id_pendaftaran) }}">Print</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('pendaftaran.edit', $f->id_pendaftaran) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('pendaftaran.destroy', $f->id_pendaftaran) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection