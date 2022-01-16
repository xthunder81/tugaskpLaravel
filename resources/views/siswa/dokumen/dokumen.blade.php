@extends('layouts.siswa')

@section('titlePage')
    Dokumen
@endsection

@section('content')
    @if(Session::has('pesan'))
        <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
    @endif
        @php
            $no = 0;
        @endphp
        @foreach($dokumen as $d)
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
        <div class="col-sm-6">
            <span style="font-weight: bold;font-size: 18px;">Nama Dokumen:</span><br>
            {{ $d->nama_dokumen }}
        </div>
        <div class="col-sm-6">
            <span style="font-weight: bold;font-size: 18px;">Upload Dokumen:</span><br>
            @if($fileName[$no] != null)
            <a class="btn btn-primary btn-xs mb-2" href="{{  $fileName[$no] != null ? url('file/siswa/' . \Auth::guard('siswa')->user()->id_siswa . '/' . $fileName[$no][0]) : '' }}" target="_blank">@if($fileName[$no] != null) Lihat Dokumen <i class="fas fa-eye"></i> @else @endif</a>
            @endif
            <form action="{{ route('siswa.dokumenProses') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="id_dokumen" value="{{ $d->id_dokumen }}">
                <input type="hidden" name="nama_dokumen" value="{{ $d->nama_dokumen }}">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile{{ $d->id_dokumen }}" aria-describedby="inputGroupFileAddon{{ $d->id_dokumen }}" accept="application/pdf,image/*">
                        <label class="custom-file-label" id="namafile{{ $d->id_dokumen }}" for="inputGroupFile{{ $d->id_dokumen }}">@if($fileName[$no] != null) {{ $fileName[$no][0] }} @else Pilih File {{ $d->nama_dokumen }}...@endif</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon{{ $d->id_dokumen }}"><i class="fas fa-upload"></i> Unggah</button>
                    </div>
                </div>
                <span class="text-red"><?= $fileName[$no][1] != '' ? 'Komentar dari Admin : ' . $fileName[$no][1] : '' ; ?></span>
            </form>
        </div>
                        <script>
                            $(document).ready(function() {
                                $("#inputGroupFile{{ $d->id_dokumen }}").change(function (e) {
                                    var geekss = e.target.files[0].name;
                                    $("namafile{{ $d->id_dokumen }}").text(geekss);
                                    document.getElementById("namafile{{ $d->id_dokumen }}").innerHTML = geekss;
                                });
                            });
                        </script>
            @php
                $no++;
            @endphp </div></div>
            </div>

        @endforeach

    </div>

@endsection
