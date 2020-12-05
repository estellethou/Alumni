<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\ProfileControllerAdmin;
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
Route::get('/admin/users/{user}/profile/edit', [ProfileControllerAdmin::class, 'edit'])->name('admin.user.profile.edit');
Route::patch('admin/users/{user}', [UserControllerAdmin::class, 'update'])->name('admin.user.update');
Route::patch('admin/users/{user}/profile', [ProfileControllerAdmin::class, 'update'])->name('admin.user.profile.update');



Route::get('/admin/jobs', [JobControllerAdmin::class, 'index'])->name('admin.jobs');
Route::get('/admin/jobs/create', function () {
    $users = User::all();
    return view('admin/job_create', compact('users'));
})->name('admin.job.create');
Route::get('/admin/jobs/{job}', [JobControllerAdmin::class, 'show'])->name('admin.job.show');
Route::delete('/admin/jobs/{job}', [JobControllerAdmin::class, 'destroy'])->name('admin.job.destroy');
Route::post('/admin/jobs', [JobControllerAdmin::class, 'store'])->name('admin.job.store');
Route::get('/admin/jobs/{job}/edit', [JobControllerAdmin::class, 'edit'])->name('admin.job.edit');
Route::patch('admin/jobs/{job}', [JobControllerAdmin::class, 'update'])->name('admin.job.update');




Route::get('/admin/posts', [PostControllerAdmin::class, 'index'])->name('admin.posts');
Route::get('/admin/posts/create', function () {
    $users = User::all();
    return view('admin/post_create', compact('users'));
})->name('admin.post.create');
Route::get('/admin/posts/{post}', [PostControllerAdmin::class, 'show'])->name('admin.post.show');
Route::delete('/admin/posts/{post}', [PostControllerAdmin::class, 'destroy'])->name('admin.post.destroy');
Route::post('/admin/posts', [PostControllerAdmin::class, 'store'])->name('admin.post.store');
Route::get('/admin/posts/{post}/edit', [PostControllerAdmin::class, 'edit'])->name('admin.post.edit');
Route::patch('admin/posts/{post}', [PostControllerAdmin::class, 'update'])->name('admin.post.update');


Route::get('/admin/comments', [CommentControllerAdmin::class, 'index'])->name('admin.comments');
Route::get('/admin/comments/create', function () {
    $users = User::all();
    $posts = Post::all();
    return view('admin/comment_create', compact('users', 'posts'));
})->name('admin.comment.create');
Route::get('/admin/comments/{comment}', [CommentControllerAdmin::class, 'show'])->name('admin.comment.show');
Route::delete('/admin/comments/{comment}', [CommentControllerAdmin::class, 'destroy'])->name('admin.comment.destroy');
Route::post('/admin/comments', [CommentControllerAdmin::class, 'store'])->name('admin.comment.store');
Route::get('/admin/comments/{comment}/edit', [CommentControllerAdmin::class, 'edit'])->name('admin.comment.edit');
Route::patch('admin/comments/{comment}', [CommentControllerAdmin::class, 'update'])->name('admin.comment.update');