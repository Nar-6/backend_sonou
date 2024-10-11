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
            <div id="imprimer" class="card shadow-lg o-hidden border-0 my-5 releve"
                style="background-color: rgba(179,240,241,0.12);">
                <div class="card-body border rounded p-0">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">

                            <div class="p-5" style="height: 500px;background-color: rgba(75,208,208,0);">
                                <h2 class="text-center" style="color: rgb(0,0,0);font-weight: bold;filter: brightness(0%);font-family: 'poppins';"><strong><span style="text-decoration: underline;">Rapport de Retenues AIB</span></strong><br></h2>

                                <hr>
                                <hr>
                                <div class="table-responsive table-bordered border rounded-0" style="filter: brightness(0%) contrast(65%) saturate(0%);color: rgb(255,255,255);">
                                    <table class="table table-bordered">
                                        <tbody style="color: rgb(0,0,0);filter: brightness(124%);">
                                            <tr>
                                                <td class="text-center">N° du Bénéficiaire</td>
                                                <td class="text-center">Nom ou raison social</td>
                                                <td class="text-center">Références</td>
                                                <td class="text-center">Date Facture</td>
                                                <td class="text-center">Nature des retenues</td>
                                                <td class="text-center">Montants imposable</td>
                                                <td class="text-center">Taux AIB</td>
                                                <td class="text-center">Montant AiB</td>
                                            </tr>
                                            @foreach ($factures as $facture)
                                            <tr>
                                                <td class="text-center">{{ $facture->beneficiaire_id }}</td>
                                                <td class="text-center">{{ $facture->beneficiaire->denomination }}</td>
                                                <td class="text-center">{{ $facture->beneficiaire_id }}</td>
                                                <td class="text-center">{{ $facture->date_facture }}</td>
                                                <td class="text-center">{{ $facture->nature_retenue }}</td>
                                                <td class="text-center">{{ $facture->montant_imposable }}</td>
                                                <td class="text-center">{{ $facture->taux_aib }}</td>
                                                <td class="text-center">{{ $facture->montant_aib }}</td>
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
            <form class="user">
                <div class="form-group d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-xl-center">
                    <div class="btn btn-primary btn-block text-white btn-user" onclick="downloadPDF()" style="cursor: pointer; font-weight: bold;background-color: rgb(234,96,38);width: 300px;">Imprimer</div>
                </div>
            </form>
        </div>
        <div class="col-xl-1"></div>
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
            pdf.save('rapport_aib_' + formattedDate + '.pdf');
        });
    }
</script>

@endsection