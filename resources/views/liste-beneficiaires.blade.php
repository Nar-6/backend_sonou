@extends('base')    

@section('main-content')

<div class="row">
    <div class="col">
        <div></div>
    </div>
</div>
<section style="margin-top: 1%;">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col">
            <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: poppins;"><strong><span style="text-decoration: underline;">Liste des bénéficiaires</span></strong><br></h2>
            <p class="text-center"></p>
            <div class="card shadow-lg o-hidden border-0 my-5 releve" style="background-color: rgba(255,255,255,0.47);">
                <div class="card-body border rounded p-0">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;">
                                <div class="row">
                                    <div class="col d-xl-flex justify-content-xl-center align-items-xl-center">
                                        <form class="user" style="width: 100%;">
                                            <div class="form-group">
                                                <p style="font-size: 20px;font-weight: bold;">Site :<span style="margin-left: 2%;">Calavi</span></p>
                                            </div>
                                        </form>
                                    </div>
                                    <form action="{{ route('beneficiaires.periode') }}" method="get" class="d-flex" style="align-items:center;">
                                        @csrf
                                        <div class="col">
                                            <div class="user">
                                                <div class="form-group text-center">
                                                    <label style="font-size: 13px;color: rgb(0,0,0);">Periode Du :</label>
                                                    <input class="form-control form-control-user" type="date" name="du" value="{{ isset($dateDebut) ? $dateDebut : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="user">
                                                <div class="form-group text-center">
                                                    <label style="font-size: 13px;color: rgb(0,0,0);">Au :</label>
                                                    <input class="form-control form-control-user" type="date" name="au" value="{{ isset($dateFin) ? $dateFin : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" style="font-weight: bold; height:50%; " class="btn btn-primary btn-block text-white btn-user">
                                            Obtenir
                                        </button>
                                    </form>
                                </div>
                                <hr>
                                <div class="table-responsive table-bordered border rounded" style="filter: brightness(41%) saturate(0%);color: rgb(255,255,255);">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" rowspan="2">N° du Bénéficiaire</td>
                                                <td class="text-center" rowspan="2" colspan="2">Nom ou Raison Social</td>
                                                <td class="text-center" rowspan="2" colspan="2">N° de la facture</td>
                                                <td class="text-center" rowspan="2" colspan="2">Date facture</td>
                                                <td class="text-center" colspan="4">Mouvements</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">Débit</td>
                                                <td class="text-center">Crédit</td>
                                            </tr>
                                            @foreach ($tableauBeneficiaires as $ligne)
                                                <tr style="cursor: pointer;" onclick="window.location='{{ route('beneficiaire', ['id'=>$ligne['id']]) }}'">
                                                    <td class="text-center"><strong>{{ $ligne['beneficiaire_id'] }}</strong></td>
                                                    <td class="text-center" colspan="2">{{ $ligne['denomination'] }}</td>
                                                    <td class="text-center" colspan="2">{{ $ligne['numero_facture'] }}</td>
                                                    <td class="text-center" colspan="2">{{ $ligne['date_facture'] }}</td>
                                                    <td class="text-center">{{ $ligne['categorie_1'] }}</td>
                                                    <td class="text-center">{{ $ligne['categorie_3'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form>
                <div class="form-group d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end"></div>
            </form>
        </div>
        <div class="col-xl-1"></div>
    </div>
</section>
@endsection