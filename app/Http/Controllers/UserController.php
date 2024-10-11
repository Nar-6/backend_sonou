<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function connexion(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Essayer de connecter l'utilisateur avec les informations fournies
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Authentification réussie
            $request->session()->regenerate(); // Regénérer la session pour éviter les attaques CSRF
    
            return redirect()->route('dashboard')->with('success', 'Vous êtes connecté !');
        }
    
        // Si la connexion échoue
        return back()->withErrors([
            'email' => 'Les informations d’identification ne correspondent pas.',
        ])->onlyInput('email');
    }
}
