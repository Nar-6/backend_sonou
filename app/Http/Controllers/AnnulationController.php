<?php

namespace App\Http\Controllers;

use App\Models\Annulation;
use App\Models\Beneficiaire;
use App\Models\CategorieFacture;
use App\Models\PaiementFacture;
use Illuminate\Http\Request;

class AnnulationController extends Controller
{
    public function getCorrectionForm()
    {
        $categories = CategorieFacture::all();
        $factures = PaiementFacture::whereDate('date_facture', now())->get();
        $beneficiaires_pluck = PaiementFacture::pluck('beneficiaire_id');
        $beneficiaires = Beneficiaire::whereIn('id', $beneficiaires_pluck)->get();

        return view('correction-form', compact('categories', 'factures', 'beneficiaires'));
    }
    public function getRegularisationForm()
    {
        $categories = CategorieFacture::all();
        $factures = PaiementFacture::all();
        $beneficiaires_pluck = PaiementFacture::pluck('beneficiaire_id');
        $beneficiaires = Beneficiaire::whereIn('id', $beneficiaires_pluck)->get();

        return view('regularisation-form', compact('categories', 'factures', 'beneficiaires'));
    }

    public function store(Request $request)
    {
         // Validation des données
         $validatedData = $request->validate([
            'caissier_id' => 'required|integer',
            'categorie_id' => 'required|integer',
            'beneficiaire_id' => 'required|integer',
            'numero_facture' => 'required|string',
            'motif_facture' => 'required|string',
            'montant' => 'required|numeric',
            'type' => 'required|in:correction,regularisation',
            'date_facture' => 'required|date'
        ]);

        // Enregistrer la facture
        Annulation::create($validatedData);

        return redirect()->route('rapport.journalier')
        ->with('success', 'Correction enregistré avec succès.');
    }
}
