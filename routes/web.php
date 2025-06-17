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

//Route::get('/', function () {
//    return view('welcome');
//});
// Route::get('/test', [CreateTable::class, 'test'])->name('test');
Route::get('/test', [CreateTable::class, 'test'])->name('test');
