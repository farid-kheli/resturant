<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TabelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AcontsController;
use App\Http\Controllers\AdminController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/example', [UsersController::class, 'index']);
Route::apiResource('posts', PostController::class);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::match(['get'], '/login', function () {
    return response()->json(['message' => 'Method Not Allowed'], 405);
});

Route::group(['middleware' => ['auth:sanctum', 'Staff']], function(){
    Route::post('/Admin/create/menu/item', [AcontsController::class, 'storeMenu']);
    Route::put('/Admin/update/menu/item/{id}', [AcontsController::class, 'updateMenu']);
    Route::delete('/Admin/delete/menu/item/{id}', [AcontsController::class, 'destroyMenu']);
    Route::post('/Admin/create/tabel', [TabelController::class, 'storeTabel']);
    Route::delete('/Admin/delete/tabel/{id}', [TabelController::class, 'deletetabel']);
});

Route::group(['middleware' => ['auth:sanctum', 'Admin']], function(){
    Route::post('/Admin/create/acont', [AcontsController::class, 'store']);
    Route::delete('/Admin/delete/review/{id}', [AdminController::class, 'DeleteReview']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/user', [RegisteredUserController::class, 'update']);
    Route::delete('/delete', [RegisteredUserController::class, 'destroy']);
    Route::post('/user/review/menu', [UsersController::class, 'storeReview']);
});
