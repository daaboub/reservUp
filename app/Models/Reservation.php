<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'salle_id',
        'date_reservation',
        'status',
    ];


     // Relation avec User
     public function user()
     {
        return $this->belongsTo(User::class);
     }
 
     // Relation avec Salle
     public function salle()
     {
        return $this->belongsTo(Salle::class);
     }
}
