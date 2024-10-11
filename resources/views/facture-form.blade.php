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
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <div>
            <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: poppins;">
                <u>Enregistrer une Facture</u>
            </h2>
            <p class="text-center">
                Veuillez remplir le formulaire ci-dessous pour enrégistrer une facture<br>
            </p>
        </div>
    </div>
</div>
<section style="margin-top: 1%;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div class="card shadow-lg o-hidden border-0 my-5 facture-form">
                <div class="card-body p-0 facture-form" style="min-height: 100%;">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;">
                                <form class="user" style="margin-top: 10%;" method="POST" action="{{ route('facture.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Catégorie :</label>
                                            <select class="form-control form-select" style="color: rgb(139,139,139);background-color: rgb(255,255,255);" name="categorie_id"  required>
                                                <optgroup>
                                                    <option selected>Choisir une catégorie</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>   
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="text-left" style="font-size: 13px;">N° Facture :</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName" value="{{ $new_num_facture }}" placeholder="N° Facture" name="num_facture" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Montant :</label>
                                            <input class="form-control form-control-user" type="text" id="montant" placeholder="Montant" name="montant">
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Montant TVA :</label>
                                            <input class="form-control form-control-user" type="text" id="montant_tva" placeholder="Montant TVA" name="montant_tva">
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Montant AIB :</label>
                                            <input class="form-control form-control-user" type="text" id="montant_aib" placeholder="Montant AIB" name="montant_aib">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Date Facture :</label>
                                            <input class="form-control form-control-user" type="date" name="date_facture">
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Nature de l'opération :</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Opération" name="operation">
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <label class="text-left" style="font-size: 13px;">Montant TTC :</label>
                                            <input class="form-control form-control-user" type="text" id="montant_ttc" placeholder="Montant TTC" name="montant_ttc">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Nature de la Retenue :</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Retenue" name="retenue">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;">Enregitrer</button>
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
        const montant = document.getElementById('montant');
        const montant_tva = document.getElementById('montant_tva');
        const montant_aib = document.getElementById('montant_aib');

        document.getElementById('montant_ttc').addEventListener('click', function() {
            this.value = parseFloat(montant.value) + parseFloat(montant_aib.value) + parseFloat(montant_tva.value);
        });
    </script>
@endsection