<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitantController;
// use App\Http\Controllers\HabitantController;
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


Auth::routes();
Route::get('/', [HabitantController::class, 'index'])->name('habitants.list');
Route::get('/create', [HabitantController::class, 'create'])->name('habitants.create')->Middleware('auth');
Route::post('/create', [HabitantController::class,'store'])->name('habitants.store');
Route::get('/edit/{id}',   [HabitantController::class,'edit'])->name('habitants.edit')->Middleware('auth');
Route::put('/update/{id}', [HabitantController::class,'update'])->name('habitants.update');
Route::get('/delete/{id}', [HabitantController::class,'destroy'])->name('habitants.destroy')->Middleware('auth');



