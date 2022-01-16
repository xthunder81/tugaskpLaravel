<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		@page {
			margin: 70px 25px;
		}
		header{
			/* position: fixed; top: -60px; left: 0px; right: 0px; height: 100px; */
		}
		footer{
			bottom: -60px; left: 0px; right: 0px; height: 170px;
			font-size: 15pt;
		}
		.content{
			
		}
		.sub-info{
			float: left;
			width: 100%;
		}
		.page-break{
			page-break-before: always;
		}
	
		div.kiri table tr td{
			height: 3%;
		}

		div.content table tr td{
			text-align: center; border:1px solid black;"
		}

		div.content table tr th{
			text-align: center; border:1px solid black;"
		}

		div.content table{
			page-break-inside: auto;
		}

		div.content table tr{
			page-break-inside: avoid; page-break-after: auto;
		}
		div.content table thead{
			display: table-header-group;
		}
	</style>
</head>
<body>
	<?php 
		for($page = 0; $page<4; $page++){
	?>
			<header>
			<div class="sub-info">
				<table width="100%">
					<tr>
						<td colspan="3"><center><h3><u>LAPORAN SEDIAAN BARANG KENA CUKAI
							<br>HASIL TEMBAKAU/ETIL ALKOHOL/MINUMAN YANG MENGANDUNG ETIL ALKOHOL</u></h3></center></td>
					</tr>
					<tr>
						<td width="17%"><b>Nama Perusahaan</b></td>
						<td width="67%"> : &nbsp; &nbsp; NAMA PERUSAHAAN</td>
						<td style="border-style: solid; text-align: center;">LACK - 11</td>
					</tr>
					<tr>
						<td><b>NPPBKC</b></td>
						<td> :  &nbsp; &nbsp;NPPBKC</td>
					</tr>
					<tr>
						<td><b>NPWP</b></td>
						<td> :  &nbsp; &nbsp;NPWP</td>
					</tr>
				<tr>
						<td><b>Alamat Perusahaan</b></td>
						<td> :   &nbsp; &nbsp;ALAMAT</td>
					</tr>
					<tr>+
						<td><b>Periode Pelaporan</b></td>
						<td> :  &nbsp; &nbsp;PERIODE PELAPORAN</td>
					</tr>
				</table>     
			</div>	
		</header>
		<div class="content" style="margin-top: 170px;">
			<div class="content">
				<table width="100%" style="table-layout: fixed; border:1px solid black; border-collapse: collapse; font-size: 8pt;">
					<thead>
						<tr>
							<th height="3%" rowspan="2" width="3%">No.</th>
							<th rowspan="2" width="12%">Jenis <br>Barang/Merek/HJE/<br>Tarif/Kadar/Isi/Pita<br>Cukai</th>
							<th rowspan="2">Satuan<br>(Bungkus/Liter/<br>Kemasan)</th>
							<th rowspan="2">Saldo<br>Awal</th>
							<th rowspan="2" >Pemasukan/<br>Produksi</th>
							<th rowspan="2">Pengeluaran</th> 
							<th rowspan="2">BKC Musnah/<br>RusaK</th> 
							<th rowspan="2">Saldo Akhir</th> 
							<th colspan="2">Saldo (Khusus HT)</th>
							<th rowspan="2">Keterangan</th>
						</tr>
						<tr>
							<th height="10%" class="text-center" style="border:1px solid black;">Sudah Dilekati<br>(Bungkus)</th>
							<th class="text-center" style="border:1px solid black;">Belum Dilekati<br>(Bungkus)</th> 
						</tr>
					</thead>
					<tbody>
							<?php
									for($i=1;$i<=31;$i++){
							?>

							<tr>    
								<td height="5%"><?= ($page*31) + $i?></td>              
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
								<td>INI ADALAH DATA</td>
							</tr>

						<?php
							}
						?>
					</tbody>
				</table>
			</div>	
		</div>
		<footer>
			<div class="sub-info">
				<table width="100%">
					<tr>
						<td width="70%">Diketahui Pejabat Bea Cukai</td>
						<td>Dibuat di</td>
					</tr>
					<tr>
						<td>Diterima Tanggal: </td>
						<td>Pada tanggal</td>
					</tr>
					<tr>
						<td>a.n. Kepala Kantor,</td>
						<td>Pengusaha
					</tr>
					<tr>
						<td>NIP</td>
					</tr>
				</table>     
			</div>	
		</footer>

	<?php
		}
	?>

</body>
</html>