<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SONOU - DASHBOARD</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-lcs.webp') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,500i,600,600i,700,700i,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="{{ asset('assets/css/OcOrato---Login-form-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/OcOrato---Login-form.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/untitled-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/untitled.css') }}">
    <style>
        .table-bordered td {
    vertical-align: middle; /* Aligne le contenu verticalement au centre */
}

.form-control {
    width: 100%; /* Prend toute la largeur de la cellule */
    height: 38px; /* Ajuste la hauteur selon vos besoins */
    padding: 5px; /* Ajuste le remplissage intérieur */
}
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('dashboard') }}">
                    <div class="sidebar-brand-icon mt-5">
                        <img src="{{ asset('assets/img/logo-lcs.webp') }}" class="mt-2" alt="" height="80">
                    </div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light mt-5" id="accordionSidebar">
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#" style="max-height: 50px;">
                            <i class="fas fa-file" style="font-size: 20px;"></i>
                            <span style="font-family: Nunito, sans-serif;font-size: 20px;">FICHIERS</span>
                        </a>
                    </!--li-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('dashboard') }}" style="max-height: 40px;"><span>Gestion Administration</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('beneficiaires') }}" style="max-height: 40px;"><span>Listes des Bénéficiaire</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('beneficiaire.form') }}" style="max-height: 40px;"><span>Enregistrer un béneficiaire</span></a>
                    </li>
                    <!--li-- class="nav-item" role="presentation">
                        <a class="nav-link active" href="choix-compte-beneficiaire.html" style="max-height: 40px;"><span>Choisir un compte béneficiare</span></a>
                    </!--li-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('facture.form') }}" style="max-height: 40px;"><span>Enregistrer une facture</span></a>
                    </li>
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#" style="max-height: 50px;">
                            <i class="far fa-keyboard" style="font-size: 20px;"></i>
                            <span style="font-size: 20px;">SAISIE</span>
                        </a>
                    </-li-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('rapport.journalier') }}" style="max-height: 40px;"><span>Rapport de caisse journalier</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('correction.form') }}" style="max-height: 40px;" ><span>Correction</span></a>
                    </li>
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#" style="max-height: 50px;">
                            <i class="far fa-edit" style="font-size: 20px;"></i>
                            <span style="font-size: 20px;">EDITIONS</span>
                        </a>
                    </!--li-->
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="rapport-caisse-journalier-et-billettage.html" style="max-height: 70px;"><span>Rapport de caisse journalier + Billettage</span></a>
                    </!--li-->
                    <!--li-- class="nav-item" role="presentation">
                        <a class="nav-link active" href="releve-compte-beneficiaire.html" style="max-height: 40px;"><span>Relevé de compte Bénéficiaire</span></a>
                    </!--li-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="rapport-caisse-periode.html" style="max-height: 40px;"><span>Rapport de caisse période</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('rapport.aib') }}" style="max-height: 40px;"><span>Rapport de retenue AIB</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('bons') }}" style="max-height: 40px;"><span>Bon de caisse</span></a>
                    </li>
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="bon-versement-fond.html" style="max-height: 40px;"><span>Bon de versement de fonds</span></a>
                    </!--li-->
                    <!--li class="nav-item" role="presentation">
                        <a class="nav-link active" href="bon-approvisionnement-caisse.html" style="max-height: 40px;"><span>Bon d'approvisionnement</span></a>
                    </!--li-->
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="fiche-annulation.html" style="max-height: 40px;"><span>Fiche d'annulation</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('regularisation.form') }}" style="max-height: 40px;"><span style="">Régularisation</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a class="nav-link" href="#">
                            <span class="d-none d-lg-inline mr-2 text-gray-600 small" style="font-weight: bold; font-size: 20px;">
                                Bienvenue, {{ Auth::user()->name }}
                            </span>
                        </a>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Rechercher ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Rechercher ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </a>
                            </li>
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="badge badge-danger badge-counter">3+</span>
                                    <i class="fas fa-bell fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                    <h6 class="dropdown-header">alerts center</h6>
                                    <a class="d-flex align-items-center dropdown-item" href="#">
                                        <div class="mr-3">
                                            <div class="bg-primary icon-circle">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="small text-gray-500">December 12, 2019</span>
                                            <p>A new monthly report is ready to download!</p>
                                        </div>
                                    </a>
                                    <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="connexion.html">
                                    <i class="fas fa-sign-out-alt fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    @yield('main-content')
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>Copyright © Les Cours SONOU 2024</span>
                    </div>
                </div>
            </footer>
        </div> 
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#content-wrapper"><i class="fas fa-angle-up"></i></a>
    @yield('scripts')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-charts.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</body>

</html>
