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

Route::get('/', 'App\Http\Controllers\ShortLinkController@list')->name('shorten.link.list');
Route::post('create-link-post', 'App\Http\Controllers\ShortLinkController@save')->name('create.shorten.link.post');  
Route::get('/{key}', 'App\Http\Controllers\ShortLinkController@index')->name('shorten.link');
