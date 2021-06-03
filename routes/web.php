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
// HOME
Route::get('/', 'MainController@home') -> name('home');

// SINGOLO PILOTA
Route::get('/pilot/{index}', 'MainController@pilot') -> name('pilot');

// CREA SINGOLA MACCHINA
Route::get('create', 'MainController@create') -> name('create');
Route::post('store', 'MainController@store') -> name('store');