<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Traits\NumberToWords;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    use NumberToWords;

    public function approvisionnementGetForm()
    {
        $modes_approvisionnement = ['Espèces', 'Chèque', 'Virement', 'Carte de crédit'];
        return view('bon-approvisionnement-form', compact('modes_approvisionnement'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caissier_id' => 'required|integer',
            'date' => 'required|date',
            'nom_du_deposant' => 'required|string|max:255',
            'objet' => 'required|string|max:255',
            'mode_approvisionnement' => 'required|in:Espèces,Chèque,Virement,Carte de crédit',
            'montant' => 'required|numeric'
        ]);

        Approvisionnement::create($validatedData);

        return redirect()->route('rapport.journalier')
                         ->with('success', 'Approvisionnement créé avec succès.');
    }

    public function approvisionnement(int $id)
    {
        $approvisionnement = Approvisionnement::find($id);
        $montantEnLettres = $this->nombreEnLettres($approvisionnement->montant);
        return view('bon-approvisionnement', compact('approvisionnement', 'montantEnLettres'));
    }

}
