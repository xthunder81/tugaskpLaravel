@extends('layouts.siswa')

@section('titlePage')
    Nilai
@endsection

@section('content')
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
    @php
        $no = 0;
    @endphp
    @foreach($nilai as $n)
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
             <div class="col-sm-6">
                 <span style="font-weight: bold;font-size: 18px;">Nama Nilai:</span><br>
                 {{ $n->nama_nilai }}
              </div>
            <div class="col-sm-6">
                <span style="font-weight: bold;font-size: 18px;">Isi Nilai:</span><br>
                <form action="{{ route('siswa.nilaiProses') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_nilai" value="{{ $n->id_nilai }}">
                    <div class="input-group mb-3">
                        <input type="text" name="nilai" class="form-control" placeholder="Masukkan nilai {{ $n->nama_nilai }}..." value="<?= $nilaiNya != null? $nilaiNya[$no] : '' ; ?>" >
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-save"></i> Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
            @php
                $no++;
            @endphp
            @endforeach

@endsection
