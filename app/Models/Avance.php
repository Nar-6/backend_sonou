<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'beneficiaire_id',
        'numero_facture',
        'montant',
        'avance_percue',
        'date',
        'motif_facture',
        'executant',
        'beneficiaire_depense',
        'ci_pp',
        'numero_identite',
        'exp_le'
    ];
}
