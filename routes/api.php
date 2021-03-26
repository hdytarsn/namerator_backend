<?php

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
Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $user = User::where('email', $data['email'])->first();
    if (!$user || !Hash::check($data['password'], $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 422);
    }
    $token = $user->createToken($user->name.'token')->plainTextToken;
    $response = [
        'user' => $user,
        'token' => $token
    ];
    return response($response, 201);
});
Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);
    $user=User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    $token = $user->createToken($user->name.'token')->plainTextToken;
    $response = [
        'user' => $user,
        'token' => $token
    ];
    return response($response, 201);
});
