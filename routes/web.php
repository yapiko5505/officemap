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

Route::get('/offices/list', 'App\Http\Controllers\OfficeController@index')->name('office.list');
Route::get('/office/new', 'App\Http\Controllers\OfficeController@create')->name('office.new');
Route::post('/office', 'App\Http\Controllers\OfficeController@store')->name('office.store');
Route::get('/office/edit/{id}', 'App\Http\Controllers\OfficeController@edit')->name('office.edit');
Route::post('/office/update/{id}', 'App\Http\Controllers\OfficeController@update')->name('office.update');

Route::get('/office/{id}', 'App\Http\Controllers\OfficeController@show')->name('office.detail');
Route::delete('/office/{id}', 'App\Http\Controllers\OfficeController@destroy')->name('office.destroy');

Route::get('/', function () {
    return view('welcome');
    //return redirect('/offices');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/offices',[App\Http\Controllers\OfficeController::class, 'index'])->name('/offices');
