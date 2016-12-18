<?php

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks', 'TodoListController@showTasks');

    Route::post('/addTask', 'TodoListController@addTask');
    Route::post('/modifyTask/{id}', 'TodoListController@modifyTask');

    Route::get('/finishTask/{id}', 'TodoListController@finishTask');
    Route::get('/deleteTask/{id}', 'TodoListController@deleteTask');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
