<?php

use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\WargaController;
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

Route::resource('/', KelurahanController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('warga', WargaController::class);
Route::fallback(function() {
    return view('fail');
});
