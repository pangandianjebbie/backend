<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderItemsController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;


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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login',                    'login')->name('user.login');
    Route::post('/logout',                   'logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(SliderItemsController::class)->group(function () {
    Route::get('/slider',                    'index');
    Route::get('/slider/{id}',               'show');
    Route::post('/slider',                   'store');
    Route::put('/slider/{id}',               'update');
    Route::delete('/slider/{id}',            'destroy');
});


//Route::get('/slider', [SliderItemsController::class, 'index']);
//Route::get('/slider/{id}', [SliderItemsController::class, 'show']);
//Route::post('/slider', [SliderItemsController::class, 'store']);
//Route::put('/slider/{id}', [SliderItemsController::class, 'update']);
//Route::delete('/slider/{id}', [SliderItemsController::class, 'destroy']);

//Route::get('/user', [UserController::class, 'index']);
//Route::get('/user/{id}', [UserController::class, 'show']); 
//Route::post('/user', [UserController::class, 'store'])->name('user.store');
//Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
//Route::delete('/user/{id}', [UserController::class, 'destroy']);

//Route::post('/messages', [MessagesController::class, 'store']); 
//Route::delete('/messages/{id}', [MessagesController::class, 'delete']);
