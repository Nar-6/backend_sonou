<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    use HasFactory;

    protected $table = 'approvisionnements';

    protected $fillable = [
        'caissier_id',
        'date',
        'montant',
        'objet',
        'mode_approvisionnement',
        'nom_du_deposant'
    ];

    public function caissier()
    {
        return $this->belongsTo(User::class);
    }
}
