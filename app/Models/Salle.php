<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = ["nom", "capacite", "disponiblite"];


    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'equipement_salle', 'salle_id', 'equipement_id');
    }
}
