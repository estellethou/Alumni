<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Profile;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//API FOR FORUM POST//
Route::get('/posts','App\Http\Controllers\PostController@index');
Route::get('/post/{id}','App\Http\Controllers\PostController@show');
Route::post('/posts/post','App\Http\Controllers\PostController@store');
Route::put('/post/{id}/edit','App\Http\Controllers\PostController@update');
Route::delete('/post/{id}','App\Http\Controllers\PostController@destroy');

//API FOR FORUM COMMENT//
Route::get('/comments','App\Http\Controllers\CommentController@index');
Route::get('/comment/{id}','App\Http\Controllers\CommentController@show');
Route::post('/comments/post','App\Http\Controllers\CommentController@store');
Route::put('/comment/{id}/edit','App\Http\Controllers\CommentController@update');
Route::delete('/comment/{id}','App\Http\Controllers\CommentController@destroy');

//API FOR PROFILES//
Route::get('/profiles', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'show']);
Route::patch('/profile/{profile_id}/edit', [App\Http\Controllers\ProfileController::class, 'update']);
Route::delete('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'destroy']);
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);
//Route::resource('profile', 'ProfileController'); short way to create route 


// API JOBS/INTERSHIPS //
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index']);
Route::get('/job/{id}', [App\Http\Controllers\JobController::class, 'show']);
Route::post('/jobs/post', [App\Http\Controllers\JobController::class, 'store']);
Route::put('/job/{id}/edit', [App\Http\Controllers\JobController::class, 'update']);
Route::delete('/job/{id}', [App\Http\Controllers\JobController::class, 'destroy']);
// Route::resource('jobs', 'App\Http\Controllers\JobController');


