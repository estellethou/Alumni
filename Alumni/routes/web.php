<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\JobControllerAdmin;
use App\Http\Controllers\Admin\PostControllerAdmin;
use App\Http\Controllers\Admin\CommentControllerAdmin;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/users', [UserControllerAdmin::class, 'index'])->name('admin.users');
Route::get('/admin/user/create', function () {
    return view('admin/user_create');
})->name('admin.user.create');

Route::post('/admin/user', [UserControllerAdmin::class, 'store'])->name('admin.user.store');

Route::get('/admin/jobs', [JobControllerAdmin::class, 'index'])->name('admin.jobs');

Route::get('/admin/posts', [PostControllerAdmin::class, 'index'])->name('admin.posts');

Route::get('/admin/comments', [CommentControllerAdmin::class, 'index'])->name('admin.comments');