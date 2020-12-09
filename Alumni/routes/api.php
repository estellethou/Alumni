<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;

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

//reset password routes
Route::post('/send-token', [AuthController::class, 'sendToken']);
Route::post('/validate-token', [AuthController::class, 'validateToken']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

//auth route to login, register...
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::middleware('auth')->get('auth/user', [AuthController::class, 'user']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);

//protected routes - needs to be authenticated
Route::middleware('auth')->get('user/{id}', [UserController::class, 'show']);
Route::middleware('auth')->get('users', [UserController::class, 'index']);
Route::middleware('auth')->delete('user/{id}', [UserController::class, 'destroy']);
Route::middleware('auth')->put('user/{id}/edit', [UserController::class, 'update']);

//API FOR FORUM POST//
Route::middleware('auth')->get('/posts','App\Http\Controllers\PostController@index');
Route::middleware('auth')->get('/post/{id}','App\Http\Controllers\PostController@show');
Route::middleware('auth')->post('/posts/post','App\Http\Controllers\PostController@store');
Route::middleware('auth')->put('/post/{id}/edit','App\Http\Controllers\PostController@update');
Route::middleware('auth')->delete('/post/{id}','App\Http\Controllers\PostController@destroy');

//API FOR FORUM COMMENT//
Route::middleware('auth')->get('/comments','App\Http\Controllers\CommentController@index');
Route::middleware('auth')->get('/comment/{id}','App\Http\Controllers\CommentController@show');
Route::middleware('auth')->post('/comments/post','App\Http\Controllers\CommentController@store');
Route::middleware('auth')->put('/comment/{id}/edit','App\Http\Controllers\CommentController@update');
Route::middleware('auth')->delete('/comment/{id}','App\Http\Controllers\CommentController@destroy');

//API FOR PROFILES//
Route::middleware('auth')->get('/profiles', [App\Http\Controllers\ProfileController::class, 'index']);
Route::middleware('auth')->get('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'show']);
Route::middleware('auth')->patch('/profile/{profile_id}/edit', [App\Http\Controllers\ProfileController::class, 'update']);
Route::middleware('auth')->delete('/profile/{profile_id}', [App\Http\Controllers\ProfileController::class, 'destroy']);
Route::middleware('auth')->post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);
//Route::resource('profile', 'ProfileController'); short way to create route 

// API JOBS/INTERSHIPS //
Route::middleware('auth')->get('/jobs', [App\Http\Controllers\JobController::class, 'index']);
Route::middleware('auth')->get('/job/{id}', [App\Http\Controllers\JobController::class, 'show']);
Route::middleware('auth')->post('/jobs/post', [App\Http\Controllers\JobController::class, 'store']);
Route::middleware('auth')->put('/job/{id}/edit', [App\Http\Controllers\JobController::class, 'update']);
Route::middleware('auth')->delete('/job/{id}', [App\Http\Controllers\JobController::class, 'destroy']);
// Route::resource('jobs', 'App\Http\Controllers\JobController');

//API PAYMENT //
Route::post('/checkout','App\Http\Controllers\CheckoutController@store');

//API Directory Route to get all users and profiles information at the same place
Route::middleware('auth')->get('/userprofiles', [UserProfileController::class, 'index']);

//API SingleJob Route to get needed user information(email/firstname/lastname)
Route::middleware('auth')->get('/userdetailsjob', [UserJobController::class, 'index']);

