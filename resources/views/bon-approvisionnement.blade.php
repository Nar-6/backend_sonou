@extends('base')
@php
use Carbon\Carbon;

// Définit la langue sur français
Carbon::setLocale('fr');
@endphp

@section('main-content')

<div class="row">
    <div class="col">
        <div></div>
    </div>
</div>
<section style="margin-top: 1%;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="imprimer" class="card shadow-lg o-hidden border-0 my-5 pay-avance" style="color: rgb(6,6,6);font-size: 18px;">
                <div class="card-body p-0 pay-avance" style="font-family: Amaranth, sans-serif;">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="p-5" style="height: 500px;font-family: Poppins, sans-serif;">
                                <h4 class="text-center" style="color: rgb(0,0,0);font-weight: bold;font-family: Poppins, sans-serif;"><strong><span style="text-decoration: underline;">BON D'APPROVISIONNEMENT DE CAISSE </span></strong><br></h4>

                                <form class="user" style="margin-top: 10%;">
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xl-12 mb-3 mb-sm-0">
                                            <p style="font-size: 18px;">&nbsp;{{ $approvisionnement->id }} / {{ ucfirst(Carbon::parse($approvisionnement->date)->translatedFormat('F')) }} / {{ Carbon::parse($approvisionnement->date)->year }} / LCS / {{ $approvisionnement->caissier->site }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <p><span style="text-decoration: underline;">Date:</span><span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">{{ $approvisionnement->date }}</span></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <p><span style="text-decoration: underline;">MONTANT :</span></p>
                                            <p>En Chiffre :<span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">{{ $approvisionnement->montant }}</span></p>
                                            <p>En Lettre :<span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">{{ ucfirst($montantEnLettres) }} francs CFA</span></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <p><strong>PROVENANCE :</strong><br></p>
                                            <p>Objet :<span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">{{ $approvisionnement->objet }}</span></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <p>
                                                <span style="text-decoration: underline;">Mode d'approvisionnement:</span>
                                                <span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">{{ $approvisionnement->mode_approvisionnement }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-xl-12 mb-3 mb-sm-0">
                                            <p><span style="text-decoration: underline;">Référence:</span><span style="margin-left: 5%;font-weight: normal;font-family: Poppins, sans-serif;">Aucune</span></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0"></div>
                                        <div class="col-sm-6 col-xl-6 mb-3 mb-sm-0">
                                            <p class="text-right">Caissier / (ière) :</p>
                                            <p class="text-right" style="font-weight: normal;">{{ $approvisionnement->caissier->name}}</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="user">
                        <div class="form-group d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-xl-center">
                            <div class="btn btn-primary btn-block text-white btn-user" onclick="downloadPDF()" style="cursor: pointer; font-weight: bold;background-color: rgb(234,96,38);width: 300px;">Imprimer</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    function downloadPDF() {
        const { jsPDF } = window.jspdf;

        // Capture l'élément HTML que tu veux convertir en PDF
        const element = document.querySelector('#imprimer'); // Assure-toi que 'section' est le bon élément

        // Utilise html2canvas pour capturer la section en image
        html2canvas(element).then((canvas) => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'mm', 'a4'); // Format A4 en portrait

            const imgWidth = 210; // Largeur du PDF
            const pageHeight = 297; // Hauteur du PDF
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;
            let position = 0;

            // Ajoute l'image du canvas au PDF
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            // Si l'image dépasse une page, ajoute une nouvelle page
            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            let date = new Date();
            let formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();

            // Télécharge le PDF avec le nom choisi
            pdf.save('bon_approvisionnement_' + formattedDate + '.pdf');
        });
    }
</script>

@endsection