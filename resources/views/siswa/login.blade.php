<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="SMK">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Log in Siswa | PPDB</title>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/my-login.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="my-login-page">
<section class="h-100 mt-5">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="judul">
                    LOGIN PPDB<br>{{  env('NAMASEKOLAH','') }}
                </div>
                <div class="card fat">
                    <div class="card-body">
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
                        @endif
                        <h4 class="card-title text-center">Silahkan Log in dengan Akun yang Sudah Terdaftar</h4>
                        <form action="{{ route('siswa.prosesLogin') }}" method="post" class="my-login-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">NISN</label>
                                <input id="nisn" pattern="[0-9]{10}" type="text" class="form-control" name="nisn" placeholder="NISN Siswa" required autofocus>
                                <div class="invalid-feedback">
                                    NISN tidak boleh kosong
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" name="password" id="password" type="password" placeholder="Password Siswa" aria-describedby="basic-addon2" required data-eye>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                                        </div>
                                    </div>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                                    <a href="#" class="float-right" data-toggle="modal" data-target="#exampleModal">
                                        Lupa Password?
                                    </a>
                                </label>

                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Belum punya Akun? <a href="{{ route('siswa.register') }}">Daftar di Sini!</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Lupa Password Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Jika Anda lupa password silahkan hubungi kontak admin di bawah:
                <ul>
                    <li>Nomor HP : {{  env('NOMORHPSEKOLAH','') }}</li>
                    <li>Email : {{  env('EMAILSEKOLAH','') }}</li>
                </ul>
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
