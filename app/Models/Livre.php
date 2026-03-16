<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [
        'titre', 
        'date_publication', 
        'auteur_id'
    ];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
