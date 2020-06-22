@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Articles</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Liste des articles</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Auteur</th>
                                <th>Statut</th>
                                <th>Modifier</th>
                            </tr>
                            </thead>
                            @forelse($articles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ route('site.articles.show',$article) }}" target="_blank">{{ $article->titre }}</a>
                                    </td>
                                    <td>{{ $article->type}}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <i class="fa {{ $article->is_published == true ? 'text-success fa-check' : 'text-danger fa-times' }}"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.articles.edit',['id' => $article->id]) }}" class="badge badge-dark badge-pill"><i class="fa fa-pen-square"></i>
                                            Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5">
                                        Aucun article , <a href="#"> rédiger .</a>.
                                    </th>
                                </tr>
                            @endforelse
                            <tfoot>
                            <tr>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Auteur</th>
                                <th>Statut</th>
                                <th>Modifier</th>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="mt-4">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
