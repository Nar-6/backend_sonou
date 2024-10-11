<?php

namespace App\Http\Controllers;

use App\Models\Approvisionnement;
use App\Models\AutreOperation;
use App\Models\Beneficiaire;
use App\Models\RapportCaisse;
use App\Models\PaiementFacture;
use App\Models\Versement;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function ouvrirCaisse()
    {
        $dernier_rapport = RapportCaisse::latest()->first();
        if ($dernier_rapport == null)
            RapportCaisse::create([
                'montant_base' => null, // Mettre la valeur par défaut ou calculée
                'montant_veiile' => null, // Mettre la valeur par défaut ou calculée
                'date' => Carbon::today(), // Utilise la date du jour
                'site' => Auth::user()->site, // Remplace par le nom du site approprié
                'caissier_id' => Auth::user()->id, // Remplacer par l'ID du caissier si nécessaire
            ]);
        else
            RapportCaisse::create([
                'montant_base' => $dernier_rapport->montant_veiile, // Mettre la valeur par défaut ou calculée
                'montant_veiile' => null, // Mettre la valeur par défaut ou calculée
                'date' => Carbon::today(), // Utilise la date du jour
                'site' => Auth::user()->site, // Remplace par le nom du site approprié
                'caissier_id' => Auth::user()->id, // Remplacer par l'ID du caissier si nécessaire
            ]);
    }

    public function ouvrirCaisseMontantBase(Request $request)
    {
        $validatedData = $request->validate([
            'montant_base' => 'required|numeric',
        ]);    
        RapportCaisse::create([
            'montant_base' => $validatedData['montant_base'], // Mettre la valeur par défaut ou calculée
            'montant_veiile' => null, // Mettre la valeur par défaut ou calculée
            'date' => Carbon::today(), // Utilise la date du jour
            'site' => Auth::user()->site, // Remplace par le nom du site approprié
            'caissier_id' => Auth::user()->id, // Remplacer par l'ID du caissier si nécessaire
        ]);

        return redirect()->route('rapport.journalier');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function autreGetForm()
    {
        $beneficiaires = Beneficiaire::all();
        return view('autre-operation-form', compact( 'beneficiaires'));
    }

    public function getRapportJournalier()
    {
        $todayRapport = RapportCaisse::whereDate('created_at', Carbon::today())->first();
        $dernier_rapport = RapportCaisse::latest()->first();

        $factures_payees = PaiementFacture::whereDate('created_at', Carbon::today())->get();
        $versements = Versement::whereDate('created_at', Carbon::today())->get();
        $approvisionnements = Approvisionnement::whereDate('created_at', Carbon::today())->get();
        $autres = AutreOperation::whereDate('created_at', Carbon::today())->get();

        return view('rapport-caisse-journalier', compact(
            'factures_payees',
            'versements',
            'approvisionnements',
            'autres',
            'todayRapport',
            'dernier_rapport'
        ));
    }

    public function getRapportAib()
    {
        $factures = PaiementFacture::whereNotNull('montant_aib')->get();
        return view('rapport-retenu-aib', compact('factures'));
    }

    public function bons()
    {
        $versements = Versement::all();
        $approvisionnements = Approvisionnement::all();

        return view('bons-caisse', compact('versements', 'approvisionnements'));
    }

    public function beneficiaires()
    {
        $beneficiaires = Beneficiaire::with('facturesPayees')->get();

        $tableauBeneficiaires = [];

        foreach ($beneficiaires as $beneficiaire) {
            foreach ($beneficiaire->facturesPayees as $facture) {
                $tableauBeneficiaires[] = [
                    'beneficiaire_id' => str_pad($beneficiaire->id, 5, '0', STR_PAD_LEFT),
                    'denomination' => $beneficiaire->denomination,
                    'id' => $beneficiaire->id,
                    'numero_facture' => $facture->numero_facture,
                    'date_facture' => $facture->date_facture,
                    'categorie_1' => $facture->categorie_id == 1 ? 'OUI' : 'NON',
                    'categorie_3' => $facture->categorie_id == 3 ? 'OUI' : 'NON',
                ];
            }
        }
    
        return view('liste-beneficiaires', compact('tableauBeneficiaires'));
    }

    public function beneficiairesPeriode(Request $request)
    {
        // Valider les dates du formulaire
        $validatedData = $request->validate([
            'du' => 'required|date',
            'au' => 'required|date'
        ]);

        // Extraire les dates
        $dateDebut = $validatedData['du'];
        $dateFin = $validatedData['au'];

        // Récupérer tous les bénéficiaires avec leurs factures payées dans la période donnée
        $beneficiaires = Beneficiaire::with(['facturesPayees' => function ($query) use ($dateDebut, $dateFin) {
            $query->whereBetween('date_facture', [$dateDebut, $dateFin]);
        }])->get();

        // Construire un tableau structuré
        $tableauBeneficiaires = [];

        foreach ($beneficiaires as $beneficiaire) {
            foreach ($beneficiaire->facturesPayees as $facture) {
                $tableauBeneficiaires[] = [
                    'beneficiaire_id' => str_pad($beneficiaire->id, 5, '0', STR_PAD_LEFT),
                    'denomination' => $beneficiaire->denomination,
                    'id' => $beneficiaire->id,
                    'numero_facture' => $facture->numero_facture,
                    'date_facture' => $facture->date_facture,
                    'categorie_1' => $facture->categorie_id == 1 ? 'OUI' : 'NON',
                    'categorie_3' => $facture->categorie_id == 3 ? 'OUI' : 'NON',
                ];
            }
        }

        // Retourner la vue avec les données filtrées
        return view('liste-beneficiaires', compact('tableauBeneficiaires', 'dateDebut', 'dateFin'));
    }


    public function beneficiairePeriode(Request $request, int $id)
    {
        // Valider les dates du formulaire
        $validatedData = $request->validate([
            'du' => 'required|date',
            'au' => 'required|date'
        ]);

        // Extraire les dates
        $dateDebut = $validatedData['du'];
        $dateFin = $validatedData['au'];

        // Récupérer le bénéficiaire avec ses factures payées dans la période donnée
        $beneficiaire = Beneficiaire::with(['facturesPayees' => function ($query) use ($dateDebut, $dateFin) {
            $query->whereBetween('date_facture', [$dateDebut, $dateFin]);
        }])->findOrFail($id);

        // Retourner la vue avec les données filtrées
        return view('liste-beneficiaires', compact('beneficiaire', 'dateDebut', 'dateFin'));
    }

    public function storeAutre(Request $request)
    {
        $validatedData = $request->validate([
            'categorie' => 'required|in:débit,crédit',
            'beneficiaire_id' => 'required|exists:beneficiaires,id',
            'montant' => 'required|numeric',
            'motif_operation' => 'required|string|max:255',
            'executant' => 'required|string|max:255',
            'beneficiaire_depense' => 'required|string|max:255',
            'ci_pp' => 'required|in:ci,pp',
            'numero_identite' => 'required|string|max:255',
            'exp_le' => 'required|date',
        ]);        
        // Enregistrer la facture
        AutreOperation::create($validatedData);

        return redirect()->route('rapport.journalier')
        ->with('success', 'Paiement enregistré avec succès.');
    }


    public function getFicheBilletage()
    {
        return view('fiche-billetage');
    }
}
