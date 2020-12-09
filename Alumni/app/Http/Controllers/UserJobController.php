<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserJobController extends Controller
{
    function index()
    {
        $data = DB::table('users')
                ->join('jobs', 'jobs.user_id', '=','users.id')
                ->select('jobs.id', 'jobs.user_id', 'users.email', 'users.lastname', 'users.firstname')
                ->get();
                return $data;
    }
}