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
                    <div class="card-body">
                        <h4>Mes inscriptions aux évènements</h4>
                        <p class="text-muted">Statut de vos inscriptions aux manifestations scientifiques.</p>
                        <table class="table table-sm table-borderless table-hover">
                            <thead>
                            <tr>
                                <th>Nom </th>
                                <th>Dates</th>
                                <th>Lieu</th>
                                <th>Statut</th>
                            </tr>
                            </thead>
                            @forelse(auth()->user()->events as $e)
                                <tr>
                                    <td>{{ $e->nom }}</td>
                                    <td>{{ $e->date_start->format('d-m-Y') }} au {{ $e->date_end->format('d-m-Y') }}</td>
                                    <td>{{ $e->lieu }}</td>
                                    <td>
                                       @if($e->pivot->is_active)
                                        <i class="fal fa-check-double"></i> Validée
                                       @else
                                        <i class="fal fa-times"></i> En attente
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </table>
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
