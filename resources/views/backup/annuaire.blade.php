@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-andel text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="display-3">
                        Annuaire
                    </h4>

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card border-light shadow-sm rounded-0">
            <div class="card-body">
               <table class="table table-sm table-borderless">
                   <thead>
                   <tr>
                       <th>Nom</th>
                       <th>Spécialité</th>
                       <th>Télephone</th>
                       <th>Wilaya</th>
                   </tr>
                   </thead>
                   <tbody>
                   @forelse(\App\User::notAdmins()->orderBy('nom','asc')->get() as $medecin)
                       <tr>
                           <td>{{ $medecin->name }}</td>
                           <td>{{ $medecin->specialite }}</td>
                           <td>{{ $medecin->telephone }}</td>
                           <td>{{ $medecin->wilaya->nom }}</td>
                       </tr>
                   @empty
                       <tr>
                           <td colspan="4">Aucun médecin dans l'annuaire .</td>
                       </tr>
                   @endforelse
                   </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
