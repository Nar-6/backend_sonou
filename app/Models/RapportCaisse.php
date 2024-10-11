<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportCaisse extends Model
{
    use HasFactory;

     // Spécifie les colonnes qui peuvent être assignées en masse (mass assignment)
     protected $fillable = [
        'montant_base',
        'montant_veiile',
        'date',
        'site',
        'caissier_id'
    ];

    // La fonction pour définir la relation avec le caissier (user)
    public function caissier()
    {
        return $this->belongsTo(User::class, 'caissier_id');
    }
}
