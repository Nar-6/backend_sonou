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
                    <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: 'poppins';">
                        <u>Enregistrer un Bénéficiaire</u>
                    </h2>
                </div>
            </div>
        </div>
        <section style="margin-top: 1%;">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0 beneficiare">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="p-5" style="height: 500px;">
                                        <div class="text-center">
                                            <h6 class="mb-4">Veuillez remplir le formulaire ci-dessous pour enregistrer un bénéficiaire</h6>
                                        </div>
                                        <form class="user" style="margin-top: 10%;" action="{{ route('beneficiaire.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <select class="form-control form-select" name="categorie_id">
                                                    
                                                        <option selected>Choisir une catégorie</option>
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>   
                                                        @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" id="selectInput" placeholder="Dénomination" name="denomination">
                                                </div>
                                                <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="N° Tel" name="num_tel">
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="N° Ifu" name="num_ifu">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Adresse" name="adresse">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Poste" name="poste">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;">Enregistrer</button>
                                        </form>
                                        <div class="text-center"></div>
                                        <div class="text-center"></div>
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