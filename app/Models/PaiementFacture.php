<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementFacture extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'beneficiaire_id',
        'numero_facture',
        'motif_facture',
        'montant',
        'date_facture',
        'montant_imposable',
        'nature_retenue',
        'taux_aib',
        'montant_aib',
        'net_a_payer',
        'montant_a_payer'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'numero_fature', 'num_facture');
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'beneficiaire_id');
    }
}
