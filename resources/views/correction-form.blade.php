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
            <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold; font-family: 'poppins';">
                <span style="text-decoration: underline;">CORRECTION</span>
            </h2>
            <div class="card shadow-lg o-hidden border-0 my-5 correction-form">
                <div class="card-body p-0 pay-facture">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;">
                                <p class="text-center">Veuillez remplir le formulaire ci-dessous pour effectuer une correction<br></p>
                                <hr>
                                <form class="user" style="margin-top: 10%;" method="POST" action="{{ route('annulation.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Choisir une catégorie :</label>
                                            <select id="categorie-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="categorie_id"  required="">
                                                <optgroup label="Choisir une catégorie">
                                                    <option selected="">Choisir une catégorie</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>   
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Choisir la pièce :</label>
                                            <select id="facture-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="numero_facture"  required="">
                                                <optgroup label="Choisir une catégorie">
                                                    <option selected>Choisir la pièce</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Bénéficiaire :</label>
                                            <input type="hidden" id="beneficiaire_id_hidden" name="beneficiaire_id">
                                            <input class="form-control form-control-user" type="text" id="beneficiaire_id" placeholder="Bénéficiaire" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;font-weight: normal;"><strong>Montant de la pièce :</strong></label>
                                            <input class="form-control form-control-user" type="text" id="montant" placeholder="Montant" name="montant">
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <label class="text-left" style="font-size: 13px;font-weight: normal;"><strong>Date de la pièce</strong>&nbsp;:</label>
                                            <input class="form-control form-control-user" type="date" name="date_facture" id="date_facture">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;font-weight: normal;"><strong>Motif :</strong></label>
                                            <input class="form-control form-control-user" type="text" id="motif_facture" placeholder="Motif de la facture" name="motif_facture">
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="correction">
                                    <input type="hidden" name="caissier_id" value="{{ Auth::user()->id }}">
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;">Corriger</button>
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
    const beneficiaires = @json($beneficiaires);

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
        const factureSelect = document.getElementById('facture-select');
        
        // Vider les options existantes dans le select facture
        factureSelect.innerHTML = '<option value="" selected>Choisir la pièce</option>';
        
        // Remplir les options avec les factures de la catégorie sélectionnée
        if (facturesParCategorie[catId]) {
            facturesParCategorie[catId].forEach(facture => {
                const option = document.createElement('option');
                option.value = facture.numero_facture;
                option.textContent = `${facture.numero_facture}`;
                factureSelect.appendChild(option);
            });
        }

        factureSelect.addEventListener('change', function () {
            const facId = this.value;
            factures.forEach(fac => {
                if (fac.numero_facture == facId) {                    
                    //document.getElementById('motif_facture').value = fac.motif_facture; // Motif de la facture
                    document.getElementById('montant').value = fac.montant; // Montant TTC
                    document.getElementById('date_facture').value = fac.date_facture; // Date de la facture
                    //document.getElementById('montant_imposable').value = fac.montant_imposable; // Montant Imposable
                    document.getElementById('motif_facture').value = fac.motif_facture; // Nature de la retenue
                    //document.getElementById('taux_aib').value = fac.taux_aib; // Taux AIB
                    document.getElementById('beneficiaire_id_hidden').value = fac.beneficiaire_id; // Montant AIB
                    beneficiaires.forEach(ben => {
                        if (ben.id == fac.beneficiaire_id) {
                            document.getElementById('beneficiaire_id').value = ben.denomination;
                        }
                    });


                    //document.getElementById('net_a_payer').value = fac.net_a_payer; // Net à payer
                    //document.getElementById('montant_a_payer').value = fac.montant_a_payer; // Montant à payer
                }
            });
        });

    });
</script>
@endsection
