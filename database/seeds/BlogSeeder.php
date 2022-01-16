<?php

use Illuminate\Database\Seeder;
use \App\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'judul' => 'Selamat Datang Peserta Didik Baru 2020',
            'teks' => '<h1>SELAMAT DATANG PARA PESERTA DIDIK BARU 2020/2021!</h1><p>Semoga ini menjadi awal dari kesuksesan kalian. Kami sampaikan untuk seluruh peserta didik baru akan mulai masuk pada 1 Juni 2020 dengan mengikuti Acara Pengenalan Lingkungan Sekolah.</p><ol><li>&nbsp;Membawa APD (Masker, Hand Sanitizer)</li><li>&nbsp;Membawa pakaian ganti</li><li>&nbsp;Membawa obat2an jika diperlukan</li></ol><p>Rundown Acara sebagai berikut : <br></p><table class="table table-bordered"><tbody><tr><td>Waktu<br></td><td>Nama <br></td><td>Penanggung Jawab<br></td></tr><tr><td>08:00 - 08:15<br></td><td>Sambutan<br></td><td>Kepala Sekolah<br></td></tr><tr><td>08:15 - 08:30</td><td>Sambutan<br></td><td>Ketua Jurusan<br></td></tr><tr><td>08:30 - 08:45</td><td>Pengenalan Lingkungan<br></td><td>Ketua Pelaksana<br></td></tr><tr><td>08:45 - 09:00</td><td>Materi<br></td><td>Pemateri<br></td></tr></tbody></table><p><br></p>'
        ]);
    }
}
