<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginLayout()
    {
        return view('auth.login');
    }

    public function registerLayout()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Kiểm tra role_id của user sau khi đăng nhập thành công
            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                // Nếu là Admin hoặc một role quản trị khác, chuyển hướng đến trang quản trị
                return redirect()->intended('manufacturers');
            }

            // Nếu không phải Admin, chuyển hướng đến trang chủ hoặc trang mặc định khác
            return redirect()->intended('');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 3, // Id 3 is user
        ]);

        Auth::login($user);

        return redirect()->route('auth.login')->with('success', 'Tạo tài khoản thành công.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

