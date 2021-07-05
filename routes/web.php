<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::middleware('guest')->get('/', function () {
    return view('auth.login');
});



Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/menu')->name('menu.')->middleware('auth')->group(function () {
    Route::prefix('/admin')->name('admin.')->middleware('CheckRole:admin')->group(function () {
        Route::resource('/user', 'UserController');
        Route::resource('/perusahaan', 'PerusahaanController');
        Route::resource('/jurusan', 'JurusanController');
        Route::resource('/periode', 'PeriodeController');
        Route::resource('/siswa', 'SiswaController');

        Route::prefix('/akun')->group(function () {
            Route::get('/user/role/{data}', 'UserController@role')->name('user.role');
            Route::get('/siswa/export', 'SiswaController@export')->name('siswa.export');
            Route::post('/siswa/import', 'SiswaController@import')->name('siswa.import');
            Route::get('/user/export', 'UserController@export')->name('user.export');
            Route::post('/user/import', 'UserController@import')->name('user.import');
        });

        Route::prefix('/periode')->name('periode.')->group(function () {
            Route::get('/pilih/{id}/{periode}', 'PerusahaanController@pilih')->name('pilih');
            Route::get('/hapus/{id}', 'PerusahaanController@hapus')->name('hapus');
        });
    });
    Route::prefix('/siswa')->name('siswa.')->middleware('CheckRole:siswa')->group(function () {
        Route::resource('/profile', 'SiswaController');
        Route::get('/jurnal', 'SiswaController@getJurnal')->name('jurnal.get');
        Route::get('/jurnal/set', 'SiswaController@setJurnal')->name('jurnal.set');
        Route::post('/jurnal/set/store', 'SiswaController@storeJurnal')->name('jurnal.store');
        Route::get('/laporan', 'SiswaController@getLaporan')->name('laporan.get');
        Route::post('/laporan', 'SiswaController@storeLaporan')->name('laporan.store');
        Route::delete('/laporan/delete/{id}', 'SiswaController@deleteLaporan')->name('laporan.delete');
        Route::get('/rapot', 'SiswaController@getRapot')->name('rapot.get');
        Route::get('/sertifikat', 'SiswaController@getSertifikat')->name('sertifikat.get');
    });
    Route::prefix('/pembimbing_industri')->name('pembimbing_industri.')->middleware('CheckRole:pembimbing_industri')->group(function () {
        Route::resource('/profile', 'PembimbingIndustriController');
        Route::get('siswa', 'PembimbingIndustriController@siswa')->name('siswa');
        Route::get('perusahaan', 'PembimbingIndustriController@perusahaan')->name('perusahaan');
        Route::get('jurnal/{id}', 'PembimbingIndustriController@jurnal')->name('jurnal');
        Route::get('nilai/{id}', 'PembimbingIndustriController@nilai')->name('nilai');
        Route::put('nilai/{id}/update', 'PembimbingIndustriController@nilai_update')->name('nilai.update');
        Route::get('sertifikat/{id}', 'PembimbingIndustriController@sertifikat')->name('sertifikat');
        Route::post('sertifikat/{id}/store', 'PembimbingIndustriController@sertifikat_store')->name('sertifikat.store');
        Route::get('sertifikat/{id}/delete', 'PembimbingIndustriController@sertifikat_delete')->name('sertifikat.delete');
    });

    Route::prefix('/pembimbing_sekolah')->name('pembimbing_sekolah.')->middleware('CheckRole:pembimbing_sekolah')->group(function () {
        Route::resource('/profile', 'PembimbingSekolahController');
        Route::get('siswa', 'PembimbingSekolahController@siswa')->name('siswa');
    });
    Route::prefix('/kakomli')->name('kakomli.')->middleware('CheckRole:kakomli')->group(function () {
        Route::resource('/profile', 'KakomliController');
        Route::get('siswa', 'KakomliController@siswa')->name('siswa.index');

        Route::get('pembimbing', 'KakomliController@pembimbing')->name('pembimbing.index');
        Route::get('pembimbing/{id}', 'KakomliController@pembimbing_show')->name('pembimbing.show');
        Route::put('pembimbing/{id}', 'KakomliController@pembimbing_update')->name('pembimbing.update');
        Route::put('pembimbing/siswa/{id}', 'KakomliController@pembimbing_update_siswa')->name('pembimbing.update.siswa');

        Route::get('/periode/get/{id}', 'KakomliController@getPeriode')->name('periode.get');
        Route::get('/pembimbing/get/{id}', 'KakomliController@getPembimbing')->name('pembimbing.get');
        Route::get('/perusahaan/get/{id}', 'KakomliController@getPerusahaan')->name('perusahaan.get');
        Route::get('/laporan/siswa', 'KakomliController@laporan')->name('laporan.get');
        Route::get('/nilai/siswa', 'KakomliController@nilai')->name('nilai.get');
    });
});
