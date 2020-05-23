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

Route::get('/', "TaskController@index")
    ->middleware("auth");

Route::resource('task', 'TaskController')
    ->middleware("auth");

Route::post('/task/done/{id}', 'TaskController@done')
    ->name('task.done')
    ->middleware("auth");

Route::get('/task/of/project/{id}', 'TaskController@tasksOfProject')
    ->name('task.of_project')
    ->middleware('auth');
