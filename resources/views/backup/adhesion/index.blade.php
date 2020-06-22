@extends('layouts.app')

@section('content')
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-header">Ma page</div>

                    <div class="card-body p-0">
                        @include('user-sidebar')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-header">Adhérent</div>

                    <div class="card-body p-0">
                        @if($adhesion->status == false)
                            <div class="m-3 alert alert-info shadow-sm">
                                Votre demande d'adhésion est en cours de traitement, celle-ci sera active une fois les frais honorés.
                            </div>
                        @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Votre statut d'adhésion est :</strong>

                            @if($adhesion->status == false)
                                <span class="badge badge-pill badge-warning"><i class="fal fa-minus"></i> En attente</span>
                            @else
                                <span class="badge badge-pill badge-success"><i class="fal fa-check"></i> Active</span>
                            @endif
                            </li>
                            @if($adhesion->status == true)
                                <li class="list-group-item">
                                    <strong>Date d'adhésion :</strong> {{ $adhesion->date_start->format('d-m-Y') }} ( {{ auth()->user()->active_adhesion->date_start->diffForHumans() }} )
                                </li>
                                <li class="list-group-item">
                                    <strong>Date d'expiration :</strong> {{ $adhesion->date_end->format('d-m-Y') }} ( {{ auth()->user()->active_adhesion->date_end->diffForHumans() }} )
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
