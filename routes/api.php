<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'Login']);

Route::middleware('auth:api')->prefix('/')->group(function () {
    Route::get('/user-info',function (){return response()->json(JWTAuth::parseToken()->authenticate());});

    Route::post('/send-message', [MessageController::class, 'sendMessage']);
    Route::get('/get-messages', [MessageController::class, 'receivedMessages']);
});

