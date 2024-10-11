<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billetages extends Model
{
    use HasFactory;

    protected $fillable = [
        'billet_10000',
        'billet_5000',
        'billet_2000',
        'billet_1000',
        'billet_500',
        'piece_500',
        'piece_200',
        'piece_100',
        'a_solde_physique',
        'b_solde_theorique',
        'c_ecart',
        'date',
        'montant_total'
    ];

    /**
     * Calculer le montant total en fonction des billets et pièces.
     *
     * @return int
     */
    public function calculerMontantTotal()
    {
        $this->montant_total = 
            ($this->billet_10000 * 10000) +
            ($this->billet_5000 * 5000) +
            ($this->billet_2000 * 2000) +
            ($this->billet_1000 * 1000) +
            ($this->billet_500 * 500) +
            ($this->piece_500 * 500) +
            ($this->piece_200 * 200) +
            ($this->piece_100 * 100);

        return $this->montant_total;
    }

    public function calculerEcart()
    {
        $this->c_ecart = $this->a_solde_physique - $this->b_solde_theorique;
        return $this->c_ecart;
    }
}
