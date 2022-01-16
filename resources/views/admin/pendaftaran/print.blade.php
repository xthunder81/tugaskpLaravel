<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .tabelinfo *{
            font-size: 13pt;
        }
        .headerinfo *{
            font-size: 18pt;
            line-height: 0.9;
        }
        .tbl-data tr td{
            padding: 2px;
        }
        .checkbox{
            border: 1px solid black;
        }
    </style>

</head>
<body>
        <div class="information">
            <table width="100%" style="border-bottom:2px solid #808080;">
                <tr>
                    <td align="left" style="width: 15%;">
                        <img src="{{ public_path('') . '/asset/logoikip.png'}}" alt="Logo IKIP" style="width: 120px;height:auto;">
                    </td>
                    <td align="center" style="width: 70%" class="headerinfo">
                            <span style="font-weight: bold;">SMK IKIP Surabaya</span> <br>
                            <span style="font-size: 100%;">Kompetensi Keahlian Pemasaran dan Multimedia <br> Jl. Teratai 4, Tambak Sari 60136 Surabaya,</span> <br>
                            <span style="font-size: 96%;">Telp. 031-99445639, 082229020803 Email : smkikipsby@gmail.com</span>
                    </td>
                    <td align="right" style="width: 15%;">
                        <img src="{{ public_path('') . '/asset/logosmkbisa.png'}}" alt="Logo SMK Hebat" style="width: 170px;height:auto;">
                    </td>
                </tr>
            </table>
        </div>

        <br/>

        <p style="text-align:center;font-size: 130%; margin: 0; padding: 0;"><b>KWITANSI PENDAFTARAN</b></p>
        
        <p style="font-size: 110%;"><b>Nomor Formulir :</b>  {{ $pendaftaran->nomor_formulir }}</p>

        <table class="tbl-data" style="font-size: 100%; border: 1px solid black;padding: 20px;width: 100%;">
            <tr>
                <td>Sudah terima dari</td>
                <td>:</td>
                <td>{{ $pendaftaran->nama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pendaftaran->alamat }}</td>
            </tr>
            <tr>
                <td>Banyaknya uang</td>
                <td>:</td>
                <td>Seratus Ribu Rupiah</td>
            </tr>
            <tr>
                <td>Untuk pembayaran</td>
                <td>:</td>
                <td>Pembelian Formulir Penerimaan Peserta Didik Baru 2019</td>
            </tr>
            <tr>
                <td>Program keahilian</td>
                <td>:</td>
                <td>{{ $pendaftaran->nama_jurusan }}</td>
            </tr>
        </table>

        <div style="width: 100%; height: 135px; margin-top: 20px;">
            <div style="width: 40%; height: 100%; float: left;">
                <div style="background: #EFEFEF; border: 2px solid black; font-size: 200%; display: inline-block;padding: 10px;"><b>Rp. 2.250.000,-</b></div>
            </div>
            <div style="width: 30%; height: 100%; float: left;">
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->kaos_olahraga == 1){ echo 'checked'; } @endphp> Kaos Olahraga</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->jas_almamater == 1){ echo 'checked'; } @endphp> Jas Almamater</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->topi == 1){ echo 'checked'; } @endphp> Topi</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->ikat_pinggang == 1){ echo 'checked'; } @endphp> Ikat Pinggang</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->baju_batik == 1){ echo 'checked'; } @endphp> Baju Batik</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->baju_praktik == 1){ echo 'checked'; } @endphp> Baju Praktik</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->rompi == 1){ echo 'checked'; } @endphp> Rompi</p>
                <p style="margin: 6px; 0; padding: 0;"><input class="checkbox" type="checkbox" @php if($pendaftaran->dasi == 1){ echo 'checked'; } @endphp> Dasi Hitam + Abu-abu</p>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <p style="text-align:center; margin: 0; padding: 0;">Surabaya, 12 March 2019 <br>
                Petugas Pendaftaran</p>
            </div>
        </div>
        <div style="width: 100%; height: auto; margin-top: 10px;">
            <div style="width: 40%; height: 100%; float: left;">
                <i><b>Note: Pra MPLS 12 Juli 2019, <br> Pukul 06.30 WIB. Mengenakan <br> Seragam Putih Biru (SMP)</b></i>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <p style="text-align:center; margin: 0; padding: 0;">{{ $pendaftaran->name }}</p>
            </div>
        </div>

</body>
</html>