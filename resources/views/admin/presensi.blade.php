<table>
  <tbody>
      <tr>
          <td colspan="16" style="text-align:center; font-size:16px"><h1><b>Presensi Siswa Tahun Ajaran {{ $daftarulang[0]->nama_tahun_ajaran }}</b></h1></td>
      </tr>
      <tr>
        <td colspan="16" style="text-align:center; font-size:16px"><h1></h1></td>
      </tr>
      <tr>
        <td colspan="1" style="text-align:center; font-size:16px"><b>id pendaftaran</b></td>
        <td colspan="1" style=" font-size:16px"><b>Kartu Keluarga</b></td>
        <td colspan="1" style=" font-size:16px"><b>NISN</b></td>
        <td colspan="1" style=" font-size:16px"><b>Nama Siswa</b></td>
        <td colspan="1" style=" font-size:16px"><b>Alamat KTP</b></td>
        <td colspan="1" style=" font-size:16px"><b>Alamat Domisli</b></td>
        <td colspan="2" style=" font-size:16px"><b>TTL</b></td>
        <td colspan="1" style=" font-size:16px"><b>Jenis Kelamin</b></td>
        <td colspan="1" style=" font-size:16px"><b>No. Telp</b></td>
        <td colspan="1" style=" font-size:16px"><b>No. HP</b></td>
        <td colspan="1" style=" font-size:16px"><b>Asal SD</b></td>
        <td colspan="1" style=" font-size:16px"><b>Asal Sekolah SD</b></td>
        <td colspan="1" style=" font-size:16px"><b>Status Tempat Tinggal</b></td>
        <td colspan="1" style=" font-size:16px"><b>Transportasi</b></td>
        <td colspan="1" style=" font-size:16px"><b>Berat Badan</b></td>
        <td colspan="1" style=" font-size:16px"><b>Tinggi Badan</b></td>
        <td colspan="1" style=" font-size:16px"><b>Jarak Rumah Ke Sekolah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Waktu Tempuh Ke Sekolah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Anak Ke</b></td>
        <td colspan="1" style=" font-size:16px"><b>Jumlah Saudara</b></td>
        <td colspan="1" style=" font-size:16px"><b>NIK Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Nama Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Alamat Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>No HP Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Pendidikan Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Pekerjaan Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>Gaji Ayah</b></td>
        <td colspan="1" style=" font-size:16px"><b>NIK Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Nama Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Alamat Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>No HP Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Pendidikan Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Pekerjaan Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Gaji Ibu</b></td>
        <td colspan="1" style=" font-size:16px"><b>Gelombang</b></td>
      </tr>

    @foreach($daftarulang as $d)
      <tr>
        <td colspan="1" style="text-align:center; font-size:16px">{{ $d->id_pendaftaran }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->kartu_keluarga }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nisn }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nama }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->alamat_ktp }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->alamat_domisili }}</td>
        <td colspan="2" style=" font-size:16px">{{ $d->tempat_lahir }}, {{ $d->tanggal_lahir }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->jenis_kelamin }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nomor_telp }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nomor_hp }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->asal_sd }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->alamat_sekolah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->status_tempattinggal }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->transportasi }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->berat_badan }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->tinggi_badan }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->jarak_kesekolah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->waktu_tempuh }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->anak_ke }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->jumlah_saudara }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nik_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nama_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->alamat_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nomor_hp_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->pendidikan_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->pekerjaan_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->gaji_ayah }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nik_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nama_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->alamat_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nomor_hp_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->pendidikan_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->pekerjaan_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->gaji_ibu }}</td>
        <td colspan="1" style=" font-size:16px">{{ $d->nama_gelombang }}</td>
      </tr>
    @endforeach

 </tbody>
</table>
