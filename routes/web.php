<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/jurusan', 'JurusanController@index')->name('jurusan');
// Route::get('/formulir', 'FormulirController@index')->name('formulir');



// Route::get('/pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
// Route::get('/pendaftaran/create', 'PendaftaranController@create')->name('pendaftaran.create');
// Route::post('/pendaftaran/store', 'PendaftaranController@store')->name('pendaftaran.store');
// Route::get('/pendaftaran/show/{id}', 'PendaftaranController@show')->name('pendaftaran.show');
// Route::get('/pendaftaran/print/{id}', 'PendaftaranController@print')->name('pendaftaran.print');
// Route::get('/pendaftaran/edit/{id}', 'PendaftaranController@edit')->name('pendaftaran.edit');
// Route::post('/pendaftaran/update', 'PendaftaranController@update')->name('pendaftaran.update');
// Route::post('/pendaftaran/destroy/{id}', 'PendaftaranController@destroy')->name('pendaftaran.destroy');

Route::group(['middleware' => 'guest:siswa'], function () {
    Route::get('login', 'SiswaAuthController@login')->name('siswa.login');
    Route::post('prosesLogin', 'SiswaAuthController@postlogin')->name('siswa.prosesLogin');
    Route::get('daftar','SiswaAuthController@signup')->name('siswa.register');
    Route::post('daftar', 'SiswaAuthController@store')->name('siswa.registerProses');
    Route::get('blog', 'SiswaBlogController@index')->name('siswa.blog');
    Route::get('blog/{id}', 'SiswaBlogController@show')->name('siswa.blog.show');
});

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('admin', 'AdminAuthController@login')->name('admin.login');
    Route::post('admin', 'AdminAuthController@postlogin')->name('admin.prosesLogin');
});

Route::group([ 'prefix' => 'siswa', 'middleware' => 'auth:siswa'], function () {
    // Route::get('home', 'siswaController@index')->name('siswa.home');
    Route::get('profile', 'SiswaController@predaftar')->name('siswa.predaftar');
    Route::post('profile', 'SiswaController@predaftarProses')->name('siswa.predaftarProses');

    Route::get('dokumen', 'SiswaController@dokumenView')->name('siswa.dokumen');
    Route::post('dokumen', 'SiswaController@dokumenProses')->name('siswa.dokumenProses');

    Route::get('nilai', 'SiswaController@nilaiView')->name('siswa.nilai');
    Route::post('nilai', 'SiswaController@nilaiProses')->name('siswa.nilaiProses');

    Route::get('registrasi', 'SiswaController@registrasiView')->name('siswa.registrasi');
    Route::post('registrasi', 'SiswaController@registrasiProses')->name('siswa.registrasiProses');

    Route::get('riwayat', 'SiswaController@riwayatView')->name('siswa.riwayat');
    Route::get('riwayat/print/formulir/{id}', 'SiswaController@printFormulir')->name('siswa.printFormulir');
    Route::post('riwayat/bayar/formulir', 'SiswaController@bayarFormulir')->name('siswa.bayar.formulir');
    Route::post('riwayat/bayar/daftarUlang', 'SiswaController@bayarDaftarUlang')->name('siswa.bayar.daftarUlang');

    Route::get('angsuran', 'SiswaController@angsuran')->name('siswa.angsuran');

    Route::get('ubahkatasandi', 'SiswaController@ubahkatasandi')->name('siswa.ubahkatasandi');
    Route::post('ubahkatasandi', 'SiswaController@ubahkatasandiProses')->name('siswa.ubahkatasandi.store');

    Route::post('logout', 'SiswaAuthController@logout')->name('siswa.logout');
});


