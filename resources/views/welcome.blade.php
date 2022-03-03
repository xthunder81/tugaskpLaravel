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
                <li><a href="#hero">Home</a></li>
                <li><a href="#fasilitas">Fasilitas</a></li>
                <li><a href="#keuntungan">Keuntungan</a></li>
                <li><a href="#syarat-pendaftaran">Syarat Pendaftaran</a></li>
                <li><a href="#langkah-pendaftaran">Langkah Pendaftaran</a></li>
                <li><a href="#kegiatan">Kegiatan</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <li><a href="{{ route('siswa.blog') }}">Blog</a></li>
            </ul>
        </nav><!-- .nav-menu -->
            <div class="top-right links">

            </div>


    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<br/><br/><br/>
<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up" style="margin-top: 290px;">
        <img src="{{ url('asset/logo.png') }}" alt="SI-PPDB" class="mx-auto d-block mb-3"
             style="opacity: .8; width:150px; max-width: 100%; height: 150px; max-height: 100%;">
        <h1 style="width: 100% !important">{{ env("NAMASEKOLAH","") }}</h1>
        <h2 class="mb-4">Mari bergabung bersama kami dengan cara klik tombol dibawah ini</h2>
        @if (\Auth::guard('siswa')->user() != NULL)
            <a href="{{ route('siswa.predaftar') }}" class="btn-get-started scrollto">Buka Dashboard PPDB</a>
        @else
            <a href="{{ route('siswa.register') }}" class="btn-get-started">Daftar Sekarang</a> atau
            <a href="{{ route('siswa.login') }}" class="btn-get-started">Sign In</a>
        @endif


        <img src="{{asset('landingpage/img/hero-img.svg')}}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="fasilitas" class="about">
        <div class="container">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                        <h3>Fasilitas</h3>
                        <p>
                            Berikut ini merupakan fasilitas yang dapat anda gunakan di SMK Bahrul Ulum Surabaya
                        </p>
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-wifi"></i>
                                <h4>Free Wifi</h4>
                                <p>Tersedianya jaringan wifi untuk menunjang pembelajaran.</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-book"></i>
                                <h4>Perpustakaan</h4>
                                <p>Memiliki perpustakaan yang dapat digunakan untuk menambah wawasan dan mencari referensi - referensi buku.</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-laptop"></i>
                                <h4>Laboratorium</h4>
                                <p>Terdapat laboratorium yang dapat digunakan untuk melakukan kegiatan praktek.</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-home"></i>
                                <h4>Fasilitas Tempat Sholat</h4>
                                <p>Terdapat tempat untuk beribadah yang dapat digunakan oleh seluruh pihak sekolah.</p>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="keuntungan" class="features" data-aos="fade-up">
        <div class="container">

            <div class="section-title">
                <h2>Keuntungan</h2>
                <p>Keuntungan yang anda dapatkan bila bergabung dengan kami.</p>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{asset('landingpage/img/SERAGAM SMA1.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
                    <h3>Seragam</h3>
                    <p class="font-italic">
                        Siswa mendapatkan
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i> 1 stel seragam jadi.</li>
                        <li><i class="icofont-check"></i> 1 stel seragam olahraga.</li>
                        <li><i class="icofont-check"></i> 1 atasan baju praktek jadi.</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{asset('landingpage/img/badge.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Atribut</h3>
                    <p class="font-italic">
                        Siswa mendapatkan
                    </p>
                    <ul>
                        <li><i class="icofont-check"></i> 1 jilbab bagi perempuan.</li>
                        <li><i class="icofont-check"></i> 1 dasi bagi laki-laki.</li>
                        <li><i class="icofont-check"></i> 1 ikat pinggang.</li>
                        <li><i class="icofont-check"></i> 2 pasang bedge.</li>
                        <li><i class="icofont-check"></i> 1 ikat pinggang.</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="{{asset('landingpage/img/rogu-c-3.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5" data-aos="fade-left">
                    <h3>Ujian</h3>
                    <p>Siswa gratis biaya ujian:</p>
                    <ul>
                        <li><i class="icofont-check"></i>USBN.</li>
                        {{-- <li><i class="icofont-check"></i>UNAS.</li> --}}
                        <li><i class="icofont-check"></i>PAS.</li>
                        <li><i class="icofont-check"></i>PAT & PTS.</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{asset('landingpage/img/bus.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Wisata Outdoor</h3>
                    <ul>
                        <li><i class="icofont-check"></i>Field Trip.</li>
                        <li><i class="icofont-check"></i>Tahsil</li>
                        <li><i class="icofont-check"></i>LDKS</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="{{asset('landingpage/img/chess.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5" data-aos="fade-left">
                    <h3>Wisata Outdoor</h3>
                    <ul>
                        <li><i class="icofont-check"></i>Virtual Field Trip</li>
                        <li><i class="icofont-check"></i>Prakarya</li>
                        <li><i class="icofont-check"></i>Science Day</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{asset('landingpage/img/beasiswa.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Beasiswa</h3>
                    <p style="margin:0">Setiap siswa yang berprestasi mendapat beasiswa</p>
                    <span style="font-size: 80%; margin: 0;">Dapatkan Potongan 50% SPP bila mendaftar di gelombang Inden</span>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="syarat-pendaftaran" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Syarat Pendaftaran</h2>
                <p>Adapun persyaratan yang harus anda persiapkan untuk melakukan pendaftaran di sekolah kami sebagai berikut :</p>
            </div>

            <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                        <h4 class="title">DAFTAR AKUN</h4>
                        <p class="description">Calon siswa diminta untuk mendaftar akun pada web ppdb.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <h4 class="title">MELENGKAPI DATA DIRI</h4>
                        <p class="description">Calon siswa diminta untuk melengkapi informasi data diri dan orang tua</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <h4 class="title">KARTU KELUARGA</h4>
                        <p class="description">Calon siswa diminta untuk Upload scan/foto Kartu Keluarga asli</p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <h4 class="title">Akte Kelahiran</h4>
                        <p class="description">Calon siswa diminta untuk Upload scan/foto Akte Kelahiran asli</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <h4 class="title">SK/Rapor</h4>
                        <p class="description">Calon siswa diminta untuk Upload scan/foto Surat Keterangan Lulus dari SMP/Rapor asli Semester ganjil kelas 9</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <h4 class="title">Sertifikat prestasi</h4>
                        <p class="description">Calon siswa dapat melengkapi Sertifikat Prestasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="langkah-pendaftaran" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Langkah - Langkah Pendaftaran</h2>
                <p>Berikut ini merupakan langkah-langkah pendaftaran peserta didik baru di sekolah kami.</p>
            </div>

            <img src="{{asset('landingpage/img/alur.png')}}" class="mx-auto d-block">

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="kegiatan" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kegiatan</h2>
                <p>Adapun juga kegiatan - kegiatan di sekolah kami.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-app">LDKS dan Pramuka</li>
                        <li data-filter=".filter-card">Lomba Pencak Silat</li>
                        <li data-filter=".filter-web">Upacara dan Wisuda</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan LDKS Maarif.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kegiatan LDKS Ma'arif</h4>
                            <p>LDKS dan Pramuka</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan LDKS Maarif.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kegiatan LDKS Ma'arif"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/Upacara dan Wisuda SMK/Upacara 17 Agustus 2019.jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Upacara 17 Agustus 2019</h4>
                            <p>Upacara dan Wisuda</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/Upacara dan Wisuda SMK/Upacara 17 Agustus 2019.jpeg')}}" data-gall="portfolioGallery" class="venobox" title="Upacara 17 Agustus 2019"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan Pramuka 1.jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kegiatan Pramuka</h4>
                            <p>LDKS dan Pramuka</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan Pramuka 1.jpeg')}}" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/Lomba Pencak silat/pencak silat (2).jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Pencak Silat</h4>
                            <p>Lomba Pencak silat</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/Lomba Pencak silat/pencak silat (2).jpeg')}}" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/Upacara dan Wisuda SMK/Wisuda SMK 2019.jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Wisuda SMK 2019</h4>
                            <p>Upacara dan Wisuda</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/Upacara dan Wisuda SMK/Wisuda SMK 2019.jpeg')}}" data-gall="portfolioGallery" class="venobox" title="Wisuda SMK 2019"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan Pramuka 2.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Kegiatan Pramuka</h4>
                            <p>LDKS dan Pramuka</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/LDKS dan Pramuka/Kegiatan Pramuka 2.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Kegiatan Pramuka"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/Lomba Pencak silat/pencak silat (1).jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Pencak Silat</h4>
                            <p>Lomba Pencak Silat</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/Lomba Pencak silat/pencak silat (1).jpeg')}}" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/LDKS dan Pramuka/LDKS 2019 (2).jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>LDKS 2019</h4>
                            <p>LDKS dan Pramuka</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/LDKS dan Pramuka/LDKS 2019 (2).jpeg')}}" data-gall="portfolioGallery" class="venobox" title="LDKS 2019"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('landingpage/img/LDKS dan Pramuka/LDKS 2019 (1).jpeg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>LDKS 2019</h4>
                            <p>LDKS dan Pramuka</p>
                            <div class="portfolio-links">
                                <a href="{{asset('landingpage/img/LDKS dan Pramuka/LDKS 2019 (1).jpeg')}}" data-gall="portfolioGallery" class="venobox" title="LDKS 2019"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="contact section-bg" style="min-height: 650px">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Alamat</h3>
                                <p>{{ env('ALAMATSEKOLAH','') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>{{ env('EMAILSEKOLLAH', '')}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telepon</h3>
                                <p>{{ env('NOMORHPSEKOLAH','') }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mt-4 mt-md-0">
                    <img src="{{asset('asset/logo.png')}}" style="width: 300px;max-width: 100%;">
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <p>
                Copyright &copy;{{ now()->year }} All rights reserved | SMPT DAARUL MUTTAQIEN
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
