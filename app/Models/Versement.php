<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;

    protected $fillable = [
        'caissier_id',
        'date',
        'nom_du_deposant',
        'objet_du_versement',
        'motif',
        'montant',
    ];

    public function caissier()
    {
        return $this->belongsTo(User::class);
    }

}
