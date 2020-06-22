@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid bg-andel text-white p-4" style="background-image: url('{{ asset('img/page_headers/bureau.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="lead">
                        Actualité <i class="fal fa-chevron-double-right"></i> {{ $article->created_at->format('m-Y') }}
                    </p>
                    <h4 class="display-3">
                        Article
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card rounded-0 border-light shadow-sm" style="height:500px">
            <div class="card-body">
                <h4>{{ $article->titre }}</h4>
                <p class="text-muted">Publié le <i class="text-muted">{{$article->created_at->format('d-m-Y à H:i')}}</i></p>
                 {!! $article->article !!}
            </div>
        </div>
    </div>
@endsection
