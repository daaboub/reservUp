<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\Admin;
use App\Services\AdminPermissionsProxy;
use App\Services\AdminProxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    protected $adminPermissionsProxy;

    public function __construct(AdminPermissionsProxy $adminPermissionsProxy)
    {
        $this->adminPermissionsProxy = $adminPermissionsProxy;
    }

    // Afficher la liste des administrateurs
    public function index()
    {   

        $adminPermissionsProxy = $this->adminPermissionsProxy;

        if (!$this->adminPermissionsProxy->hasPermission('view_admin')) {
            return abort(403);
        }

        $admins = $this->adminPermissionsProxy->viewAdmins();
        return view('admins.admin.index', compact('admins', 'adminPermissionsProxy'));
    }

    // Afficher le formulaire de création d'un administrateur
    public function create()
    {

        $abilities = Ability::all();
        $adminPermissionsProxy = $this->adminPermissionsProxy;
        
        if (!$this->adminPermissionsProxy->hasPermission('create_admin')) {
            return abort(403);
        }

        return view('admins.admin.create' , compact('adminPermissionsProxy', 'abilities'));
    }

    // Créer un administrateur
    public function store(Request $request)
    {
        if (!$this->adminPermissionsProxy->hasPermission('create_admin')) {
            return abort(403);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'roles' => 'array',
        ]);

        $message = $this->adminPermissionsProxy->createAdmin($data);

        return redirect()->route('admin.index')->with('success', $message);
    }

    // Supprimer un administrateur
    public function destroy(Admin $admin)
    {
        if (!$this->adminPermissionsProxy->hasPermission('delete_admin')) {
            return abort(403);
        }

        $message = $this->adminPermissionsProxy->deleteAdmin($admin);

        return redirect()->route('admin.index')->with('success', $message);
    }

    public function toggleSuspension($id)
    {
        // Trouver l'administrateur par ID
        $admin = Admin::findOrFail($id);

        // Inverser l'état de suspension
        $admin->suspended = !$admin->suspended;

        // Sauvegarder les modifications dans la base de données
        $admin->save();

        // Retourner un message de succès
        $status = $admin->suspended ? 'suspended' : 'reactivated';
        return redirect()->route('admin.index')->with('status', "Admin has been {$status} successfully.");
    }
}
