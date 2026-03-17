<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // ---- LOGIN ----

    public function showLogin()
    {
        // Si déjà connecté, on redirige vers l'accueil
        if (Auth::check()) {
            return redirect()->route('livres.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('livres.index'))
                             ->with('success', 'Bienvenue !');
        }

        return back()->withErrors([
            'email' => 'Ces identifiants ne correspondent à aucun compte.',
        ])->onlyInput('email');
    }

    // ---- REGISTER ----

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password, // hashé auto grâce au cast 'hashed'
        ]);

        return redirect()->route('login')
                         ->with('success', 'Compte créé ! Connectez-vous.');
    }

    // ---- LOGOUT ----

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
                         ->with('success', 'Vous êtes déconnecté.');
    }
}
