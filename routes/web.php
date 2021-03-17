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
    return view('welcome')->with('access','Anda Sudah Logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/menu')->name('menu.')->middleware('auth')->group(function(){
    Route::group(['middleware'=>'CheckRole:admin'],function(){
        //route admin
        Route::prefix('/admin')->name('admin.')->group(function(){

            Route::resource('/user','UserController');
            Route::get('/user/role/{data}','UserController@role')->name('user.role');

            Route::resource('/perusahaan','PerusahaanController');
            Route::resource('/jurusan','JurusanController');

        });
    });
    Route::group(['middleware'=>'CheckRole:siswa'],function(){
        //route siswa
        //controller SiswaController
        Route::prefix('/siswa')->name('siswa.')->group(function(){
            Route::resource('/profile','SiswaController');
            Route::get('/jurnal','SiswaController@getJurnal')->name('jurnal.get');
            Route::get('/jurnal/set','SiswaController@setJurnal')->name('jurnal.set');
            Route::post('/jurnal/set/store','SiswaController@storeJurnal')->name('jurnal.store');
            Route::get('/laporan','SiswaController@getLaporan')->name('laporan.get');
            Route::post('/laporan','SiswaController@storeLaporan')->name('laporan.store');
            Route::delete('/laporan/delete/{id}','SiswaController@deleteLaporan')->name('laporan.delete');
            Route::get('/rapot','SiswaController@getRapot')->name('rapot.get');
        });
    });
    Route::group(['middleware'=> 'CheckRole:ppkl'],function(){
        //route pembimbing
        //controller PembimbingController
        //middleware ppkl
    });
    Route::group(['middleware'=> 'CheckRole:kkk'],function(){
        Route::prefix('/kakomli')->name('kakomli.')->group(function(){
            Route::resource('/profile','KakomliController');
            Route::get('siswa','KakomliController@getSiswa')->name('siswa.get');
            Route::get('/periode/get/{id}','KakomliController@getPeriode')->name('periode.get');
            Route::get('/pembimbing/get/{id}','KakomliController@getPembimbing')->name('pembimbing.get');
            Route::get('/perusahaan/get/{id}','KakomliController@getPerusahaan')->name('perusahaan.get');
        });
    });
});
