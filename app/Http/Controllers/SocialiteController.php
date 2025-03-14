<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Rediriger vers Google
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    // Gérer la réponse de Google
    public function handleGoogleCallback() {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Vérifier si l'utilisateur existe déjà
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Créer un nouvel utilisateur
                $user = User::create([
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('password_default'), // Temporaire, l'utilisateur peut changer plus tard
                ]);
            }

            // Connecter l'utilisateur
            Auth::login($user);

            return redirect()->route('admin.property.index')->with('success', 'Connexion réussie avec Google !');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Erreur de connexion avec Google.');
        }
    }
}
