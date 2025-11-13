<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);
Route::get('/search', [ContactController::class, 'search']);
Route::get('/reset', [ContactController::class, 'admin']);
Route::delete('/delete', [ContactController::class, 'destroy']);


Route::get('/confirm', [ContactController::class, 'confirm_test']);
Route::get('/thanks', [ContactController::class, 'thanks_test']);
Route::get('/login', [UserController::class, 'login_test']);
Route::get('/register', [UserController::class, 'register_test']);
Route::get('/admin', [ContactController::class, 'admin']);