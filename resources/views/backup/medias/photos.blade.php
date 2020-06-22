@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-andel text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="lead">Médiathèque</p>
                    <h4 class="display-3">
                        Photos
                    </h4>

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success rounded-0">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card rounded-0 border-light shadow">
                    <div class="card-body">
                        @foreach(\App\Event::get(['id','nom','slug']) as $e)
                            <ul class="list-unstyled">
                                <li class="media border p-4">
                                    <img src="{{ asset('img/logo.png') }}" style="height:64px;" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <a href="{{ route('site.medias.events.photos',$e->slug) }}" {{ $e->images_count ==0 ? 'disabled' : '' }}><h5 class="mt-0 mb-1">{{ $e->nom }}</h5></a>
                                        Photos d'évènement .
                                        <p class="small text-muted"><i class="fal fa-images"></i> {{ $e->images_count }} ( {{ prononcer($e->images_count) }} ) photos .</p>
                                    </div>
                                </li>

                            </ul>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        //
    </script>
@endsection
