@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-andel text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <p class="lead">Médiathèque - Photos</p>
                    <h4 class="display-3">
                        Photos {{ $event->nom }}
                    </h4>

                </div>
                <div class="col-md-2">

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
                            @foreach($event->medias as $photo)
{{--                                    <img src="{{ asset('img/uploads/events/'. $photo->url .'.jpg') }}" alt="" class="img-thumbnail rounded">--}}
                                    <a style="width: 10%;" data-fancybox="gallery"  href="{{ asset('img/uploads/events/'. $photo->url .'.jpg') }}" data-caption="Image du {{ $event->nom }}">
                                            <img style="width:148px" src="{{ asset('img/uploads/events/'. $photo->url .'.jpg') }}">
                                    </a>
                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <script>

    </script>

@endsection
