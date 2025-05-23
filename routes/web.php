<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateTable;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Services\CategoryTableController;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test', [CreateTable::class, 'test'])->name('test');
Route::get('/test', [CreateTable::class, 'test'])->name('test');

Route::get('/login', [AuthController::class, 'showLoginFoorm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::patch('/profile', [AuthController::class, 'updateProfile'])->name('updateProfile');
Route::get('/change-password', [AuthController::class, 'showChangePasswordFoorm'])->name('changePasswordFoorm');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('changePassword');
Route::get('/report', [ReportController::class, 'showReport'])->name('report');
Route::get('/profile/category', [CategoryTableController::class, 'showCategory'])->name('category');
