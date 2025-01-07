<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{

    protected $fillable = [
        'name',
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'ability_user');
    }
}
