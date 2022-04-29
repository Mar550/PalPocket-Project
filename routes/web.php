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

Route::prefix('income')->group(function(){
    Route::get('home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('index', [App\Http\Controllers\IncomeController::class,'index'])->name('income.index');
    Route::post('store', [App\Http\Controllers\IncomeController::class,'store'])->name('income.store');
    Route::get('edit/{id}', [App\Http\Controllers\IncomeController::class,'edit'])->name('income.edit');
    Route::put('update/{id}', [App\Http\Controllers\IncomeController::class,'update'])->name('income.update');
    Route::delete('delete/{id}',[App\Http\Controllers\IncomeController::class,'destroy'])->name('income.delete');
});

Route::prefix('expense')->group(function(){
    Route::get('index', [App\Http\Controllers\ExpenseController::class,'index'])->name('expense.index');
    Route::post('store', [App\Http\Controllers\ExpenseController::class,'store'])->name('expense.store');
    Route::get('edit/{id}', [App\Http\Controllers\ExpenseController::class,'edit'])->name('expense.edit');
    Route::put('update/{id}', [App\Http\Controllers\ExpenseController::class,'update'])->name('expense.update');
    Route::put('delete/{id}', [App\Http\Controllers\ExpenseController::class,'destroy'])->name('expense.delete');
});

Route::get('/chart', [App\Http\Controllers\ChartController::class, 'index'])->name('pocket.chart');
