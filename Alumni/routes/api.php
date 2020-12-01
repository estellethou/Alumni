<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//auth route to login, register...
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::get('auth/user', [AuthController::class, 'user']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);

//protected routes - needs to be authenticated
Route::middleware('auth')->get('user/{id}', [UserController::class, 'show']);
Route::middleware('auth')->get('users', [UserController::class, 'index']);
Route::middleware('auth')->delete('user/{id}', [UserController::class, 'destroy']);
 