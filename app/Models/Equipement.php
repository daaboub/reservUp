<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $fillable = ["nom"];


    public function salles()
    {
        return $this->belongsToMany(Salle::class, 'equipement_salle', 'equipement_id', 'salle_id');
    }

}
