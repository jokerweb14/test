<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('vis/pishfactor',[\App\Http\Controllers\HomeController::class,'pishfactor'])->name('pishfactor');
Route::get('vis/pishfactor/list',[\App\Http\Controllers\HomeController::class,'listpishfactor'])->name('listpishfactor');
Route::post('vis/pishfactor/store',[\App\Http\Controllers\HomeController::class,'storepishfactor'])->name('storepishfactor');
