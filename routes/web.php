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

        });
    });
    Route::group(['middleware'=>'CheckRole:siswa'],function(){
        //route siswa
        Route::prefix('/siswa')->name('siswa.')->group(function(){
            Route::resource('/profile','SiswaController');
        });
    });
    Route::group(['middleware'=> 'CheckRole:ppkl'],function(){
        //route pembimbing
        //controller PembimbingController
        //middleware ppkl
    });
    Route::group(['middleware'=> 'CheckRole:kkk'],function(){
        //route kakomli
        //controller KakomliController
        //middleware kkk
    });
});
