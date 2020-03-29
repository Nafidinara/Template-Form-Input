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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('base');});
Route::get('form', function () {return view('form.form');});
Route::get('table','FileController@index');
Route::get('download/{file_id}','FileController@download');
Route::post('proses-input','FileController@proses_input');
