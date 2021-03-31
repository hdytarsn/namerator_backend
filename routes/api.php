<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\GameRoomController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
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
Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication Routes
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

//GameRoom Routes
Route::post('room/create', [GameRoomController::class,'createRoom']);
Route::get('room/config/{slug}', [GameRoomController::class,'getConfig']);

//Game Routes
Route::post('game/action/create', [GameController::class,'createAction']);
Route::post('game/start', [GameController::class,'startGame'])->middleware('auth:sanctum');