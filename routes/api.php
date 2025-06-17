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
Route::post('/profile/category/list', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'showUserCategory']);
Route::post('/profile/category/store', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'store']);
Route::post('/profile/category/update/{categoryes}', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'update']);
Route::post('/profile/category/destroy/{categoryes}', [\App\Http\Controllers\Services\CategoryControllerResource::class, 'destroy']);
Route::post('/profile/operations/store', [\App\Http\Controllers\Services\OperationController::class, 'store']);
Route::post('/profile/operations/update/{operations}', [\App\Http\Controllers\Services\OperationController::class, 'update']);
Route::post('/profile/operations/destroy/{operations}', [\App\Http\Controllers\Services\OperationController::class, 'destroy']);