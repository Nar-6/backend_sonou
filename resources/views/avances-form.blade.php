@extends('base')

@section('main-content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col">
        <div></div>
    </div>
</div>
<section style="margin-top: 1%;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div class="card shadow-lg o-hidden border-0 my-5 pay-avance">
                <div class="card-body p-0 pay-avance">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;">
                                <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: 'poppins';">
                                    <strong><span style="text-decoration: underline;">Paiement d'une avance</span></strong>
                                </h2>
                                <p class="text-center">
                                    Veuillez remplir le formulaire ci-dessous pour effectuer un payement d'avance<br>
                                </p>
                                <hr>
                                <form class="user" style="margin-top: 10%;" method="POST" action="{{ route('avance.store') }}">
                                    @csrf 
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">
                                                Choisir une categorie :
                                            </label>
                                            <select id="categorie-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="categorie_id" required>
                                                <optgroup label="Choisir une catégorie">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>   
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">
                                                Choisir un bénéficiaire :
                                            </label>
                                            <select id="beneficiaire-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="beneficiaire_id" required>
                                                <optgroup label="Choisir une bénéficiaire">
                                                    <option selected>Choisir une bénéficiaire</option>
                                                    @foreach ($beneficiaires as $beneficiaire)
                                                        <option value="{{ $beneficiaire->id }}">{{ $beneficiaire->denomination }}</option>   
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">
                                                Un N° de Facture :
                                            </label>
                                            <select id="facture-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="numero_facture" required>
                                                <optgroup label="Choisir une facture">
                                                    <option value="12" selected="">Choisir une facture</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Montant à payer (FCFA) :</label>
                                            <input class="form-control form-control-user" type="text" id="montant" placeholder="Montant" name="montant">
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Avances perçues :</label>
                                            <input class="form-control form-control-user" type="text" id="avance_percue" placeholder="Avance percue" name="avance_percue">
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Date :</label>
                                            <input class="form-control form-control-user" type="date" name="date" id="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Motif :</label>
                                            <input class="form-control form-control-user" type="text" id="motif_facture" placeholder="Motif" name="motif_facture">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Exécutant de la dépense :</label>
                                            <input class="form-control form-control-user" type="text" id="executant" placeholder="Exécutant de la dépense" name="executant">
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <label class="text-left" style="font-size: 13px;">Bénéficiaire de la dépense :</label>
                                            <input class="form-control form-control-user" type="text" id="beneficiaire_depense" placeholder="Bénéficiaire de la dépense" name="beneficiaire_depense">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">CI\PP</label>
                                            <select id="ci_pp" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="ci_pp" required>
                                                <optgroup label="Choisir une facture">
                                                    <option value="ci" selected>Carte d'identité</option>
                                                    <option value="pp">Passeport</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">N° :</label>
                                            <input class="form-control form-control-user" type="text" id="numero_identite" placeholder="N° de la piece d'identité" name="numero_identite">
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Exp le :</label>
                                            <input class="form-control form-control-user" type="date" name="exp_le">
                                        </div>
                                    </div>
                                    <button type="submit" style="font-weight: bold;" class="btn btn-primary btn-block text-white btn-user">
                                        Enregitrer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</section>

@endsection


@section('scripts')
<script>
    const factures = @json($factures);
    const categories = @json($categories);

    // Classer les factures par catégorie
    const facturesParCategorie = {};

    // Initialisation des tableaux de factures pour chaque catégorie
    categories.forEach(cat => {
        facturesParCategorie[cat.id] = [];
    });

    // Classer les factures par catégorie
    factures.forEach(facture => {
        const catId = facture.categorie_id; // Suppose que la facture a une catégorie associée
        if (facturesParCategorie[catId]) {
            facturesParCategorie[catId].push(facture);
        }
    });

    // Synchroniser les options de facture selon la catégorie choisie
    document.getElementById('categorie-select').addEventListener('change', function() {
        const catId = this.value;
        console.log(catId);
        
        const factureSelect = document.getElementById('facture-select');
        
        // Vider les options existantes dans le select facture
        factureSelect.innerHTML = '<option value="" selected>Choisir une facture</option>';
        
        // Remplir les options avec les factures de la catégorie sélectionnée
        if (facturesParCategorie[catId]) {
            facturesParCategorie[catId].forEach(facture => {
                const option = document.createElement('option');
                option.value = facture.num_facture;
                option.textContent = `${facture.num_facture}`;
                factureSelect.appendChild(option);
            });
        }

        factureSelect.addEventListener('change', function () {
            const facId = this.value;
            factures.forEach(fac => {
                if (fac.num_facture == facId) {
                    console.log(fac);
                    
                    //document.getElementById('motif_facture').value = fac.motif_facture; // Motif de la facture
                    document.getElementById('montant').value = fac.montant_ttc; // Montant TTC
                    document.getElementById('date').value = fac.date_facture; // Date de la facture
                    //document.getElementById('montant_imposable').value = fac.montant_imposable; // Montant Imposable
                    //document.getElementById('retenue').value = fac.retenue; // Nature de la retenue
                    //document.getElementById('taux_aib').value = fac.taux_aib; // Taux AIB
                    //document.getElementById('montant_aib').value = fac.montant_aib; // Montant AIB
                    //document.getElementById('net_a_payer').value = fac.net_a_payer; // Net à payer
                    //document.getElementById('montant_a_payer').value = fac.montant_a_payer; // Montant à payer
                }
            });
        });

    });

   
</script>
@endsection
