<?php

namespace App\Http\Controllers;

use App\Models\Versement;
use App\Traits\NumberToWords;
use Illuminate\Http\Request;

class VersementController extends Controller
{
    use NumberToWords;
    public function versementGetForm()
    {
        return view('bon-versement-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caissier_id' => 'required|integer',
            'date' => 'required|date',
            'nom_du_deposant' => 'required|string|max:255',
            'objet_du_versement' => 'required|string|max:255',
            'motif' => 'required|string|max:255',
            'montant' => 'required|numeric',
        ]);

        Versement::create($validatedData);

        return redirect()->route('rapport.journalier')
                         ->with('success', 'Versement créé avec succès.');
    }

    public function versement(int $id)
    {
        $versement = Versement::find($id);
        $montantEnLettres = $this->nombreEnLettres($versement->montant);
        return view('bon-versement', compact('versement', 'montantEnLettres'));
    }

}
