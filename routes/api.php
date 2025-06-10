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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Menu;



Route::get('/example', [UsersController::class, 'index']);
Route::apiResource('posts', PostController::class);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/menu', [Menu::class, 'GetMenu']);
Route::get('/tables', [UsersController::class, 'GetTables']);
Route::Post('/MakeOrder/{tableID}', [OrderController::class, 'Order']);
Route::Post('/GetTableOrder/{tableID}', [OrderController::class, 'GetTableOrder']);

Route::group(['middleware' => ['auth:sanctum', 'Staff']], function(){
    Route::post('/Admin/create/menu/item', [AcontsController::class, 'storeMenu']);
    Route::put('/Admin/update/menu/item/{id}', [AcontsController::class, 'updateMenu']);
    Route::put('/Admin/order/{status}/{order}', [OrderController::class, 'changeOrderStatus']);
    Route::delete('/Admin/delete/menu/item/{id}', [AcontsController::class, 'destroyMenu']);
    Route::post('/Admin/create/tabel', [TabelController::class, 'storeTabel']);
    Route::get('/Admin/get/orders/{status}', [OrderController::class, 'GetOrders']);
    Route::delete('/Admin/delete/tabel/{id}', [TabelController::class, 'deletetabel']);
});

Route::group(['middleware' => ['auth:sanctum', 'Admin']], function(){
    Route::post('/Admin/create/acont', [AcontsController::class, 'store']);
    Route::delete('/Admin/delete/review/{id}', [AdminController::class, 'DeleteReview']);
    Route::get('/users', [AdminController::class, 'GetUsers']);
    Route::get('/staffs', [AdminController::class, 'GetStaff']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/user', [RegisteredUserController::class, 'update']);
    Route::delete('/delete', [RegisteredUserController::class, 'destroy']);
    Route::post('/user/review/menu', [UsersController::class, 'storeReview']);
});
