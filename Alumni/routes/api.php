<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Profile;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/profiles', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'show']);
Route::patch('/profile/{profile_id}/edit', [App\Http\Controllers\ProfileController::class, 'update']);
Route::delete('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'destroy']);
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);


//Route::resource('profile', 'ProfileController'); short way to create route 