Route::group([ 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('home', 'AdminController@index')->name('admin.home');

    Route::get('personel', 'AdminController@personelView')->name('admin.personel');
    Route::get('personel/create', 'AdminController@personelCreate')->name('admin.personel.create');
    Route::post('personel/create', 'AdminController@personelStore')->name('admin.personel.store');
    Route::get('personel/edit/{id}', 'AdminController@personelEdit')->name('admin.personel.edit');
    Route::post('personel/edit', 'AdminController@personelUpdate')->name('admin.personel.update');
    Route::get('personel/aktif/{id}', 'AdminController@personelAktif')->name('admin.personel.aktif');
    Route::get('personel/destroy/{id}', 'AdminController@personelDestroy')->name('admin.personel.destroy');
    Route::get('personel/resetPassword/{id}', 'AdminController@personelResetPassword')->name('admin.personel.resetPassword');

    Route::get('tahunajaran', 'AdminController@tahunajaranView')->name('admin.tahunajaran');
    Route::get('tahunajaran/create', 'AdminController@tahunajaranCreate')->name('admin.tahunajaran.create');
    Route::post('tahunajaran/create', 'AdminController@tahunajaranStore')->name('admin.tahunajaran.store');
    Route::get('tahunajaran/edit/{id}', 'AdminController@tahunajaranEdit')->name('admin.tahunajaran.edit');
    Route::post('tahunajaran/edit', 'AdminController@tahunajaranUpdate')->name('admin.tahunajaran.update');
    Route::get('tahunajaran/aktif/{id}', 'AdminController@tahunajaranAktif')->name('admin.tahunajaran.aktif');
    Route::get('tahunajaran/destroy/{id}', 'AdminController@tahunajaranDestroy')->name('admin.tahunajaran.destroy');

    Route::get('jurusan', 'JurusanController@index')->name('admin.jurusan');
    Route::get('jurusan/create', 'JurusanController@create')->name('admin.jurusan.create');
    Route::post('jurusan/store', 'JurusanController@store')->name('admin.jurusan.store');
    Route::get('jurusan/edit/{id}', 'JurusanController@edit')->name('admin.jurusan.edit');
    Route::patch('jurusan/update/{id}', 'JurusanController@update')->name('admin.jurusan.update');
    Route::delete('jurusan/destroy/{id}', 'JurusanController@destroy')->name('admin.jurusan.destroy');

    Route::get('daftargelombang', 'GelombangController@daftarGelombangIndex')->name('admin.daftargelombang');
    Route::get('daftargelombang/create', 'GelombangController@daftarGelombangCreate')->name('admin.daftargelombang.create');
    Route::post('daftargelombang/store', 'GelombangController@daftarGelombangStore')->name('admin.daftargelombang.store');
    Route::get('daftargelombang/edit/{id}', 'GelombangController@daftarGelombangEdit')->name('admin.daftargelombang.edit');
    Route::patch('daftargelombang/{id}/update', 'GelombangController@daftarGelombangUpdate')->name('admin.daftargelombang.update');
    Route::delete('daftargelombang/destroy/{id}', 'GelombangController@daftarGelombangDestroy')->name('admin.daftargelombang.destroy');

    Route::get('gelombang', 'GelombangController@index')->name('admin.gelombang');
    Route::get('gelombang/create', 'GelombangController@create')->name('admin.gelombang.create');
    Route::get('gelombang/edit/{id}', 'GelombangController@edit')->name('admin.gelombang.edit');
    Route::delete('gelombang/destroy/{id}', 'GelombangController@destroy')->name('admin.gelombang.destroy');
    Route::post('gelombang/store', 'GelombangController@store')->name('admin.gelombang.store');
    Route::patch('gelombang/{id}/update', 'GelombangController@update')->name('admin.gelombang.update');
    Route::get('gelombang/aktif/{id}', 'GelombangController@gelombangAktif')->name('admin.gelombang.aktif');

    Route::get('listbiaya', 'BiayaGelombangController@listBiayaIndex')->name('admin.listbiaya');
    Route::get('listbiaya/create', 'BiayaGelombangController@listBiayaCreate')->name('admin.listbiaya.create');
    Route::get('listbiaya/edit/{id}', 'BiayaGelombangController@listBiayaEdit')->name('admin.listbiaya.edit');
    Route::delete('listbiaya/destroy/{id}', 'BiayaGelombangController@listBiayaDestroy')->name('admin.listbiaya.destroy');
    Route::post('listbiaya/store', 'BiayaGelombangController@listBiayaStore')->name('admin.listbiaya.store');
    Route::patch('listbiaya/{id}/update', 'BiayaGelombangController@listBiayaUpdate')->name('admin.listbiaya.update');
    Route::get('listbiaya/aktif/{id}', 'BiayaGelombangController@listBiayaAktif')->name('admin.listbiaya.aktif');

    Route::get('biayaformulir', 'BiayaGelombangController@index')->name('admin.biayaformulir');
    Route::get('biayaformulir/create', 'BiayaGelombangController@create')->name('admin.biayaformulir.create');
    Route::get('biayaformulir/edit/{id}', 'BiayaGelombangController@edit')->name('admin.biayaformulir.edit');
    Route::delete('biayaformulir/destroy/{id}', 'BiayaGelombangController@destroy')->name('admin.biayaformulir.destroy');
    Route::post('biayaformulir/store', 'BiayaGelombangController@store')->name('admin.biayaformulir.store');
    Route::patch('biayaformulir/{id}/update', 'BiayaGelombangController@update')->name('admin.biayaformulir.update');
    Route::get('biayaformulir/show/{id}', 'BiayaGelombangController@show')->name('admin.biayaformulir.aktif');

    Route::get('siswa', 'SiswaAdminController@index')->name('admin.siswa');
    Route::get('siswa/create', 'SiswaAdminController@create')->name('admin.siswa.create');
    Route::get('siswa/{id}/edit', 'SiswaAdminController@edit')->name('admin.siswa.edit');
    Route::patch('siswa/{id}/update', 'SiswaAdminController@update')->name('admin.siswa.update');
    Route::post('siswa/store', 'SiswaAdminController@store')->name('admin.siswa.store');
    Route::delete('siswa/destroy/{id}', 'SiswaAdminController@destroy')->name('admin.siswa.destroy');
    Route::get('siswa/resetPassword/{id}', 'SiswaAdminController@resetPassword')->name('admin.siswa.resetPassword');

    Route::get('dokumen', 'DokumenController@index')->name('admin.dokumen');
    Route::get('dokumen/create', 'DokumenController@create')->name('admin.dokumen.create');
    Route::get('dokumen/aktif/{id}', 'DokumenController@aktif')->name('admin.dokumen.aktif');
    Route::post('dokumen/store', 'DokumenController@store')->name('admin.dokumen.store');
    Route::get('dokumen/{id}/edit', 'DokumenController@edit')->name('admin.dokumen.edit');
    Route::patch('dokumen/{id}/update', 'DokumenController@update')->name('admin.dokumen.update');
    Route::delete('dokumen/destroy/{id}', 'DokumenController@destroy')->name('admin.dokumen.destroy');

    Route::get('nilai', 'NilaiController@index')->name('admin.nilai');
    Route::get('nilai/create', 'NilaiController@create')->name('admin.nilai.create');
    Route::get('nilai/aktif/{id}', 'NilaiController@aktif')->name('admin.nilai.aktif');
    Route::post('nilai/store', 'NilaiController@store')->name('admin.nilai.store');
    Route::get('nilai/{id}/edit', 'NilaiController@edit')->name('admin.nilai.edit');
    Route::patch('nilai/{id}/update', 'NilaiController@update')->name('admin.nilai.update');
    Route::delete('nilai/destroy/{id}', 'NilaiController@destroy')->name('admin.nilai.destroy');

    Route::get('formulir', 'FormulirController@index')->name('admin.formulir');
    Route::get('formulir/verifikasi/{id}', 'FormulirController@verifikasi')->name('admin.formulir.verifikasi');
    Route::get('formulir/show/{id}', 'FormulirController@show')->name('admin.formulir.show');
    Route::get('formulir/print/{id}', 'FormulirController@print')->name('admin.formulir.print');
    Route::get('formulir/terima/{id}', 'FormulirController@terima')->name('admin.formulir.terima');
    Route::get('formulir/tolak/{id}', 'FormulirController@tolak')->name('admin.formulir.tolak');


    Route::get('daftarulang', 'DaftarulangController@index')->name('admin.daftarulang');
    Route::get('daftarulang/show/{id}', 'DaftarulangController@show')->name('admin.daftarulang.show');
    Route::get('daftarulang/verifikasi/{id}', 'DaftarulangController@verifikasi')->name('admin.daftarulang.verifikasi');


    Route::get('fitur', 'AdminController@fiturView')->name('admin.fitur');
    Route::get('status', 'AdminController@statusView')->name('admin.status');
    Route::get('informasi', 'AdminController@informasiView')->name('admin.informasi');



    Route::get('kategoriangsuran', 'KategoriAngsuranController@kategoriangsuranView')->name('admin.kategoriangsuran');
    Route::get('kategoriangsuran/create', 'KategoriAngsuranController@kategoriangsuranCreate')->name('admin.kategoriangsuran.create');
    Route::post('kategoriangsuran/create', 'KategoriAngsuranController@kategoriangsuranStore')->name('admin.kategoriangsuran.store');
    Route::get('kategoriangsuran/edit/{id}', 'KategoriAngsuranController@kategoriangsuranEdit')->name('admin.kategoriangsuran.edit');
    Route::post('kategoriangsuran/edit', 'KategoriAngsuranController@kategoriangsuranUpdate')->name('admin.kategoriangsuran.update');
    Route::get('kategoriangsuran/aktif/{id}', 'KategoriAngsuranController@kategoriangsuranAktif')->name('admin.kategoriangsuran.aktif');
    Route::get('kategoriangsuran/destroy/{id}', 'KategoriAngsuranController@kategoriangsuranDestroy')->name('admin.kategoriangsuran.destroy');

    Route::get('angsuran', 'AngsuranController@angsuranView')->name('admin.angsuran');
    Route::get('angsuran/create', 'AngsuranController@angsuranCreate')->name('admin.angsuran.create');
    Route::post('angsuran/create', 'AngsuranController@angsuranStore')->name('admin.angsuran.store');
    Route::get('angsuran/edit/{id}', 'AngsuranController@angsuranEdit')->name('admin.angsuran.edit');
    Route::post('angsuran/edit', 'AngsuranController@angsuranUpdate')->name('admin.angsuran.update');
    Route::get('angsuran/aktif/{id}', 'AngsuranController@angsuranAktif')->name('admin.angsuran.aktif');
    Route::get('angsuran/destroy/{id}', 'AngsuranController@angsuranDestroy')->name('admin.angsuran.destroy');


    Route::get('blog', 'BlogController@blogView')->name('admin.blog');
    Route::get('blog/create', 'BlogController@blogCreate')->name('admin.blog.create');
    Route::post('blog/create', 'BlogController@blogStore')->name('admin.blog.store');
    Route::get('blog/edit/{id}', 'BlogController@blogEdit')->name('admin.blog.edit');
    Route::post('blog/edit', 'BlogController@blogUpdate')->name('admin.blog.update');
    Route::get('blog/aktif/{id}', 'BlogController@blogAktif')->name('admin.blog.aktif');
    Route::get('blog/destroy/{id}', 'BlogController@blogDestroy')->name('admin.blog.destroy');


    Route::get('unduhpresensi', 'AdminController@unduhpresensiView')->name('admin.unduhpresensi');
    Route::get('ubahkatasandi', 'AdminController@ubahkatasandi')->name('admin.ubahkatasandi');
    Route::post('ubahkatasandi', 'AdminController@ubahkatasandiProses')->name('admin.ubahkatasandi.store');


    Route::post('logout', 'AdminAuthController@logout')->name('admin.logout');
});


Route::get('coba', 'AdminController@coba');


// Auth::routes();
