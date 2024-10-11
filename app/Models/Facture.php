<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'num_facture',
        'montant',
        'montant_tva',
        'montant_aib',
        'date_facture',
        'operation',
        'montant_ttc',
        'retenue',
    ];
    
    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(CategorieFacture::class);
    }
}
