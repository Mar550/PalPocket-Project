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
Route::get('home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('income', [App\Http\Controllers\IncomeController::class,'index'])->name('index');
Route::post('store', [App\Http\Controllers\IncomeController::class,'store'])->name('store');

Route::get('expense', [App\Http\Controllers\ExpenseController::class,'index'])->name('index');
Route::post('store', [App\Http\Controllers\ExpenseController::class,'store'])->name('store');

Route::get('/chart', [App\Http\Controllers\ChartController::class, 'index'])->name('pocket.chart');
