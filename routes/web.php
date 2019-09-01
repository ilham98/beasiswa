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

Route::get('/', function () {
	$beasiswa = \App\Beasiswa::orderBy('tanggal_tutup', 'desc')->first();
    	$id = $beasiswa->id;
	$mahasiswa = \App\Rangking::where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get();
	$berita = \App\Berita::orderBy('created_at', 'desc')->limit(4)->get();
    return view('welcome', compact('berita', 'mahasiswa'));
});

Route::get('berita', 'BeritaController@index');
Route::get('berita/{id}', 'BeritaController@show');

Route::get('perangkingan', 'PerangkinganController@index');
Route::get('perangkingan/{id}', 'PerangkinganController@show');

Route::get('/a/dashboard', 'Admin\DashboardController@index');
Route::get('/a/mahasiswa', 'Admin\MahasiswaController@index');
Route::get('/a/mahasiswa/{id}', 'Admin\MahasiswaController@show');
Route::get('/a/beasiswa', 'Admin\BeasiswaController@index');
Route::get('/a/beasiswa/tambah', 'Admin\BeasiswaController@create');
Route::post('/a/beasiswa', 'Admin\BeasiswaController@store');
Route::get('/a/beasiswa/{id}', 'Admin\BeasiswaController@show');
Route::get('/a/beasiswa/{id}/edit', 'Admin\BeasiswaController@edit');
Route::put('/a/beasiswa/{id}', 'Admin\BeasiswaController@update');
Route::delete('/a/beasiswa/{id}', 'Admin\BeasiswaController@destroy');
Route::get('/a/beasiswa/{id}/dokumen', 'Admin\BeasiswaDokumenController@index');
Route::get('/a/beasiswa/{id}/dokumen/tambah', 'Admin\BeasiswaDokumenController@create');
Route::post('/a/beasiswa/{id}/dokumen', 'Admin\BeasiswaDokumenController@store');
Route::delete('/a/beasiswa/{id}/dokumen/{dokumen_id}', 'Admin\BeasiswaDokumenController@destroy');
Route::get('/a/beasiswa/{id}/mahasiswa', 'Admin\BeasiswaMahasiswaController@index');
Route::get('/a/beasiswa/{id}/mahasiswa/{nim}', 'Admin\BeasiswaMahasiswaController@show');
Route::put('/a/beasiswa/{id}/mahasiswa/{nim}', 'Admin\BeasiswaMahasiswaController@update');
Route::post('/a/beasiswa/{id}/mahasiswa/{nim}/dokumen', 'Admin\BeasiswaMahasiswaController@dokumen_store');
Route::get('/a/beasiswa/{id}/mahasiswa/{nim}/dokumen/{tipe}/delete', 'Admin\BeasiswaMahasiswaController@dokumen_delete');
Route::get('/a/beasiswa/{id}/perangkingan', 'Admin\PerangkinganController@index');
Route::post('/a/beasiswa/{id}/perangkingan', 'Admin\PerangkinganController@store');

Route::get('/m/dashboard', 'Mahasiswa\DashboardController@index');
Route::get('/m/profil', 'Mahasiswa\ProfilController@index');
Route::put('/m/profil', 'Mahasiswa\ProfilController@update');
Route::put('/m/profil/ktm', 'Mahasiswa\ProfilController@ktm');
Route::get('/m/beasiswa', 'Mahasiswa\BeasiswaController@index');
Route::get('/m/beasiswa-yang-diajukan', 'Mahasiswa\BeasiswaController@index2');
Route::get('/m/beasiswa/tambah', 'Mahasiswa\BeasiswaController@create');
Route::post('/m/beasiswa', 'Mahasiswa\BeasiswaController@store');
Route::get('/m/beasiswa/{id}', 'Mahasiswa\BeasiswaController@show');
Route::put('/m/beasiswa/{id}', 'Mahasiswa\BeasiswaController@update');
Route::delete('/m/beasiswa/{id}', 'Mahasiswa\BeasiswaController@destroy');
Route::post('/m/beasiswa/{id}/ajukan', 'Mahasiswa\BeasiswaController@ajukan');
Route::delete('/m/beasiswa/{id}/ajukan', 'Mahasiswa\BeasiswaController@batalkan_pengajuan');
Route::post('/m/beasiswa/{id}/sinkronisasi', 'Mahasiswa\BeasiswaController@sinkronisasi');
Route::put('/m/beasiswa/{id}/konfirmasi', 'Mahasiswa\BeasiswaController@konfirmasi');
Route::get('/m/ipk', 'Mahasiswa\IPKController@index');
Route::put('/m/ipk', 'Mahasiswa\IPKController@update');
Route::post('/m/beasiswa/{id}/dokumen', 'Mahasiswa\BeasiswaController@dokumen_store');
Route::get('/m/beasiswa/{id}/dokumen/{tipe}/delete', 'Mahasiswa\BeasiswaController@dokumen_delete');
// Route::delete('/m/beasiswa/{id}/dokumen/{id}', 'Mahasiswa\BeasiswaDokumenController@store');

Route::get('/a/berita', 'Admin\BeritaController@index');
Route::get('/a/berita/tambah', 'Admin\BeritaController@create');
Route::post('/a/berita', 'Admin\BeritaController@store');
Route::get('/a/berita/{id}/edit', 'Admin\BeritaController@edit');
Route::put('/a/berita/{id}', 'Admin\BeritaController@update');
Route::delete('/a/berita/{id}', 'Admin\BeritaController@destroy');

Auth::routes();

Route::get('/export/perangkingan/{id}', 'Export\PerangkinganController@export');

Route::get('/register', 'AuthController@showRegisterPage');
Route::post('/register', 'AuthController@register');

Route::get('/home', 'HomeController@index')->name('home');
