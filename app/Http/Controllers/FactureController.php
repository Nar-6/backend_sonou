<?php

namespace App\Http\Controllers;

use App\Models\Avance;
use App\Models\Beneficiaire;
use App\Models\CategorieFacture;
use App\Models\Facture;
use App\Models\PaiementFacture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function factureGetForm()
    {
        $categories = CategorieFacture::all();
        $num_facture = Facture::count() + 1;
        $new_num_facture = 'FACT-' . str_pad($num_facture, 5, '0', STR_PAD_LEFT);
        return view('facture-form', compact('categories', 'new_num_facture'));
    }

    public function avanceGetForm()
    {
        $categories = CategorieFacture::all();
        $factures_paye = PaiementFacture::pluck('numero_facture'); // Récupère seulement les numéros de facture
        $beneficiaires = Beneficiaire::all();
        $factures = Facture::whereNotIn('num_facture', $factures_paye)->get(); // Exclut les factures déjà payées

        return view('avances-form', compact('categories', 'beneficiaires', 'factures'));
    }

    public function store(Request $request)
    {
         // Validation des données
         $validatedData = $request->validate([
            'categorie_id' => 'required|integer',
            'num_facture' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'montant_tva' => 'nullable|numeric',
            'montant_aib' => 'nullable|numeric',
            'montant_ttc' => 'required|numeric',
            'date_facture' => 'required|date',
            'operation' => 'required|string|max:255',
            'retenue' => 'nullable|string|max:255',
        ]);

        // Enregistrer la facture
        Facture::create($validatedData);

        return back()->with('success', 'Facture enregistrée avec succès');
    }

    public function storeAvance(Request $request)
    {
         // Validation des données
         $validatedData = $request->validate([
            'categorie_id' => 'required|integer',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'numero_facture' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'avance_percue' => 'required|numeric',
            'date' => 'required|date',
            'motif_facture' => 'required|string|max:255',
            'executant' => 'required|string|max:255',
            'beneficiaire_depense' => 'required|string|max:255',
            'ci_pp' => 'required|in:ci,pp',
            'numero_identite' => 'required|string|max:255',
            'exp_le' => 'required|date',
        ]);        
        // Enregistrer la facture
        Avance::create($validatedData);

        return redirect()->route('rapport.journalier')
        ->with('success', 'Paiement enregistré avec succès.');
    }

    
}
