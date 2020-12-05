<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ResetPasswordMailable;
use App\Models\PasswordReset;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'sendToken', 'validateToken', 'resetPassword']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        //token validity of 24h
        $token_validity = 24 * 60;

        $this->guard()->factory()->setTTL($token_validity);

        if(!$token = $this->guard()->attempt($validator->validated())){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|between:2,100',
            'lastname' => 'required|string|between:2,100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()){
            return response()->json([
                $validator->errors()
            ], 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        $profile = Profile::create(
            [ 
            'user_id'=> $user->id,
            'phone' => '',
            'description' => '',
            'url_linkedin' => '',
            'url_github' => '',
            'url_website' => '',
            'image' => '',
            'resume' => '',
            ]
        );
        
        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'User logged out successfully']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function user()
    {
        return response()->json($this->guard()->user());
    }

    protected function respondWithToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    protected function guard() {
        return Auth::guard();
    }

    public function sendToken(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!isset($user->id))
        {
            return response()->json(['error' => 'User does not exist'], 401);
        }

        if(isset($user->id))
        {
            $passwordReset = PasswordReset::where('email', $request->email)->first();
            if(isset($passwordReset)){
                $passwordReset->delete();
            }
        }

        $token = Str::random(32);

        Mail::to($user)->send(new ResetPasswordMailable($token));

        $passwordReset = new PasswordReset();
        $passwordReset->email = $user->email;
        $passwordReset->token = $token;
        $passwordReset->save();

        // return response()->json(['success' => 'Email sent'], 200);
    }
    
    public function validateToken(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if (!isset($passwordReset->email))
        {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $user = User::where('email', $passwordReset->email)->first();
        return response()->json($user, 200);
    }
    public function resetPassword(Request $request)
    {
        $user = User::find($request->user_id);
        $passwordReset = PasswordReset::where('email', $user->email)->first();
        $passwordReset->delete();

        $user->password = bcrypt($request->password);
        $user->save();
    }
}
