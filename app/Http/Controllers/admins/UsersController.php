<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs
        $users = User::where("id", "!=", Auth::user()->id)->get();
        return view('admins.users.index', compact('users'));
    }

    public function suspend(User $user)
    {

        $user->suspended = !$user->suspended;

        $user->save();

        $status = $user->suspended ? 'suspended' : 'reactivated';

        return redirect()->route('users.index')->with('success', "User has been {$status} successfully.");
    }
}
