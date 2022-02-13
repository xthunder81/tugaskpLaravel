<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="SMK">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIGN UP Siswa | PPDB</title>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/my-login.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
</head>

<style>
    .form-control:focus {
        border-color: #5cb85c;
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(24, 213, 109, 0.5);
    }
</style>
<body class="my-login-page">
<section class="h-100 mt-5">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="judul">
                    SIGN UP PPDB<br>{{  env('NAMASEKOLAH','') }}
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                @endif
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title text-center">Silahkan mengisi semua form yang tersedia</h4>
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
                        @endif
                        <form method="post" action="{{ route('siswa.registerProses') }}" enctype="multipart/form-data" class="my-login-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="password">NISN
                                    <a href="#" target="_blank" class="float-right text-success" data-toggle="modal" data-target="#exampleModal">
                                        Tidak ingat NISN Kamu?
                                    </a>
                                </label>
                                <input id="nisn" type="text" class="form-control" name="nisn" placeholder="Masukkan NISN" required data-eye>
                                <div class="invalid-feedback">
                                    NISN tidak boleh kosong
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Nama Lengkap</label>
                                <input id="nisn" type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap" required autofocus>
                                <div class="invalid-feedback">
                                    Nama Lengkap tidak boleh kosong
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="nisn" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autofocus>
                                <div class="invalid-feedback">
                                    Email tidak boleh kosong
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <div class="input-group" id="show_hide_password">
                                <input class="form-control" name="password" id="password" type="password" placeholder="Masukkan Password" aria-describedby="basic-addon2" required data-eye>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-eye-slash text-success" aria-hidden="true"></i></a></span>
                                </div>
                            </div>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-success btn-block">
                                    Daftar
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Sudah punya Akun? <a href="{{ route('siswa.login') }}" class="text-success">Login di Sini!</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; {{ now()->year }} &mdash; {{  env('NAMASEKOLAH','') }}
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NISN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Apa itu NISN?</b>
                <ul>
                    <li>Nomor Induk Siswa Nasional (NISN) merupakan layanan sistem pengelolaan nomor induk siswa secara nasional yang dikelola oleh Kementerian Pendidikan dan Kebudayaan Republik Indonesia.                    </li>
                    <li>NISN adalah kombinasi angka unik yang diberikan oleh setiap sekolah.</li>
                    <li>NISN diberikan pada siswa mulai dari SD, SMP, dan SMA.</li>
                    <li>NISN memiliki sifat permanen alias angka tersebut tidak berubah dari jenjang pendidikan SD hingga SMA.</li>
                    <li>NISN biasanya digunakan sebagai salah satu persyaratan dalam pendaftaran peserta didik baru.</li>
                    <li>Terkadang, NISN juga berfungsi untuk penerimaan rapor hasil belajar siswa.</li>
                    <li>NISN ini hanya berlaku selama pemegang menjadi siswa.</li>
                </ul>
                <b>Lupa atau tidak tahu NISN?</b><br>
                Jika Kamu lupa atau tidak tahu nomor NISN Kamu, silahkan buka halaman di bawah. Isi data diri yang diperlukan untuk melakukan proses pencarian:
                <br><br>
                <a href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama" target="_blank">nisn.data.kemdikbud.go.id</a>
            </div>

        </div>
    </div>
</div>
<script src="{{ asset('auth/jquery.min.js') }}"></script>
<script src="{{ asset('auth/jquery.inputmask.bundle.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#nisn").inputmask({"mask": "9999999999"});
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
</script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('auth/my-login.js') }}"></script>
</body>
</html>
