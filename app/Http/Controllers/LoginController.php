<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /* Affiche la page de connexion */
    public function showLogin() {

        if (Auth::check()) {
            return redirect()->route('admin.dashboardIndex');
        }
        return view('dashPages.auth.login');
    }

    /* Gère la tentative de connexion */
    public function login(Request $request): RedirectResponse {

        // 1. Validation des entrées
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Le format de l\'email est invalide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        $remember = $request->has('remember');

        // 2. Tentative de connexion
        // On vérifie les identifiants ET si le statut est 'Actif'
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'status' => 'Actif'], $remember)) {
            
            // Régénérer la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboardIndex'))
                ->with('success', 'Heureux de vous revoir - ' . Auth::user()->last_name . " " . Auth::user()->first_name .' !');
        }

        // 3. Échec de connexion
        // Si l'utilisateur existe mais n'est pas actif, on peut être plus précis (optionnel)
        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas ou votre compte est suspendu.',
        ])->onlyInput('email');
    }

    /* Déconnexion de l'utilisateur */
    public function logout(Request $request): RedirectResponse {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Vous avez été déconnecté.');
    }
}