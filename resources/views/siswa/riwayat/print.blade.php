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

        <br/><br/>  

        <p style="text-align:center;font-size: 130%; margin: 0; padding: 0;"><b>FORMULIR PENDAFTARAN</b></p>
        <br/>
        <p style="font-size: 110%;"><b>Nomor Formulir :</b>  {{ $formulir->id_pendaftaran }} </p>

        <table class="tbl-data" style="font-size: 100%; border: 1px solid black;padding: 20px;width: 100%;">
            <tbody>
                <tr>
                    <td><b>DATA DIRI</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $formulir->nisn }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $formulir->nama }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $formulir->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $formulir->email }}</td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td>{{ $formulir->tempat_lahir }}, {{ $formulir->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $formulir->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>:</td>
                    <td>{{ $formulir->nomor_hp }}</td>
                </tr>
                <tr>
                    <td>Agamar</td>
                    <td>:</td>
                    <td>{{ $formulir->agama }}</td>
                </tr>
                <tr>
                    <td>Asal SMP</td>
                    <td>:</td>
                    <td>{{ $formulir->asal_smp }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Data Pendaftaran</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_jurusan }}</td>
                </tr>
                <tr>
                    <td>Gelombang</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_gelombang }}</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td>{{ $formulir->nama_tahun_ajaran }}</td>
                </tr>
            </tbody>
        </table>

        <div style="width: 100%; height: 135px; margin-top: 20px;">
            
            <div style="width: 70%; height: 100%; float: left;">
                <p>Pembayaran Formulir Sebesar :</p> 
                <div style="background: #EFEFEF; border: 2px solid black; font-size: 200%; display: inline-block;padding: 10px;"><b>Rp. 100.000,-</b></div>
                <p style="margin: 5px 0 20px 0">Dilakukan melalui transfer atau pembayaran diloket sekolah</p>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <br>
                <p style="text-align:center; margin: 0; padding: 0;">Surabaya, {{ $waktu }} <br>
                TTD Pendaftar </p>
            </div>
        </div>
        <div style="width: 100%; height: auto; margin-top: 10px;">
            <div style="width: 70%; height: 100%; float: left;">
                <i><b>Note: Segera lakukan pendaftaran karena kuota terbatas</b></i>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <p style="text-align:center; margin: 0; padding: 0;">{{ $formulir->nama }}</p>
            </div>
        </div>

</body>
</html>