<?php

use Illuminate\Support\Facades\Route;
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
<<<<<<< HEAD

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/users', [UserController::class, 'index']);
=======
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/users/create', [UserController::class, 'create']);

>>>>>>> develop

