<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'beneficiaire_id',
        'numero_facture',
        'motif_facture',
        'montant',
        'date_facture',
        'type'
    ];
}
