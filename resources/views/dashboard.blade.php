@extends('base')
@section('main-content')

        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard</h3>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-6 mb-4">
                <div class="row">
                    <div class="col">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1" style="font-family: Amaranth, sans-serif;">
                                            <span><strong>Montant&nbsp;total encaissé</strong></span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>40,000 FCFA</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                            <span style="font-family: Amaranth, sans-serif;"><strong>Montant total décaissé</strong></span>
                                        </div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>215,000 FCFA</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-6 mb-4">
                <img class="img-fluid" src="assets/img/icone-horloge-calendrier-violet-3d-concept-notification-rappel-site-web-ui-fond-violet-illustration-rendu-3d.jpg" width="500">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-7">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-primary font-weight-bold m-0" style="font-family: Amaranth, sans-serif;">
                            <strong>Entrées - Sorties</strong>&nbsp;
                        </h2>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"></button>
                            <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                                <p class="text-center dropdown-header">dropdown header:</p>
                                <a class="dropdown-item" role="presentation" href="#">&nbsp;Action</a>
                                <a class="dropdown-item" role="presentation" href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" role="presentation" href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas data-bs-chart='{"type":"line","data":{"labels":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug"],"datasets":[{"label":"Earnings","fill":true,"data":["0","10000","5000","15000","10000","20000","15000","25000"],"backgroundColor":"rgba(78, 115, 223, 0.05)","borderColor":"rgba(78, 115, 223, 1)"}]},"options":{"maintainAspectRatio":false,"legend":{"display":false},"title":{},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","padding":20}}]}}}'></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-5">
                <div class="card shadow mb-4">
                    <div class="card-body border rounded">
                        <div class="row">
                            <div class="col-xl-3"><i class="fas fa-coins fa-4x"></i></div>
                            <div class="col-xl-9">
                                <h5 class="font-weight-bold mb-2">Entrées</h5>
                                <h6 class="font-weight-bold mb-2">Montant total</h6>
                                <h5 class="font-weight-bold mb-2" style="color: green;">1,340,000 FCFA</h5>
                                <h6 class="font-weight-bold mb-2">Montant moyen</h6>
                                <h5 class="font-weight-bold mb-2" style="color: green;">100,000 FCFA</h5>
                                <h6 class="font-weight-bold mb-2">Total de transactions</h6>
                                <h5 class="font-weight-bold mb-2" style="color: green;">15</h5>
                                <h6 class="font-weight-bold mb-2">Moyenne</h6>
                                <h5 class="font-weight-bold mb-2" style="color: green;">10,000 FCFA</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body border rounded">
                        <div class="row">
                            <div class="col-xl-3"><i class="fas fa-dollar-sign fa-4x"></i></div>
                            <div class="col-xl-9">
                                <h5 class="font-weight-bold mb-2">Sorties</h5>
                                <h6 class="font-weight-bold mb-2">Montant total</h6>
                                <h5 class="font-weight-bold mb-2" style="color: red;">300,000 FCFA</h5>
                                <h6 class="font-weight-bold mb-2">Montant moyen</h6>
                                <h5 class="font-weight-bold mb-2" style="color: red;">20,000 FCFA</h5>
                                <h6 class="font-weight-bold mb-2">Total de transactions</h6>
                                <h5 class="font-weight-bold mb-2" style="color: red;">15</h5>
                                <h6 class="font-weight-bold mb-2">Moyenne</h6>
                                <h5 class="font-weight-bold mb-2" style="color: red;">10,000 FCFA</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection