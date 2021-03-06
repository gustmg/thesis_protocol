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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('thesis_protocols', 'ThesisProtocolController')->middleware('auth');
Route::resource('evaluators', 'EvaluatorController')->middleware('auth');
Route::resource('thesis_protocol_revisions', 'ThesisProtocolRevisionController')->middleware('auth');
