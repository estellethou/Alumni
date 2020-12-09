<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ControllerAdmin extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function indexCount() {
        $count = new \stdClass();
        $count->users = User::count();
        $count->jobs = Job::count();
        $count->posts = Post::count();
        $count->comments = Comment::count();
        return view('admin/admin', compact('count'));
    }
}
