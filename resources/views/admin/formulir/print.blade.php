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
                        <img src="{{ public_path('') . '/asset/logo.png'}}" alt="Logo IKIP" style="width: 120px;height:auto;">
                    </td>
                    <td align="center" style="width: 70%" class="headerinfo">
                            <span style="font-weight: bold;">{{ env('NAMASEKOLAH')}}</span> <br>
                            <span style="font-size: 100%;">{{ env('ALAMATSEKOLAH')}},</span> <br>
                            <span style="font-size: 96%;">Telp. 031-99445639, 082229020803 Email : smkikipsby@gmail.com</span>
                    </td>
                    <td align="right" style="width: 15%;">
                        <img src="{{ public_path('') . '/asset/logosmpbisa.png'}}" alt="Logo SMP Hebat" style="width: 170px;height:auto;">
                    </td>
                </tr>
            </table>
        </div>

        <br/>

        <p style="text-align:center;font-size: 130%; margin: 0; padding: 0;"><b>KWITANSI FORMULIR</b></p>

        <p style="font-size: 110%;"><b>Nomor Formulir :</b>  {{ $formulir->id_pendaftaran }}</p>

        <table class="tbl-data" style="font-size: 100%; border: 1px solid black;padding: 20px;width: 100%;">
            <tr>
                <td>Sudah terima dari</td>
                <td>:</td>
                <td>{{ $formulir->nama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $formulir->alamat_domisili }}</td>
            </tr>
            <tr>
                <td>Banyaknya uang</td>
                <td>:</td>
                <td>{{$formulir->biaya}}</td>
            </tr>
            <tr>
                <td>Untuk pembayaran</td>
                <td>:</td>
                <td>{{$formulir->rincian_biaya_daftar_ulang}}</td>
            </tr>
            <tr>
                <td>Program keahilian</td>
                <td>:</td>
                <td>{{ $formulir->nama_gelombang }}</td>
            </tr>
        </table>

        <div style="width: 100%; height: 135px; margin-top: 20px;">
            <div style="width: 70%; height: 100%; float: left;">
                <div style="background: #EFEFEF; border: 2px solid black; font-size: 200%; display: inline-block;padding: 10px;"><b><?php echo "Rp. " . number_format($formulir->biaya, 2, ",", ".");?></b></div>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <p style="text-align:center; margin: 0; padding: 0;">Surabaya, <br>
                Petugas Pendaftaran</p>
            </div>
        </div>
        <div style="width: 100%; height: auto; margin-top: 10px;">
            <div style="width: 70%; height: 100%; float: left;">
                <i><b>Note: Segera lakukan pendaftaran karena kuota terbatas</b></i>
            </div>
            <div style="width: 30%; height: 100%; float: right;">
                <p style="text-align:center; margin: 0; padding: 0;">{{ Auth::user()->nama }}</p>
            </div>
        </div>

</body>
</html>
