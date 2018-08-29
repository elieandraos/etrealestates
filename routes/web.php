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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/properties/fetch', 'HomeController@fetch')->name('home.fetch');
Route::post('/inquire', 'InquiryController@store')->name('inquire');
Route::get('/properties/{reference}/show', 'HomeController@show')->name('home.show');

Auth::routes();

Route::namespace('Admin')->middleware(['auth'])->group(function () {
    Route::resource('areas', 'AreaController');
    Route::resource('types', 'TypeController');
    Route::resource('properties', 'PropertyController');
    Route::resource('inquiries', 'InquiryController')->only(['index', 'show']);
});
