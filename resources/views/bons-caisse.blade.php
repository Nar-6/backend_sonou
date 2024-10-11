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
            <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;filter: brightness(0%);font-family: Poppins, sans-serif;"><strong><span style="text-decoration: underline;">Liste des Bons de caisse</span></strong><br></h2>
            <form class="user" style="margin-top: 5%;">
                <div class="form-group row">
                    <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="search" placeholder="Rechercher Date"></div>
                    <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="search" placeholder="Rechercher Nom"></div>
                </div>
            </form>
            <div class="card shadow-lg o-hidden border-0 my-5 releve" style="background-color: rgba(179,240,241,0);font-family: Poppins, sans-serif;">
                <div class="card-body border rounded p-0">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;background-color: rgba(75,208,208,0);">
                                <hr>
                                <h2>Versements</h2>
                                <div class="table-responsive border rounded-0" style="filter: brightness(0%) contrast(65%) saturate(0%);color: rgb(255,255,255);font-weight: normal;">
                                    <table class="table">
                                        <tbody style="color: rgb(0,0,0);filter: brightness(124%);">
                                            <tr>
                                                <td class="text-center">N°&nbsp;</td>
                                                <td class="text-left">Objet</td>
                                                <td class="text-left">Date</td>
                                                <td class="text-center">Apercu</td>
                                            </tr>
                                            @foreach ($versements as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->id }}</td>
                                                <td class="text-left"><strong>{{ $item->objet_du_versement }}</strong></td>
                                                <td class="text-left"><strong>{{ $item->date }}</strong></td>
                                                <td class="text-center">
                                                    <a href="{{ route('versement', ['id'=>$item->id]) }}">
                                                        <strong>
                                                            <img height="30" width="30" src="{{ asset('assets/img/apercu.png') }}" alt="">
                                                        </strong>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <hr>
                                <h2>Approvisionnements</h2>
                                <div class="table-responsive border rounded-0" style="filter: brightness(0%) contrast(65%) saturate(0%);color: rgb(255,255,255);font-weight: normal;">
                                    <table class="table">
                                        <tbody style="color: rgb(0,0,0);filter: brightness(124%);">
                                            <tr>
                                                <td class="text-center">N°&nbsp;</td>
                                                <td class="text-left">Objet</td>
                                                <td class="text-left">Date</td>
                                                <td class="text-center">Apercu</td>
                                            </tr>
                                            @foreach ($approvisionnements as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->id }}</td>
                                                <td class="text-left"><strong>{{ $item->objet }}</strong></td>
                                                <td class="text-left"><strong>{{ $item->date }}</strong></td>
                                                <td class="text-center">
                                                    <a href="{{ route('approvisionnement', ['id'=>$item->id]) }}">
                                                        <strong>
                                                            <img height="30" width="30" src="{{ asset('assets/img/apercu.png') }}" alt="">
                                                        </strong>
                                                    </a>
                                                </td>
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
        </div>
        <div class="col-xl-1"></div>
    </div>
</section>
@endsection