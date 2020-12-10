<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Admin\ControllerAdmin;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class UserControllerAdmin extends ControllerAdmin
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::paginate(20);
        $users = User::all();
        return view('admin/users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'is_admin' => ['required', 'numeric'],
            'role' => ['required', 'string'],
            'password' => ['required'],
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->profile()->save(new Profile);
        return redirect("/admin/users/{$user->id}")->with('success','User successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user->profile === null) {
            $user->profile()->save(new Profile);
        }
        $profile = $user->profile;
        if($profile && $user->profile->image !== null) {
            $user->profile->temporaryUrl = Storage::disk('s3')->temporaryUrl($user->profile->image, now()->addMinutes(5));
        }
        return view("admin/user_show", compact('user'));
    }

    //manual search, replaced with datatables
    // public function searchUsers(Request $request) {
    //     $data = request()->validate([
    //         'search-users' => 'required',
    //     ]);
    //      $users = User::where('firstname', 'like', '%'.$data['search-users'].'%')
    //         ->orWhere('lastname', 'like', '%' . $data['search-users'] . '%')
    //         ->orWhere('email', 'like', '%' . $data['search-users'] . '%')->paginate(20);
    //     return view('admin/users', compact('users'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('admin/user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'is_admin' => ['required', 'numeric'],
            'role' => ['required', 'string'],
            'newPassword' => '',
        ]);
        if($data['newPassword'] === null) {
            unset($data['newPassword']);
        }
        else {
            $data['password'] = Hash::make($data['newPassword']);
        }
        $user->update($data);
        return redirect("/admin/users/{$user->id}")->with('success','User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect("/admin/users")->with('success','User successfully deleted.');
    }
}