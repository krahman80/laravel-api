<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request) {
        
        // http://localhost:8000/api/register

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['admin'] = User::REGULAR_USER;

        $user = User::create($data);

        $token = $user->createToken('laravel-api-token')->plainTextToken;

        return response()->json([
            'data' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'token' => $token,
            ],
        ], 201);

    }

    public function login(Request $request) {
        
        // http://localhost:8000/api/login

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $field = $this->validate($request, $rules);

        $user = User::where('email', $field['email'])->first();

        if(!$user || !Hash::check($field['password'], $user->password))
        {
            return response()->json([
                'data' => [
                    'message' => 'unable to login'
                ]
            ], 401);
        }

        $token = $user->createToken('laravel-api-token')->plainTextToken;

        return response()->json([
            'data' => [
                'email' => $user->email,
                'token' => $token,
            ],
        ], 201);

    }

    public function logout(Request $request) {

        // http://localhost:8000/api/logout

        auth()->user()->tokens()->delete();

        return response()->json([
            'data' => [
                'logout' => 'logged out',
            ]
        ]);
    }


}
