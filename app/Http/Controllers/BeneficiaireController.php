<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\CategorieBeneficiaire;
use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    public function beneficiaireGetForm()
    {
        $categories = CategorieBeneficiaire::all();
        return view('beneficiaire-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categorie_id' => 'required|integer',
            'denomination' => 'required|string|max:255',
            'num_tel' => 'required|string|max:20', // Ajustez la validation selon vos besoins
            'num_ifu' => 'required|string|max:20', // Ajustez la validation selon vos besoins
            'adresse' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
        ]);

        Beneficiaire::create($validatedData);

        return back()->with('success', 'Bénéficiaire enregistré avec succès !');
    }

    public function beneficiaire(int $id)
    {
        $beneficiaire = Beneficiaire::find($id);
        return view('compte-beneficiaire', compact('beneficiaire'));
    }
}
