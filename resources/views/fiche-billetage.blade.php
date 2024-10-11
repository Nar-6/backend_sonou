@extends('base')

@section('main-content')
<div class="row">
    <div class="col">
        <div></div>
    </div>
</div>
<section style="margin-top: 1%; margin-bottom:1%;">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: 'poppins';"><strong><span style="text-decoration: underline;">FICHE DE BILLETAGE</span></strong><br></h4>
        </div>
        <div class="col-12" style="margin-top: 2%;">
            <div></div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <p class="text-right" style="color: rgb(90,101,183);"><strong>A-Solde physique (Espèces)</strong></p>
                </div>
                <div class="col">
                    <div class="form-group"><input type="text" class="form-control form-control-user"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-right" style="color: rgb(88,102,183);"><strong>B-Solde théorique (Selon brouillard)</strong></p>
                </div>
                <div class="col"><input type="text" class="form-control form-control-user"></div>
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

        <div class="col-xl-12">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col">BILLETS & PIECES BILLETS</div>
                            <div class="col">NOMBRE</div>
                            <div class="col">MONTANT</div>
                        </div>

                        <hr>
                        
                        <div class="row text-center">
                            <div class="col" colspan="3">BILLETS</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Billet de 10.000 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="10.000" data-montant="10000" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-10.000">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Billet de 5.000 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="5.000" data-montant="5000" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-5.000">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Billet de 2.000 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="2.000" data-montant="2000" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-2.000">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Billet de 1.000 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="1.000" data-montant="1000" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-1.000">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Billet de 500 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="500" data-montant="500" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-500">0 FCFA</div>
                        </div>

                        <hr>
                        
                        <div class="row text-center">
                            <div class="col" colspan="3">PIECES</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Pièce de 500 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="piece500" data-montant="500" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-piece500">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Pièce de 200 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="piece200" data-montant="200" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-piece200">0 FCFA</div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col">Pièce de 100 FCFA</div>
                            <div class="col" style="width: 30%;">
                                <input type="number" class="form-control" id="piece100" data-montant="100" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col" id="montant-piece100">0 FCFA</div>
                        </div>

                        <hr>
                        
                        <div class="row text-center">
                            <div class="col" id="total" colspan="2">TOTAL NUMÉRAIRE</div>
                            <div class="col" id="montant-total">0 FCFA</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row" style="margin-top: 4%;">
                <div class="col">
                    <p class="text-center" style="color: rgb(90,101,183);"><strong>C-Ecart (A - B)</strong><br></p>
                </div>
                <div class="col">
                    <div class="form-group"><input class="form-control-sm form-control form-control-user" type="text"></div>
                </div>
            </div>
            <div class="row" style="margin-top: 4%;">
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;width: 200PX;background-color: rgb(124,78,223);">Aperçu RC + Billatage</button></div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="font-weight: bold;width: 200PX;background-color: rgb(232,70,18);">Cloturer la caisse</button></div>
            </div>
        </div>
    </div>
</section>

<style>
    .container .row {
    display: flex;
    justify-content: center; /* Centrer horizontalement */
    padding: 10px 0; /* Espacement vertical */
}

.col {
    flex: 1; /* Prendre une part égale de l'espace disponible */
    text-align: center; /* Centrer le texte dans les colonnes */
}

</style>
@endsection

@section('scripts')
    <script>
       document.addEventListener('DOMContentLoaded', function () {
            // Sélectionnez tous les champs de saisie pour les billets et pièces
            const inputs = document.querySelectorAll('input[type="number"]');

            // Ajoutez un écouteur d'événements pour chaque champ
            inputs.forEach(input => {
                input.addEventListener('input', function () {
                    // Récupérez la valeur du nombre de billets/pièces
                    const nombreBillets = parseInt(input.value) || 0; // Valeur saisie, ou 0 si vide
                    const montantUnitaire = parseInt(input.dataset.montant) || 0; // Montant unitaire

                    // Calculez le montant total pour ce type
                    const montantTotal = nombreBillets * montantUnitaire;

                    // Mettez à jour l'affichage du montant total pour ce type
                    const montantDisplayId = 'montant-' + input.id;
                    document.getElementById(montantDisplayId).textContent = montantTotal + ' FCFA';

                    // Calculez le montant total global
                    let montantGlobal = 0;
                    inputs.forEach(input => {
                        const montantUnitaire = parseInt(input.dataset.montant) || 0;
                        const nombreBillets = parseInt(input.value) || 0;
                        montantGlobal += nombreBillets * montantUnitaire;
                    });

                    // Mettez à jour l'affichage du montant total global
                    document.getElementById('montant-total').textContent = montantGlobal + ' FCFA';
                });
            });
        });


    </script>
@endsection