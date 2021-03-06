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
        Route::prefix('/admin')->name('admin.')->group(function(){
            Route::get('/user','AdminController@user')->name('user');

            Route::resource('/account','UserController');
            Route::get('/account/role/{data}','UserController@role')->name('account.role');

            Route::resource('/company','CompanyController');

            Route::get('/place/get','CompanyController@getPlace')->name('place.get');

        });
    });
    Route::group(['middleware'=>'CheckRole:Siswa'],function(){
        Route::prefix('/student')->name('student.')->group(function(){
            Route::resource('/profile','StudentController');
        });
    });
});
