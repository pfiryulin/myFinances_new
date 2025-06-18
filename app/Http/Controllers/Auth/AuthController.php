<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string',
            ]
        );

        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );

        $token = $user->createToken('auth_token')->plainTextToken;

        $balace = new BalanceController();
        $balace->store($user->id);

        return response()->json(['token' => $token],201);

    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'password' => 'required|string',
                'email' => 'required|string|email',
            ]
        );

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            return response()->json(
                ['error' => 'ERROR']
            );
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(
            ['token' => $token]
        );
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'logout']);
    }
}
