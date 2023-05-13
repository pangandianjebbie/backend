<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderItemsController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;


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

//Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user',  [UserController::class, 'store'])->name('user.store');


//Private APIs
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::controller(SliderItemsController::class)->group(function () {
        Route::get('/slider',                    'index');
        Route::get('/slider/{id}',               'show');
        Route::post('/slider',                   'store');
        Route::put('/slider/{id}',               'update');
        Route::delete('/slider/{id}',            'destroy');
    });

Route::controller(UserController::class)->group(function () {
        Route::get('/user',                      'index');
        Route::get('/user/{id}',                 'show'); 
        Route::put('/user/{id}',                 'update')->name('user.update');
        Route::put('/user/email/{id}',           'email')->name('user.email');
        Route::put('/user/password/{id}',        'password')->name('user.password');
        Route::put('/user/image/{id}',           'image')->name('user.image');
        Route::delete('/user/{id}',              'destroy');
    });

    //User Specific APIs
    Route::get('/profile/show/',                [ProfileController::class, 'show']);
    Route::put('/profile/image/',               [ProfileController::class, 'image'])->name('profile.image');


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
