@extends('layouts.app')

@section('page-css')
    <style>
        .header {
            background-image: url("{{ asset('img/header.jpg') }}");
        }
    </style>
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid text-light" style="background-image:url('{{ asset('img/header.jpg') }}');">
    <div class="container">
        <h4 class="display-3">
            {{ featured_event()->nom }}
        </h4>
        <p class="lead">
            <i class="fal fa-map-marker"></i> {{ featured_event()->lieu }} <i class="fal fa-calendar-alt"></i> du {{ featured_event()->date_start->formatLocalized('%d %B') }} au {{ featured_event()->date_end->formatLocalized("%d %B %Y") }} .
        </p>
        <a href="{{ route('site.events.participer',featured_event()) }}" class="btn-block btn btn-outline-light rounded-0"><i class="fal fa-calendar-plus"></i> PARTICIPER</a> <a href="{{ route('site.events.show',featured_event()) }}" class="btn btn-block btn-outline-light rounded-0"><i class="fal fa-info-circle"></i> Plus d'information</a>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-0 border-light shadow">
                <div class="card-header">
                    Actualité
                </div>
                <div class="card-body">
                    <ul class="fa-ul ml-4">
                        @foreach($articles as $article)
                            <li>
                                <span class="fa-li"><i class="fal fa-newspaper"></i></span>
                                <a href="{{ route('site.articles.show',$article) }}" class="text-andel">{{ $article->titre }}</a> dans <a href="#" class="text-andel">{{ $article->type }}</a> publié le <i class="text-muted">{{$article->created_at->format('d-m-Y à H:i')}}</i>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card rounded-0 border-light shadow mt-4">
                <div class="card-header">
                    Évènements
                </div>
                <div class="card-body">
                    <ul class="fa-ul ml-4">
                        @foreach(\App\Event::take(3)->get() as $event)
                            <li>
                                <span class="fa-li"><i class="fal fa-calendar-alt"></i></span>
                                <a href="{{ route('site.events.show',$event) }}" class="text-andel">{{ $event->nom }}</a> <span class="badge {{ $event->date_start->isBefore(now()) ? 'badge-info' : 'badge-success' }}">{{ $event->date_start->isBefore(now()) ? 'Terminé' : 'À venir' }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card rounded-0 border-light shadow">
                <div class="card-header">
                    À la une
                </div>
                <div class="card-header text-white text-center bg-andel p-0" style="height:180px;background-image: url('{{ asset(\App\Article::find(1)->image) }}');">
                </div>
                <div class="card-body">
                    <a href="{{ route('site.articles.show',\App\Article::find(1)) }}"><h5>{{ \App\Article::find(1)->titre }}</h5></a>
                    <p class="text-muted"><i class="fal fa-calendar-alt"></i> {{ \App\Article::find(1)->created_at->format('d-m-Y à H:i') }}</p>
                </div>
            </div>
        </div>
</div>
</div>
@endsection

@section('scripts')
{{--    <script>--}}
{{--        function expandEvent(){--}}
{{--            $('nav').removeClass('sticky-top');--}}
{{--            console.log($(this));--}}
{{--            $('#expand-event').hide();--}}
{{--            $('#close-expand').show(1000);--}}
{{--            $("html, body").animate({scrollTop : 91.21875}, 1000);--}}
{{--            $('#plusInfos').collapse('show');--}}
{{--        }--}}
{{--    </script>--}}
@endsection
