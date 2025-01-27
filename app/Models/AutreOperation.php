<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutreOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie',
        'beneficiaire_id',
        'montant',
        'motif_operation',
        'executant',
        'beneficiaire_depense',
        'ci_pp',
        'numero_identite',
        'exp_le'
    ];
}
