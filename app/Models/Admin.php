<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;

class Admin extends Authenticatable
{

    use Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'suspended'
    ];


    public function abilities()
    {
        return $this->belongsToMany(Ability::class, 'ability_user', "admin_id", "ability_id");
    }
}
