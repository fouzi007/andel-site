@extends('admin.layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/charts/morris-bundle/morris.css') }}">
@endsection

@section('content')
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2">Tableau de bord administrateur </h3>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tableau de bord administrateur</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- content  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- influencer profile  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card influencer-profile-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="text-center">
                                            <img src="{{ asset('https://via.placeholder.com/128x128') }}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="user-avatar-info">
                                            <div class="m-b-20">
                                                <div class="user-avatar-name">
                                                    <h2 class="mb-1">{{ Auth::user()->name }}</h2>
                                                </div>
                                                <div class="rating-star  d-inline-block">
                                                    <p class="d-inline-block text-dark"> {{ Auth::user()->role->description }} </p>
                                                </div>
                                            </div>
                                            <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Utilisateurs</h5>
                                    <h2 class="mb-0"> {{ \App\User::count() }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-users fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Evenements</h5>
                                    <h2 class="mb-0"> {{ \App\Event::count() }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-calendar-alt fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Articles publiés</h5>
                                    <h2 class="mb-0"> {{ \App\Article::count() }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                    <i class="fa fa-newspaper fa-fw fa-sm text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="d-inline-block">--}}
{{--                                    <h5 class="text-muted">Total Earned</h5>--}}
{{--                                    <h2 class="mb-0"> $149.00</h2>--}}
{{--                                </div>--}}
{{--                                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">--}}
{{--                                    <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-block">
                            <h3 class="section-title">Evènements</h3>
                            <p class="text-muted">Les <strong>5</strong> derniers <a href="#">( voir tout )</a> .</p>
                        </div>
                        <div class="card">
                            <div class="campaign-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="border-0">
                                        <th class="border-0">Nom</th>
                                        <th class="border-0">Est actif</th>
                                        <th class="border-0">Lieu</th>
                                        <th class="border-0">Début</th>
                                        <th class="border-0">Fin</th>
                                        <th class="border-0">Détails</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(\App\Event::take(5)->get() as $event)
                                        <tr>
                                            <td>
                                                {{ $event->nom }}
                                            </td>
                                            <td>
                                                <i class="fa {{ $event->is_active ? 'fa-check text-success' : 'fa-times text-danger' }}"></i>
                                            </td>
                                            <td>
                                                {{ $event->lieu }}
                                            </td>
                                            <td>
                                                {{ $event->date_start->format('d-m-Y à H:i') }}
                                            </td>
                                            <td>
                                                {{ $event->date_end->format('d-m-Y à H:i') }}
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert alert-info mt-2">
                            Les graphiques ci-bas ne sont pas contractuels .
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign activities   -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Utilisateurs par statut</h5>
                            <div class="card-body">
                                <div id="gender_donut" style="height: 230px;"></div>
                            </div>
                            <div class="card-footer p-0 bg-white d-flex">
                                <div class="card-footer-item card-footer-item-bordered w-50">
                                    <h2 class="mb-0"> 60% </h2>
                                    <p>Public </p>
                                </div>
                                <div class="card-footer-item card-footer-item-bordered">
                                    <h2 class="mb-0">40% </h2>
                                    <p>Privé </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Utilisateurs par spécialité</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">15 - 20</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">20 - 25</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 55%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">25 - 30</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">30 - 35</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 35%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">35 - 40</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 21%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">45 - 50</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 85%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-inline-block">
                                        <h4 class="mb-0">50 - 55</h4>
                                    </div>
                                    <div class="progress mt-2 float-right progress-md">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Utilisateurs par wilaya</h5>
                            <div class="card-body">
                                <canvas id="chartjs_bar_horizontal"></canvas>
                            </div>
                        </div>
                    </div>
                </div>



@endsection

@section('scripts')
    <!-- morris-chart js -->
    <script src="{{ asset('dashboard/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/charts/morris-bundle/morrisjs.html') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('dashboard/assets/vendor/charts/charts-bundle/Chart.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/charts/charts-bundle/chartjs.js') }}"></script>
    <!-- dashboard js -->
    <script src="{{ asset('dashboard/assets/libs/js/dashboard-influencer.js') }}"></script>
@endsection
