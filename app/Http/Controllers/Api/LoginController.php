<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthenticationRequest;

class LoginController extends Controller
{
    public function login(AuthenticationRequest $request){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($credentials,true)){
            $user=Auth::user();
            $response=[
                'status'=>true,
                'message'=>'Login Successfully',
                'data'=>[
                    'token'=>$user->createToken('Inventory')->plainTextToken,
                    'user'=>$user,
                ]
                ];
                return response()->json($response,200);
        }else{
            $response=[
                'status'=>false,
                'message'=>'Unauthorized',
                'data'=>null,
            ];
            return response()->json($response,401);
        }
    }
}
