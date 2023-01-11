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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'AuthorizationController@index');



    Route::group(['namespace' => 'Admin', 'middleware' => ['role:admin'], 'prefix'=> 'admin'], function(){//prefix подставляет admin во всё что внутри группы в пути , namespace группа контрорреров в папке Admin middleware дал доступ роли админу
        Route::get('', 'AdminController@index')->name('admin');
        Route::group(['namespace' => 'Theme'], function(){
            Route::get('/theme', 'IndexController@index')->name('admin.theme');
            Route::get('/theme/create', 'IndexController@create')->name('admin.theme.create');//страница с формой создания темы
            Route::post('/theme', 'IndexController@store')->name('admin.theme.store');//метод добавления в базу
            Route::get('/theme/edit/{item}', 'IndexController@edit')->name('admin.theme.edit');//метод c формой на изменение темы
            Route::patch('/theme/{item}', 'IndexController@update')->name('admin.theme.update');//метод c изменения данных темы
            Route::delete('/theme/{item}', 'IndexController@destroy')->name('admin.theme.delete');//метод удаления темы, в форме идет отправка

        });
    });


Auth::routes();
