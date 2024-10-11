<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\CategorieFacture;
use App\Models\Facture;
use App\Models\PaiementFacture;
use Illuminate\Http\Request;

class PaiementFactureController extends Controller
{
    public function getForm()
    {
        $categories = CategorieFacture::all();
        $factures_paye = PaiementFacture::pluck('numero_facture'); // Récupère seulement les numéros de facture
        $beneficiaires = Beneficiaire::all();
        $factures = Facture::whereNotIn('num_facture', $factures_paye)->get(); // Exclut les factures déjà payées

        return view('pay-facture-form', compact('categories', 'factures', 'beneficiaires'));
    }

    public function store(Request $request)
    {
         // Validation des données
         $validatedData = $request->validate([
            'categorie_id' => 'required|integer',
            'beneficiaire_id' => 'required|integer',
            'numero_facture' => 'required|string',
            'motif_facture' => 'required|string',
            'montant' => 'required|numeric',
            'montant_imposable' => 'nullable|numeric',
            'nature_retenue' => 'nullable|string',
            'taux_aib' => 'nullable|numeric',
            'montant_aib' => 'nullable|numeric',
            'date_facture' => 'required|date',
            'net_a_payer' => 'required|numeric',
            'montant_a_payer' => 'required|numeric',
        ]);

        // Enregistrer la facture
        PaiementFacture::create($validatedData);

        return redirect()->route('rapport.journalier')
        ->with('success', 'Paiement enregistré avec succès.');
    }

}
