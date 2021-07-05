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

Route::get('/', function () {
    return view('welcome')->with('access', 'Anda Sudah Logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/menu')->name('menu.')->middleware('auth')->group(function () {
    Route::prefix('/admin')->name('admin')->namespace('Admin')->middleware('CheckRole:admin')->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/user/role/{data}', 'UserController@role')->name('user.role');
        Route::resource('/perusahaan', 'PerusahaanController');
        Route::resource('/jurusan', 'JurusanController');
        Route::resource('/periode', 'PeriodeController');
        Route::get('/periode/perusahaan/pilih/{id}/{data}', 'PerusahaanController@pilih')->name('periode.perusahaan.pilih');
        Route::get('/periode/perusahaan/hapus/{id}', 'PerusahaanController@hapus')->name('periode.perusahaan.hapus');
        Route::get('/export', 'UserController@export')->name('user.export');
        Route::post('/import', 'UserController@import')->name('user.import');
        Route::resource('/siswa', 'SiswaController');
    });
    Route::group(['middleware' => 'CheckRole:siswa'], function () {
        //route siswa
        //controller SiswaController
        Route::prefix('/siswa')->name('siswa.')->group(function () {
            Route::resource('/profile', 'SiswaController');
            Route::get('/jurnal', 'SiswaController@getJurnal')->name('jurnal.get');
            Route::get('/jurnal/set', 'SiswaController@setJurnal')->name('jurnal.set');
            Route::post('/jurnal/set/store', 'SiswaController@storeJurnal')->name('jurnal.store');
            Route::get('/laporan', 'SiswaController@getLaporan')->name('laporan.get');
            Route::post('/laporan', 'SiswaController@storeLaporan')->name('laporan.store');
            Route::delete('/laporan/delete/{id}', 'SiswaController@deleteLaporan')->name('laporan.delete');
            Route::get('/rapot', 'SiswaController@getRapot')->name('rapot.get');
        });
    });
    Route::group(['middleware' => 'CheckRole:ppkl'], function () {

        Route::prefix('/pembimbing')->name('pembimbing.')->group(function () {
            Route::resource('/profile', 'PembimbingController');
            Route::get('siswa', 'PembimbingController@getSiswa')->name('siswa.index');
            Route::get('kompetensi/{id}', 'PembimbingController@getKompetensi')->name('get.kompetensi');
            Route::get('kedisiplinan/{id}', 'PembimbingController@getKedisiplinan')->name('get.kedisiplinan');
            Route::get('sikap/{id}', 'PembimbingController@getSikap')->name('get.sikap');
            Route::post('kompetensi/{id}', 'PembimbingController@setKompetensi')->name('set.kompetensi');
            Route::post('kedisiplinan/{id}', 'PembimbingController@setKedisiplinan')->name('set.kedisiplinan');
            Route::post('sikap/{id}', 'PembimbingController@setSikap')->name('set.sikap');
        });
    });
    Route::group(['middleware' => 'CheckRole:kkk'], function () {
        Route::prefix('/kakomli')->name('kakomli.')->group(function () {
            Route::resource('/profile', 'KakomliController');
            Route::get('siswa', 'KakomliController@getSiswa')->name('siswa.get');
            Route::get('/periode/get/{id}', 'KakomliController@getPeriode')->name('periode.get');
            Route::get('/pembimbing/get/{id}', 'KakomliController@getPembimbing')->name('pembimbing.get');
            Route::get('/perusahaan/get/{id}', 'KakomliController@getPerusahaan')->name('perusahaan.get');
            Route::get('/laporan/siswa', 'KakomliController@laporan')->name('laporan.get');
            Route::get('/nilai/siswa', 'KakomliController@nilai')->name('nilai.get');
        });
    });
});
