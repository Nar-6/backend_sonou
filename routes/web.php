<?php

use App\Http\Controllers\AnnulationController;
use App\Http\Controllers\ApprovisionnementController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementFactureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('connexion');
})->name('login');

Route::post('/connexion', [UserController::class, 'connexion'])->name('connexion');
Route::post('/beneficiaire/store', [BeneficiaireController::class, 'store'])->name('beneficiaire.store')->middleware('auth');
Route::post('/facture/store', [FactureController::class, 'store'])->name('facture.store')->middleware('auth');
Route::post('/versement/store', [VersementController::class, 'store'])->name('versement.store')->middleware('auth');
Route::post('/approvisionnement/store', [ApprovisionnementController::class, 'store'])->name('approvisionnement.store')->middleware('auth');
Route::post('/paiement/facture/store', [PaiementFactureController::class, 'store'])->name('paiement.facture.store')->middleware('auth');
Route::post('/annulation/store', [AnnulationController::class, 'store'])->name('annulation.store')->middleware('auth');
Route::post('/avance/store', [FactureController::class, 'storeAvance'])->name('avance.store')->middleware('auth');
Route::post('/autre/store', [DashboardController::class, 'storeAutre'])->name('autre.store')->middleware('auth');
Route::post('/ouvrir', [DashboardController::class, 'ouvrirCaisse'])->name('ouvrir.caisse')->middleware('auth');
Route::post('/ouvrir/base', [DashboardController::class, 'ouvrirCaisseMontantBase'])->name('ouvrir.base')->middleware('auth');

Route::get('/beneficiaires/periode', [DashboardController::class, 'beneficiairesPeriode'])->name('beneficiaires.periode')->middleware('auth');
Route::get('/beneficiaire/periode/{id}', [DashboardController::class, 'beneficiairePeriode'])->name('beneficiaire.periode')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/beneficiaire/form', [BeneficiaireController::class, 'beneficiaireGetForm'])->name('beneficiaire.form')->middleware('auth');
Route::get('/facture/form', [FactureController::class, 'factureGetForm'])->name('facture.form')->middleware('auth');
Route::get('/avance/form', [FactureController::class, 'avanceGetForm'])->name('avance.form')->middleware('auth');
Route::get('/rapport/journalier', [DashboardController::class, 'getRapportJournalier'])->name('rapport.journalier')->middleware('auth');
Route::get('/versement/form', [VersementController::class, 'versementGetForm'])->name('versement.form')->middleware('auth');
Route::get('/approvisionnement/form', [ApprovisionnementController::class, 'approvisionnementGetForm'])->name('approvisionnement.form')->middleware('auth');
Route::get('/bons', [DashboardController::class, 'bons'])->name('bons')->middleware('auth');
Route::get('/versement/{id}', [VersementController::class, 'versement'])->name('versement')->middleware('auth');
Route::get('/approvisionnement/{id}', [ApprovisionnementController::class, 'approvisionnement'])->name('approvisionnement')->middleware('auth');
Route::get('/paiement/facture', [PaiementFactureController::class, 'getForm'])->name('paiement.facture')->middleware('auth');
Route::get('/annulation/correction', [AnnulationController::class, 'getCorrectionForm'])->name('correction.form')->middleware('auth');
Route::get('/annulation/regularisation', [AnnulationController::class, 'getRegularisationForm'])->name('regularisation.form')->middleware('auth');
Route::get('/rapport/aib', [DashboardController::class, 'getRapportAib'])->name('rapport.aib')->middleware('auth');
Route::get('/beneficiaires', [DashboardController::class, 'beneficiaires'])->name('beneficiaires')->middleware('auth');
Route::get('/beneficiaire/{id}', [BeneficiaireController::class, 'beneficiaire'])->name('beneficiaire')->middleware('auth');
Route::get('/autre/form', [DashboardController::class, 'autreGetForm'])->name('autre.form')->middleware('auth');
Route::get('/fiche/billetage', [DashboardController::class, 'getFicheBilletage'])->name('fiche.billetage')->middleware('auth');

