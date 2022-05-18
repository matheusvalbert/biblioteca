<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $requestData['password'] = Hash::make($requestData['password']);

        User::create($requestData);

        return response([ 'status' => true, 'message' => 'User successfully register.' ], 200);
    }

    /**
     * Authenticate new login.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if(! auth()->attempt($requestData)){
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken], 200);
    }

    /**
     * Get logged user info.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json(['user' => $user], 200);
    }

    /**
     * Loggout user.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout (Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
