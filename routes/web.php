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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_customer', [App\Http\Controllers\HomeController::class, 'customer'])->name('add_customer');
Route::post('create_customer', [App\Http\Controllers\HomeController::class, 'simpan_customer']);
Route::get('/ubah_customer/{id}', [App\Http\Controllers\HomeController::class, 'ubah_customer'])->name('edit_customer');
Route::post('update_customer', [App\Http\Controllers\HomeController::class, 'customer_update']);
Route::get('/hapus_customer/{id}', [App\Http\Controllers\HomeController::class, 'delete_customer']);
// Route::get('/home', 'HomeController@index');
