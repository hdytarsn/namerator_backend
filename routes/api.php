<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Models\GameRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication Routes
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

//GameRoom Routes
Route::post('room/create', [GameRoom::class,'create']);

//Game Routes
Route::post('game/config/create', [GameController::class,'createConfig']);
Route::get('game/config/get/{id}', [GameController::class,'getConfig']);

Route::post('game/action/create', [GameController::class,'createAction']);
