<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            
            $token = $request->user()->createToken('user')->plainTextToken;
            return response('Authorized',200,[
                'token' => $token
            ]);
        };
        return response('Unauthorized',401);
    }
}
