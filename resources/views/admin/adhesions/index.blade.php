@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Adhésions</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Adhésions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Liste des adhésions</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Adhérent</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Statut</th>
                                <th>Date de soumission</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @forelse($adhesions as $adhesion)
                                <tr>
                                    <td>{{ $adhesion->user->name }}</td>
                                    <td>{{ $adhesion->date_start->format('d-m-Y') }}</td>
                                    <td>{{ $adhesion->date_end->format('d-m-Y') }}</td>
                                    <td>
                                        <i class="fa {{ $adhesion->status == true ? 'text-success fa-check' : 'text-danger fa-times' }}"></i>
                                    </td>
                                    <td>{{ $adhesion->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="#" class="badge badge-success badge-pill"><i class="fa fa-check"></i>
                                            Payée</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6">
                                        Aucune adhésion active , et aucune demande d'adhésion .
                                    </th>
                                </tr>
                            @endforelse
                            <tfoot>
                            <tr>
                                <th>Adhérent</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Statut</th>
                                <th>Date de soumission</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>

                        {{ $adhesions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
