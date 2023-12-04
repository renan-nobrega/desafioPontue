<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;



class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = Auth::user()->createToken('JWT');
            return response()->json(['message' => 'Login Successful', 'token' => $token->plainTextToken]);
        };
        return response()->json(['message' => 'Login Failed'], 401);
    }

    public function logout(){
        Auth::user()->tokens()->delete();                        
        return response()->json(['message' => 'Logout Successful'], 204);
    }

    public function reset(Request $request, User $user){
        $usuario = $user->find(Auth::user()->id);
        $usuario->password = bcrypt($request->newPassword);
        $usuario->save();

        return response()->json(['message' => 'Password Update']);
    }
}