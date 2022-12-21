<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::get('lupapassword', 'App\Http\Controllers\AuthController@masukinhewan')->name('masukinhewanverif');
Route::post('lupapassword', 'App\Http\Controllers\AuthController@lanjut2')->name('lanjut2');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('home', 'App\Http\Controllers\HalamanbacaController@home')->name('home');
Route::get('tentang-kami', 'App\Http\Controllers\HalamanbacaController@tentangkami')->name('tentangkami');
Route::get('kategoriberita/{kategori}', 'App\Http\Controllers\HalamanbacaController@kategori')->name('kategori');
Route::get('kategoriberita/baca2/{id}', 'App\Http\Controllers\HalamanbacaController@kabadi')->name('kabadi');
Route::get('baca2/{id}', 'App\Http\Controllers\HalamanBacaController@bacaa')->name('baca');
Route::post('baca2/{id}', 'App\Http\Controllers\HalamanBacaController@berirating')->name('berirating');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin');
        Route::get('profileadmin', 'App\Http\Controllers\AdminController@profil')->name('profil');
        Route::post('profileadmin', 'App\Http\Controllers\AdminController@profilupdate')->name('profilupdate');
        Route::get('laporan-berita', 'App\Http\Controllers\AdminController@lapber')->name('lapber');
        Route::get('analitik-iklan', 'App\Http\Controllers\AdminController@analiklan')->name('analiklan');
        Route::get('invite', 'App\Http\Controllers\AdminController@invites')->name('invites');
        Route::get('invite/{id}', 'App\Http\Controllers\AdminController@destroy')->name('invite.deleteauthor');
        Route::get('tambah-iklan', 'App\Http\Controllers\AdminController@tambik')->name('tambik');
        Route::post('tambah-iklan', 'App\Http\Controllers\AdminController@tambah_iklan')->name('tambah_iklan');
        Route::get('analitik-keuangan', 'App\Http\Controllers\AdminController@analuang')->name('analuang');
        Route::get('add', 'App\Http\Controllers\AdminController@add')->name('add');
        Route::get('informasi-iklan/{id}', 'App\Http\Controllers\AdminController@inforik')->name('inforik');
        Route::post('add', 'App\Http\Controllers\AdminController@tambah_author')->name('tambah_author');
        Route::get('berita-buruk', 'App\Http\Controllers\AdminController@beritaburuk')->name('beritaburuk');
        Route::get('berita-buruk/{id}', 'App\Http\Controllers\AdminController@hapusartikeladmin')->name('hapusartikeladmin');
        Route::get('laporan-berita/{id}', 'App\Http\Controllers\AdminController@hapusartikeladmin2')->name('hapusartikeladmin2');
    });
    Route::group(['middleware' => ['cek_login:author']], function () {
        Route::get('author', 'App\Http\Controllers\AuthorController@index')->name('author');
        Route::get('profileauthor', 'App\Http\Controllers\AuthorController@profilauthor')->name('profilauthor');
        Route::post('profileauthor', 'App\Http\Controllers\AuthorController@profilupdateauthor')->name('profilupdateauthor');
        Route::get('laporan-berita-author', 'App\Http\Controllers\AuthorController@lapberauth')->name('lapberauth');
        Route::get('laporan-berita-author/{id}', 'App\Http\Controllers\AuthorController@hapusartikelauthor')->name('hapusartikelauthor');
        Route::get('buat-artikel', 'App\Http\Controllers\AuthorController@buatart')->name('buatart');
        Route::post('buat-artikel', 'App\Http\Controllers\AuthorController@tambah_artikel')->name('tambah_artikel');
        Route::get('updateartikel/{id}', 'App\Http\Controllers\AuthorController@update_artikelget')->name('update_artikelget');
        Route::post('updateartikel/{id}', 'App\Http\Controllers\AuthorController@update_artikel')->name('update_artikel');
        Route::get('berita-buruk-author', 'App\Http\Controllers\AuthorController@beritaburukauthor')->name('beritaburukauthor');
        Route::get('berita-buruk-author/{id}', 'App\Http\Controllers\AuthorController@hapusartikelauthor2')->name('hapusartikelauthor2');
    });
});
