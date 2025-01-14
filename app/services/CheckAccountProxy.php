<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class CheckAccountProxy
{
    // Vérifie si l'administrateur est suspendu
    public function checkIfSuspended($admin)
    {
        if ($admin && $admin->suspended) {
            return true; 
        }

        return false;
    }

    
}