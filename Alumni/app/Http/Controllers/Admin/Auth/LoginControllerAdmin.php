<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\ControllerAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginControllerAdmin extends ControllerAdmin
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    public function login(Request $request) {
        $data = request()->all();
        $user = User::where('email', $data['email'])->first();
        if ($user === null) {
            $request->session()->flash('error', 'User was not found');
            return view('admin/login');
        }
        else if(Hash::make($data['password']) !== $user->password) {
            Auth::guard('web')->login($user, true);
            return redirect('admin/users');
        }
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

     public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('admin/login');
    }    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
