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
        <td colspan="5" style=" font-size:16px"><b>NISN</b></td>
        <td colspan="2" style=" font-size:16px"><b>Nama</b></td>
        <td colspan="3" style=" font-size:16px"><b>Alamat</b></td>
        <td colspan="3" style=" font-size:16px"><b>TTL</b></td>
        <td colspan="3" style=" font-size:16px"><b>Jenis Kelamin</b></td>
        <td colspan="3" style=" font-size:16px"><b>No. Telp</b></td>
        <td colspan="3" style=" font-size:16px"><b>No. HP</b></td>
        <td colspan="3" style=" font-size:16px"><b>Agama</b></td>
        <td colspan="3" style=" font-size:16px"><b>Asal SMP</b></td>
        {{-- <td colspan="3" style=" font-size:16px"><b>Jurusan</b></td> --}}
        <td colspan="3" style=" font-size:16px"><b>Gelombang</b></td>
      </tr>

    @foreach($daftarulang as $d)
      <tr>
        <td colspan="1" style="text-align:center; font-size:16px">{{ $d->id_pendaftaran }}</td>
        <td colspan="5" style=" font-size:16px">{{ $d->nisn }}</td>
        <td colspan="2" style=" font-size:16px">{{ $d->nama }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->alamat }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->tempat_lahir }}, {{ $d->tanggal_lahir }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->jenis_kelamin }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->nomor_telp }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->nomor_hp }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->agama }}</td>
        <td colspan="3" style=" font-size:16px">{{ $d->asal_smp }}</td>
        {{-- <td colspan="3" style=" font-size:16px">{{ $d->nama_jurusan }}</td> --}}
        <td colspan="3" style=" font-size:16px">{{ $d->nama_gelombang }}</td>
      </tr>
    @endforeach

 </tbody>
</table>
