@extends('layouts.siswa')

@section('titlePage')
    Registrasi Pendaftaran
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
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Gelombang</th>
                <th>Waktu Buka</th>
                <th>Kuota</th>
            </tr>
            </thead>
                @php
                    for($i = 0; $i < count($gel); $i++){
                        @endphp
                        <tr>
                            <td>{{ $gel[$i] }}</td>
                            <td>{{ $gelWaktu[$i] }}</td>
                            <td>{{ $gelKuota[$i] }}</td>
                        </tr>
                        @php
                    }

                @endphp
            </tbody>
        </table>
    </div>
    <table class="table mt-2">
        <tbody>
            <form action="{{ route('siswa.registrasiProses') }}" method="POST">
                @csrf
                <tr>
                    <td><b>Registrasi Program Studi</b></td>
                    <td>
                        <div class="input-group mb-3">
                            <select name="programstudi" class="form-control">
                                @foreach($gelombang as $g)
                                    @php
                                        if(\Carbon\Carbon::parse($g->mulai)->diffInDays(\Carbon\Carbon::now(),false) >= 0 && \Carbon\Carbon::parse($g->selesai)->diffInDays(\Carbon\Carbon::now(),false) <= 0){
                                            if(!in_array($g->id_biaya_gelombang,$sudahDaftar)){
                                                if($g->kuota > 0){
                                            @endphp
                                            <option value="{{ $g->id_biaya_gelombang }}">{{ $g->nama_gelombang }}</option>
                                            @php
                                                }
                                            }
                                        }
                                    @endphp
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary" ><i class="fas fa-save"></i> Daftar</button>
                        </div>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
@endsection
