<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AdminPermissionsProxy
{
    // Vérifie si l'administrateur a la permission spécifique
    public function hasPermission($permission)
    {
        // Récupérer l'administrateur authentifié
        $admin = Auth::guard('admin')->user();

        // Vérifier si l'administrateur a cette permission
        return $admin->abilities->contains('name', $permission);
    }

    // Création d'un administrateur
    public function createAdmin($data)
    {

       if ($this->hasPermission('create_admin')) {
            $admin = Admin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            if (isset($data['roles'])) {
                foreach ($data['roles'] as $role_id) {
                    $admin->abilities()->attach($role_id);
                }
            }

            return 'Admin created successfully';
        }

        return 'You do not have permission to create an admin.';
    }

    // Suppression d'un administrateur
    public function deleteAdmin(Admin $admin)
    {
        if ($this->hasPermission('delete_admin')) {
            // Logique pour supprimer un administrateur
            $admin->delete();
            return 'Admin deleted successfully';
        }

        return 'You do not have permission to delete an admin.';
    }

    // Voir les administrateurs
    public function viewAdmins()
    {
        if ($this->hasPermission('view_admin')) {
            // Logique pour afficher les administrateurs
            return Admin::all();
        }

        return 'You do not have permission to view admins.';
    }
}

