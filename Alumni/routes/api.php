<?php

use Illuminate\Http\Request;
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

// API JOBS/INTERSHIPS //
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index']);
Route::get('/job/{id}', [App\Http\Controllers\JobController::class, 'show']);
Route::post('/jobs/post', [App\Http\Controllers\JobController::class, 'store']);
Route::put('/job/{id}/edit', [App\Http\Controllers\JobController::class, 'update']);
Route::delete('/job/{id}', [App\Http\Controllers\JobController::class, 'destroy']);
// Route::resource('jobs', 'App\Http\Controllers\JobController');

