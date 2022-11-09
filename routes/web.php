<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
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

//Customer
Route::get('/customer',[CustomerController::class,'index'])->name('customer.index');
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

