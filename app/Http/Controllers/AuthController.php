<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            switch ($user->role) {
                case 'administrador':
                    return redirect()->route('admin.dashboard');
                case 'árbitro':
                    return redirect()->route('referee.dashboard');
                case 'aficionado':
                    return redirect()->route('fan.dashboard');
                default:
                    return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:administrador,árbitro,aficionado',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        switch ($user->role) {
            case 'administrador':
                return redirect()->route('admin.dashboard');
            case 'árbitro':
                return redirect()->route('referee.dashboard');
            case 'aficionado':
                return redirect()->route('fan.dashboard');
            default:
                return redirect()->intended('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('home');
    }
}
