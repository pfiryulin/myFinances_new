<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AvailableAssetsController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validationRules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ];

        $errorMessages = [
            'name.required' => 'имя обязательно для заполнения',
            'password.required' => 'Пароль обязательно для заполнения',
            'email.required' => 'Email обязательно для заполнения',
            'email.unique' => 'Пользователь с таким логином уже существует',
            'summ.numeric' => 'Сумма должна быть числом',
        ];

        $rowValid = Validator::make(
            $request->all(),
            $validationRules,
            $errorMessages,
        );

        if($rowValid->passes()){
            $user = User::create(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]
            );

            $token = $user->createToken('auth_token')->plainTextToken;

            $balace = new BalanceController();
            $balace->store($user->id);

            $availableAssets = new AvailableAssetsController();
            $availableAssets->store($user->id);

            return response()->json(['token' => $token],201);
        }else{
            return response()->json([
                'errors' => $rowValid->errors(),
            ], 422);
        }
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
