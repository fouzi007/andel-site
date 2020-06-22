@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-andel text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="lead">Médiathèque</p>
                    <h4 class="display-3">
                        Vidéos
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

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
