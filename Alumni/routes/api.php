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
