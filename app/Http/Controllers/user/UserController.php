<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    // Créer un nouvel utilisateur
    public function create(Request $request)
    {
        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashage du mot de passe
        ]);

        // Retourner une réponse ou redirection après la création de l'utilisateur
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès.');
    }
}
