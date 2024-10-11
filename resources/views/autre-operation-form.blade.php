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
<div class="container-fluid">
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
                                        <strong><span style="text-decoration: underline;">Autres opérations</span></strong><br>
                                    </h2>
                                    <p class="text-center">Veuillez remplir le formulaire ci dessous pour effectuer un autre paiement<br></p>
                                    <hr>
                                    <form class="user" style="margin-top: 10%;" method="POST" action="{{ route('autre.store') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0">
                                                <label class="text-left" style="font-size: 13px;">Choisir une catégorie :</label>
                                                <select id="categorie-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="categorie" required>
                                                    <optgroup label="Choisir une catégorie">
                                                       <option value="débit">Débit</option>
                                                       <option value="crédit">Crédit</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-xl-6">
                                                <label class="text-left" style="font-size: 13px;">Choisir un Bénéficiaire :</label>
                                                <select id="beneficiaire-select" class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="beneficiaire_id" required>
                                                    <optgroup label="Choisir une bénéficiaire">
                                                        <option selected>Choisir une bénéficiaire</option>
                                                        @foreach ($beneficiaires as $beneficiaire)
                                                            <option value="{{ $beneficiaire->id }}">{{ $beneficiaire->denomination }}</option>   
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                                <label class="text-left" style="font-size: 13px;">Montant à payer (FCFA) :</label>
                                                <input class="form-control form-control-user" type="text" id="selectInput" placeholder="Montant" name="montant">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                                <label class="text-left" style="font-size: 13px;">Motif :</label>
                                                <input class="form-control form-control-user" type="text" id="motif_operation" placeholder="Motif" name="motif_operation">
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
</div>

@endsection