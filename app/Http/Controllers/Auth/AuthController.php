<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginFoorm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]
            );

        if (Auth::attempt($data)) {
            return redirect()->intended('report');
        }

        return back()->withErrors(['email' => 'НЕверные учетные данные']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate( //валидация данных пользоватлея при регистрации
            [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
            ]
        );

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()->route('login')->withErrors('status', 'Регистрация прошла успешно');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'string|max:255',
                // 'email' => 'string|max:255|unique:users,email' . Auth::id(),
                'email' => 'string|max:255|unique:users,email',
            ]
        );

        $user = Auth::user();
        $user->update($data);

        return redirect()->route('profile');
    }

    public
     function showChangePasswordFoorm()
     {
        return view('auth.change-password');
     }

     public function changePassword(Request $request)
     {
        $data = $request->validate(
            [
                'current_password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8',
            ]
        );

        $user = Auth::user();
        // dd($user);

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()->withError(['current_password' => 'Пароль не совпадает']);
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return redirect()->route('profile')->with('status', 'Пароль изменен');

     }
}
