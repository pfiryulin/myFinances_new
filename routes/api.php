<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Services\CategoryTableController;
use App\Http\Controllers\Services\CategoryControllerResource;
use App\Http\Controllers\Services\OperationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/profile/category', [CategoryTableController::class, 'returnData'])->name('returnData');
Route::post('/profile/category/list', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'showUserCategory'])->middleware('auth:sanctum');
Route::post('/profile/category/store', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'store'])->middleware('auth:sanctum');
Route::post('/profile/category/update/{categoryes}', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'update'])->middleware('auth:sanctum');
Route::post('/profile/category/destroy/{categoryes}', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/profile/operations/store', [\App\Http\Controllers\Services\OperationController::class, 'store'])->middleware('auth:sanctum');
Route::post('/profile/operations/update/{operations}', [\App\Http\Controllers\Services\OperationController::class, 'update'])->middleware('auth:sanctum');
Route::post('/profile/operations/destroy/{operations}', [\App\Http\Controllers\Services\OperationController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/profile/operations/list', [\App\Http\Controllers\Services\OperationController::class, 'showUserOperations'])->middleware('auth:sanctum');
Route::post('/profile/operations/filter', [\App\Http\Controllers\Services\OperationController::class, 'filterOperations'])->middleware('auth:sanctum');
Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->middleware('auth:sanctum');
Route::get('/test', [\App\Http\Controllers\BalanceController::class, 'show'])->middleware('auth:sanctum');
Route::post('/profile/deposite/store', [\App\Http\Controllers\DepositeController::class, 'store'])->middleware('auth:sanctum');
Route::post('/profile/deposite/update/{deposite}', [\App\Http\Controllers\DepositeController::class, 'update'])->middleware('auth:sanctum');