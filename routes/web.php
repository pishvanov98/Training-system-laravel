<?php

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

Route::get('/', 'AuthorizationController@index');

Route::group(['namespace' => 'Admin', 'prefix'=> 'admin'], function(){//prefix подставляет admin во всё что внутри группы в пути , namespace группа контрорреров в папке Admin
    Route::get('', 'AdminController@index')->name('admin');
    Route::group(['namespace' => 'Theme'], function(){
        Route::get('/theme', 'IndexController')->name('admin.theme');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('home');
