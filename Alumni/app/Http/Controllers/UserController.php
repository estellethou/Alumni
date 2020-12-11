<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Job;
use App\Models\Comment;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //check policy first
        $this->authorize('update', $user);

        $request->validate([
            'firstname' => '',
            'lastname' => '',
            'email' => 'email | unique:users,email,',
            'password' => ['nullable'],
        ]);
        
        $user->update($request->only(['firstname', 'lastname', 'email']));

        if ($request->filled('password')) {

            $user->password = bcrypt($request->password);
        }
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find User
        $user = User::find($id);
        //check policy first
        $this->authorize('update', $user);
        //Delete user
        Profile::destroy($id);
        Comment::destroy($id);
        Job::destroy($id);
        Post::destroy($id);
        return User::destroy($id);
    }
}