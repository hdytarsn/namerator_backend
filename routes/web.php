<?php

use App\Events\Test;
use App\Models\EngName;
use App\Models\GameRoom;
use App\Models\TrName;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test-broadcast', function () {
    broadcast(new Test('nxWhAj'));
});





