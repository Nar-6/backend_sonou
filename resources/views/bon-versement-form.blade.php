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
        <div></div>
    </div>
</div>
<section style="margin-top: 1%;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div class="card shadow-lg o-hidden border-0 my-5 versement-form">
                <div class="card-body p-0 versement-form">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;">
                                <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: 'poppins';">
                                    <strong><span style="text-decoration: underline;">Créer un bon de versement</span></strong>
                                </h2>
                                <p class="text-center">Veuillez remplir le formulaire ci-dessous pour créer un bon de versement&nbsp;<br></p>
                                <hr>
                                <form class="user" style="margin-top: 10%;" method="POST" action="{{ route('versement.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Date</label>
                                            <input class="form-control form-control-user" type="date" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Nom du déposant</label>
                                            <input class="form-control form-control-user" type="text" placeholder="Nom du déposant" name="nom_du_deposant">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Objet du versement</label>
                                            <input class="form-control form-control-user" type="text" placeholder="Objet du versement" name="objet_du_versement">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Motif :</label>
                                            <input class="form-control form-control-user" type="text" placeholder="Motif" name="motif">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <label class="text-left" style="font-size: 13px;">Montant à payer (FCFA)</label>
                                            <input class="form-control form-control-user" type="text" placeholder="Montant à payer (FCFA)" name="montant">
                                        </div>
                                    </div>
                                    <input type="hidden" name="caissier_id" value="{{ Auth::user()->id }}">
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;">CREER</button>
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