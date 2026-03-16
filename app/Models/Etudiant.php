<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom', 
        'prenom', 
        'email'
    ];

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
