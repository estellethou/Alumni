<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Models\User;
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
Route::get('/admin/users/create', function () {
    return view('admin/user_create');
})->name('admin.user.create');
Route::get('/admin/users/{user}', [UserControllerAdmin::class, 'show'])->name('admin.user.show');
Route::delete('/admin/users/{user}', [UserControllerAdmin::class, 'destroy'])->name('admin.user.destroy');
Route::post('/admin/users', [UserControllerAdmin::class, 'store'])->name('admin.user.store');
Route::get('/admin/users/{user}/edit', [UserControllerAdmin::class, 'edit'])->name('admin.user.edit');
Route::patch('admin/users/{user}', [UserControllerAdmin::class, 'update'])->name('admin.user.update');



Route::get('/admin/jobs', [JobControllerAdmin::class, 'index'])->name('admin.jobs');
Route::get('/admin/jobs/create', function () {
    $users = User::all();
    return view('admin/job_create', compact('users'));
})->name('admin.job.create');
Route::get('/admin/jobs/{job}', [JobControllerAdmin::class, 'show'])->name('admin.job.show');
Route::delete('/admin/jobs/{job}', [JobControllerAdmin::class, 'destroy'])->name('admin.job.destroy');
Route::post('/admin/jobs', [JobControllerAdmin::class, 'store'])->name('admin.job.store');
Route::get('/admin/jobs/{job}/edit', [JobControllerAdmin::class, 'edit'])->name('admin.job.edit');
Route::patch('admin/jobs/{userjob}', [JobControllerAdmin::class, 'update'])->name('admin.job.update');




Route::get('/admin/posts', [PostControllerAdmin::class, 'index'])->name('admin.posts');


Route::get('/admin/comments', [CommentControllerAdmin::class, 'index'])->name('admin.comments');