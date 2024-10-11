<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'denomination',
        'num_tel',
        'num_ifu',
        'adresse',
        'poste',
    ];

    public function categorie()
    {
        return $this->belongsTo(CategorieBeneficiaire::class);
    }

    public function facturesPayees()
    {
        return $this->hasMany(PaiementFacture::class, 'beneficiaire_id');
    }
}
