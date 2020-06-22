@extends('layouts.app')

@section('content')


    <div class="jumbotron jumbotron-fluid bg-andel text-white"   style="background-image: url('{{ asset('img/page_headers/medias.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="display-3">
                        Médiathèque
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
                <div class="card rounded-0 border-light shadow" style="height:500px">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body align-items-center">
                                        <i class="far fa-image fa-3x text-andel" ></i>
                                        <div class="float-right align-middle">
                                            <a href="{{ route('site.medias.photos') }}" class=""><h3>Photos</h3></a>
                                            <p>Images d'archive de précédents évènements .</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body align-items-center">
                                            <i class="far fa-video fa-3x text-andel" ></i>
                                            <div class="float-right align-middle">
                                                <a href="{{ route('site.medias.videos') }}" class=""><h3>Vidéos</h3></a>
                                                <p>Images d'archive de précédents évènements .</p>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection
