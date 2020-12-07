<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserProfileController extends Controller
{
    function index()
    {
        $data = DB::table('users')
                ->join('profiles', 'profiles.user_id', '=','users.id')
                ->select('profiles.id', 'profiles.user_id','profiles.phone', 'profiles.description', 'profiles.image', 'profiles.resume', 'users.role', 'users.email', 'users.lastname', 'users.firstname')
                ->get();
                return $data;
    }




}