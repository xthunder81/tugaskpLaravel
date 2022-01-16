<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PPDB Online {{ env("NAMASEKOLAH","") }}</title>
    <meta content="{{ env("NAMASEKOLAH","") }}" name="descriptison">
    <meta content="{{ env("NAMASEKOLAH","") }}" name="keywords">
    <link href="{{asset('landingpage/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('landingpage/css/style.css')}}" rel="stylesheet">
    <link href='{{ url('asset/logo.png') }}' rel='icon' type='image/x-icon' />
</head>

<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ url('/') }}">
                <img src="{{asset('landingpage/img/ppdb.png')}}" alt="Image" class="img-fluid">
            </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ route('welcome') }}#hero">Home</a></li>
                <li><a href="{{ route('welcome') }}#fasilitas">Fasilitas</a></li>
                <li><a href="{{ route('welcome') }}#keuntungan">Keuntungan</a></li>
                <li><a href="{{ route('welcome') }}#syarat-pendaftaran">Syarat Pendaftaran</a></li>
                <li><a href="{{ route('welcome') }}#langkah-pendaftaran">Langkah Pendaftaran</a></li>
                <li><a href="{{ route('welcome') }}#kegiatan">Kegiatan</a></li>
                <li><a href="{{ route('welcome') }}#kontak">Kontak</a></li>
                <li class="active"><a href="{{ route('siswa.blog') }}">Blog</a></li>
            </ul>
        </nav><!-- .nav-menu -->
            <div class="top-right links">

            </div>


    </div>
</header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: auto !important">
        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
            <h1 style="width: 100% !important">{{ $blog->judul }}</h1>
            <h5 class="mb-4">Diunggah {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</h5>
        </div>

    </section><!-- End Hero -->


     <!-- ======= Services Section ======= -->
     <section id="syarat-pendaftaran" class="services">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 d-flex align-items-stretch mb-3 mb-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box col-md-12 col-lg-12 col-sm-12">
                        <p style="margin-top: 30px;" class="description">{!! $blog->teks !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <p>
                Copyright &copy;{{ now()->year }} All rights reserved | Informatika ITATS KKN 2020
            </p>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('landingpage/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('landingpage/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('landingpage/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('landingpage//vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('landingpage/js/main.js')}}"></script>

</body>

</html>
