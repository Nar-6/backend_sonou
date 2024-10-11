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
        <div class="col-xl-12">
            <nav class="navbar navbar-light navbar-expand-md" style="color: rgb(41,61,210);">
                <div class="container-fluid">
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{ route('paiement.facture') }}" style="color: rgb(26,22,205);">Paiement Facture<br></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('avance.form') }}" style="color: rgb(30,30,211);">Paiement Avance</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('versement.form') }}" style="color: rgb(33,43,222);">Bon de versement</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('approvisionnement.form') }}" style="color: rgb(64,43,206);">Bon d'approvisionnement</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('autre.form') }}" style="color: rgb(30,30,208);">Autre opérations</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h4 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: 'poppins';">
                <strong><span style="text-decoration: underline;">RAPPORT DE CAISSE JOURNALIER</span></strong><br>
            </h4>
        </div>
        <div class="col-12" style="margin-top: 2%;">
            <div></div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-6" style="color: rgb(0,0,0);">
                    <p><strong>SITE DE :</strong><span style="margin-left: 2%;">{{Auth::user()->site}}</span></p>
                </div>
                <div class="col-6 text-right">
                    <p style="color: rgb(0,0,0);"><strong>DATE :</strong><span style="margin-left: 2%;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}
                    </span></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p></p>
                </div>
                <div class="col">
                    <p></p>
                </div>
            </div>
        </div>
        @if ($dernier_rapport == null)
            <form class="col-xl-12" style="display: flex; justify-content: center; align-items: center; flex-direction:column;" action="{{ route('ouvrir.base') }}" method="POST">
                @csrf
                <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                    <label class="text-left" style="font-size: 13px;">Montant de base :</label>
                    <input class="form-control form-control-user" type="number" id="montant_base" placeholder="Entrez le montant de base" name="montant_base" required>
                </div>
                <button id="" class="col-xl-3 btn btn-primary btn-block text-white btn-user " type="submit" style="font-weight: bold; margin-top:20px;">
                    Ouvrir la caisse
                </button>
            </form>
        @elseif ($todayRapport == null)
            <div class="col-xl-12" style="display: flex; justify-content: center; align-items: center;">
                <button id="ouvrirCaisse" class="col-xl-3 btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;">Ouvrir la caisse</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>  
        @else
            <div class="col-xl-12">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive table-bordered border rounded" style="filter: brightness(0%);">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="2" colspan="1">DATE</td>
                                        <td rowspan="2">N° PIECE</td>
                                        <td rowspan="2">LIBELLE</td>
                                        <td class="text-center" colspan="5">APPROVISIONNEMENT CAISSE</td>
                                        <td colspan="1" rowspan="2">RECETTE</td>
                                        <td colspan="1" rowspan="2">DEPENSES</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TRANSFERE MOBILE</td>
                                        
                                        <td colspan="2" style="font-weight: normal;"><strong>VERSEMENT BANCAIRE / CHEQUE</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td>&nbsp;N</td>
                                        <td colspan="1">DATE</td>
                                        
                                        <td colspan="1">N</td>
                                        <td colspan="1">DATE</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td id="rapportVeille" class="text-center" colspan="12">RAPPORT DE LA VEILLE (BILLETTAGE) : {{ $todayRapport->montant_base}}</td>
                                    </tr>
                                    @forelse ($factures_payees as $facture)
                                    <tr>
                                        <td>{{ $facture->date_facture}}</td>
                                        <td>{{ $facture->numero_facture}}</td>
                                        <td>{{ $facture->motif_facture}}</td>
                                        <td colspan="5">{{ $facture->created_at}}</td>
                                        <td>{{ $facture->categorie_id == 1 ? $facture->montant : ''}}</td>
                                        <td>{{ $facture->categorie_id != 1 ? $facture->montant : ''}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">Aucune facture payée trouvée.</td>
                                    </tr>
                                @endforelse
                                
                                @forelse ($versements as $facture)
                                    <tr>
                                        <td>{{ $facture->date_facture}}</td>
                                        <td>{{ $facture->numero_facture}}</td>
                                        <td>{{ $facture->motif_facture}}</td>
                                        <td colspan="5">{{ $facture->created_at}}</td>
                                        <td></td>
                                        <td>{{ $facture->montant }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">Aucun versement trouvé.</td>
                                    </tr>
                                @endforelse
                                
                                @forelse ($approvisionnements as $facture)
                                    <tr>
                                        <td>{{ $facture->date_facture}}</td>
                                        <td>{{ $facture->numero_facture}}</td>
                                        <td>{{ $facture->motif_facture}}</td>
                                        <td colspan="5">{{ $facture->created_at}}</td>
                                        <td>{{ $facture->montant }}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">Aucun approvisionnement trouvé.</td>
                                    </tr>
                                @endforelse
                                
                                @forelse ($autres as $facture)
                                    <tr>
                                        <td>{{ $facture->date_facture}}</td>
                                        <td>{{ $facture->numero_facture}}</td>
                                        <td>{{ $facture->motif_facture}}</td>
                                        <td colspan="5">{{ $facture->created_at}}</td>
                                        <td>{{ $facture->categorie_id == 1 ? $facture->montant : ''}}</td>
                                        <td>{{ $facture->categorie_id != 1 ? $facture->montant : ''}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">Aucune autre opérations trouvée.</td>
                                    </tr>
                                @endforelse
                                
                                    
                                    <tr>
                                        <td  class="text-right" colspan="8">TOTAL</td>
                                        <td id="totalCredit"></td>
                                        <td id="totalDebit"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@if ($todayRapport != null)
    <div class="row" style="margin-top: 2%;">
        <div class="col">
            <div class="row" style="width: 495px;">
                <div class="col" style="color: rgb(0,0,0);">
                    <p class="text-right" style="font-size: 15px;"><strong>A-BILLETAGE</strong></p>
                    <p class="text-right" style="font-size: 15px;"><strong>B-CAISSE ESPECE</strong></p>
                    <p class="text-right" style="font-size: 15px;"><strong>C-DIFFERENCES DE CAISSSE</strong>
                    </p>
                    <p class="text-center" style="font-weight: normal;font-size: 20px;"><strong>ARRETE A LA
                            SOMME DE 250.000 Francs CFA</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group"><a href="{{ route('fiche.billetage') }}" class="btn btn-primary btn-block text-white btn-user"
                            style="font-weight: bold;width: 200px;margin-left: 25%;">Suivant
                            &gt;</a></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="color: rgb(0,0,0);"><strong>Caissière</strong></p>
                    <div>
                        <p class="text-center border-primary"
                            style="background-color: #292929;color: rgb(255,255,255);">{{Auth::user()->name}}</p>
                    </div>
                    <div>
                        <p class="text-center border-primary"
                            style="background-color: #2d2c2c;color: rgb(255,255,255);">VISA</p>
                    </div>
                </div>
                <div class="col text-center">
                    <p style="color: rgb(0,0,0);"><strong>Contrôleur</strong></p>
                    <div>
                        <p style="background-color: #303030;color: rgb(255,255,255);">MAMADOU</p>
                    </div>
                    <div>
                        <p style="background-color: #2c2c2c;color: rgb(255,255,255);">VISA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection


@section('scripts')
<script>
const factures = @json($factures_payees);
const todayRapport = @json($todayRapport);

// Initialisation du total des factures
let facturesTotalCredit = 0;
let facturesTotalDebit = 0;

// Calcul du total des montants des factures
factures.forEach(fact => {
    if (fact.categorie_id == 1) {
        facturesTotalCredit += parseFloat(fact.montant); // Assurez-vous de convertir le montant en nombre
    }else{
        facturesTotalDebit += parseFloat(fact.montant); // Assurez-vous de convertir le montant en nombre
    }
});

if (todayRapport != null) {
    // Afficher le total dans l'élément HTML avec l'ID 'total'
    document.getElementById('totalCredit').innerHTML = facturesTotalCredit.toFixed(2); // Affiche avec deux décimales
    document.getElementById('totalDebit').innerHTML = facturesTotalDebit.toFixed(2); // Affiche avec deux décimales
} else {
    document.getElementById('ouvrirCaisse').addEventListener('click', function() {

        fetch("{{ route('ouvrir.caisse') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Récupérer le token CSRF pour Laravel
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                // Tu peux envoyer des données ici si nécessaire
            })
        })
        .then( location.reload())
        .catch(error => {
            console.error('Erreur:', error);
        });
    });
}
</script>
    
@endsection