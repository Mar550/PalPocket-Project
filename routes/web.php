<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/income', [App\Http\Controllers\IncomeController::class, 'index'])->name('pocket.income');
Route::get('/expanse', [App\Http\Controllers\ExpanseController::class, 'index'])->name('pocket.expanse');
Route::get('/chart', [App\Http\Controllers\ChartController::class, 'index'])->name('pocket.chart');
