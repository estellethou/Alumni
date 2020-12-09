<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\Admin\ControllerAdmin;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\ProfileControllerAdmin;
use App\Http\Controllers\Admin\JobControllerAdmin;
use App\Http\Controllers\Admin\PostControllerAdmin;
use App\Http\Controllers\Admin\CommentControllerAdmin;
use App\Http\Controllers\Admin\Auth\LoginControllerAdmin;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', function () {
        return view('admin/login');
    });
    Route::post('login', [LoginControllerAdmin::class, 'login'])->name('admin.login');
});
// Route::middleware('auth:web')->get('users', [UserControllerAdmin::class, 'index'])->name('admin.users');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', [ControllerAdmin::class, 'indexCount']);
    Route::get('logout', [LoginControllerAdmin::class, 'logout'])->name('admin.logout');
    Route::get('users', [UserControllerAdmin::class, 'index'])->name('admin.users');
    Route::get('users/create', function () {
        return view('admin/user_create');
    })->name('admin.user.create');
    Route::get('users/{user}', [UserControllerAdmin::class, 'show'])->name('admin.user.show');
    Route::delete('users/{user}', [UserControllerAdmin::class, 'destroy'])->name('admin.user.destroy');
    Route::post('users', [UserControllerAdmin::class, 'store'])->name('admin.user.store');
    Route::get('users/{user}/edit', [UserControllerAdmin::class, 'edit'])->name('admin.user.edit');
    Route::get('users/{user}/profile/edit', [ProfileControllerAdmin::class, 'edit'])->name('admin.user.profile.edit');
    Route::patch('admin/users/{user}', [UserControllerAdmin::class, 'update'])->name('admin.user.update');
    Route::patch('admin/users/{user}/profile', [ProfileControllerAdmin::class, 'update'])->name('admin.user.profile.update');
    Route::post('users/search', [UserControllerAdmin::class, 'searchUsers'])->name('admin.users.search');
    
    
    Route::get('jobs', [JobControllerAdmin::class, 'index'])->name('admin.jobs');
    Route::get('jobs/create', function () {
        $users = User::all();
        return view('admin/job_create', compact('users'));
    })->name('admin.job.create');
    Route::get('jobs/{job}', [JobControllerAdmin::class, 'show'])->name('admin.job.show');
    Route::delete('jobs/{job}', [JobControllerAdmin::class, 'destroy'])->name('admin.job.destroy');
    Route::post('jobs', [JobControllerAdmin::class, 'store'])->name('admin.job.store');
    Route::get('jobs/{job}/edit', [JobControllerAdmin::class, 'edit'])->name('admin.job.edit');
    Route::patch('admin/jobs/{job}', [JobControllerAdmin::class, 'update'])->name('admin.job.update');
    
    
    
    
    Route::get('posts', [PostControllerAdmin::class, 'index'])->name('admin.posts');
    Route::get('posts/create', function () {
        $users = User::all();
        return view('admin/post_create', compact('users'));
    })->name('admin.post.create');
    Route::get('posts/{post}', [PostControllerAdmin::class, 'show'])->name('admin.post.show');
    Route::delete('posts/{post}', [PostControllerAdmin::class, 'destroy'])->name('admin.post.destroy');
    Route::post('posts', [PostControllerAdmin::class, 'store'])->name('admin.post.store');
    Route::get('posts/{post}/edit', [PostControllerAdmin::class, 'edit'])->name('admin.post.edit');
    Route::patch('admin/posts/{post}', [PostControllerAdmin::class, 'update'])->name('admin.post.update');
    
    
    Route::get('comments', [CommentControllerAdmin::class, 'index'])->name('admin.comments');
    Route::get('comments/create', function () {
        $users = User::all();
        $posts = Post::all();
        return view('admin/comment_create', compact('users', 'posts'));
    })->name('admin.comment.create');
    Route::get('comments/{comment}', [CommentControllerAdmin::class, 'show'])->name('admin.comment.show');
    Route::delete('comments/{comment}', [CommentControllerAdmin::class, 'destroy'])->name('admin.comment.destroy');
    Route::post('comments', [CommentControllerAdmin::class, 'store'])->name('admin.comment.store');
    Route::get('comments/{comment}/edit', [CommentControllerAdmin::class, 'edit'])->name('admin.comment.edit');
    Route::patch('comments/{comment}', [CommentControllerAdmin::class, 'update'])->name('admin.comment.update');
});