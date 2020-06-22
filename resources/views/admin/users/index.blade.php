@extends('admin.layout.app')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Utilisateurs</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Liste des utilisateurs</h3>
                    <span class="text-muted">Tri antichronologique ( du plus ancien au plus récent )</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Spécialité</th>
                                <th>Est actif</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->name }} <a href="{{ route('admin.users.delete',$user) }}"><i class="fa fa-trash"></i></a></td>
                                    <td>{{ $user->statut }}</td>
                                    <td>{{ $user->specialite }}</td>
                                    <td>
                                        <i class="fa fa-circle {{ $user->is_active ? 'text-success' : 'text-danger' }}"></i>
                                    </td>
                                    <td>
                                        <a href="#" class="badge badge-pill badge-info disabled"><i class="fa fa-cogs"></i> Options</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aucun utilisateur .</td>
                                </tr>
                            @endforelse
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Spécialité</th>
                                <th>Est actif</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
