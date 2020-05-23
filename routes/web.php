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

Route::get('/', "TaskController@index")->middleware("auth");

Auth::routes();

//Route::group(['prefix' => '/task'], function () {
//    Route::get('/index', 'TaskController@index')
//        ->name('task_index');
//
//    Route::post('/store', 'TaskController@store')
//        ->name('task_store');
//
//    Route::post('/done', 'TaskController@done')
//        ->name('task_done');
//
//    Route::get('/edit', 'TaskController@edit')
//        ->name('task_edit');
//
//    Route::post('/update', 'TaskController@update')
//        ->name('task_update');
//
//    Route::post('/delete', 'TaskController@destroy')
//        ->name('task_delete');
//});

Route::resource('task', 'TaskController')->middleware("auth");

Route::post('/task/done/{id}', 'TaskController@done')->name('task.done')->middleware("auth");

