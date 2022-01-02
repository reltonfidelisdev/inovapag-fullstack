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

Route::get('test', function (){
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cliente Routes
Route::get('/cliente/list', [\App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [\App\Http\Controllers\ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/store', [\App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/show/{uid}', [\App\Http\Controllers\ClienteController::class, 'show'])->name('cliente.show');
