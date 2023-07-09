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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
    Route::get('/', 'App\Http\Controllers\AccountController@index')->name('index');
    Route::get('/custom/regist', 'App\Http\Controllers\AccountController@customregist')->name('customRegist');
    Route::post('/store', 'App\Http\Controllers\AccountController@store')->name('store');
    Route::get('/edit/{id}', 'App\Http\Controllers\AccountController@edit')->name('edit');
    Route::get('/{id}', 'App\Http\Controllers\AccountController@show')->name('spec');
    Route::get('/custom/login', 'App\Http\Controllers\AccountController@customlogin')->name('customLogin');
    Route::get('/export', 'App\Http\Controllers\AccountController@exportCsv')->name('exportCsv');
    Route::put('/update/{id}', 'App\Http\Controllers\AccountController@update')->name('update');
    Route::delete('/delete/{id}', 'App\Http\Controllers\AccountController@delete')->name('delete');
});

Route::group(['prefix' => 'property', 'as' => 'property.'], function() {
    Route::get('/', 'App\Http\Controllers\PropertyController@index')->name('index');
    Route::get('/regist', 'App\Http\Controllers\PropertyController@regist')->name('regist');
    Route::get('/edit/{id}', 'App\Http\Controllers\PropertyController@edit')->name('edit');
    Route::get('/exportCsv', 'App\Http\Controllers\PropertyController@exportCsv')->name('exportCsv');
    Route::get('/search', 'App\Http\Controllers\PropertyController@search')->name('search');
    Route::get('/searchexportCsv', 'App\Http\Controllers\PropertyController@searchexportCsv')->name('searchexportCsv');
    Route::get('/{id}', 'App\Http\Controllers\PropertyController@spec')->name('spec');
    Route::post('/', 'App\Http\Controllers\PropertyController@store')->name('store');
    Route::put('/{id}', 'App\Http\Controllers\PropertyController@update')->name('update');
    Route::delete('/{id}', 'App\Http\Controllers\PropertyController@destroy')->name('destroy');

});



require __DIR__.'/auth.php';
