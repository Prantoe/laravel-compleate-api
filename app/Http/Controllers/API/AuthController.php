<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
// dd($user->id);
        if(!$user || !\Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Password tidak sesuai'
            ], 404);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'data' => $user,
            'token' => $token
        ],200);
    }

    public function logout(Request $request)
    {
       $user = $request->user();
       $user->currentAccessToken()->delete();
       
        return response()->json([
            'message' => 'logout success',
            'data' => $user
        ],200);
    }
}
