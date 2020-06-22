@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid bg-andel text-white mb-lg-5" style="background-image: url('{{ asset('img/page_headers/bureau.png') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="display-3">
                        Présentation
                    </h4>

                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
    <div class="container  mb-lg-5 mt-lg-5" style="height: 500px;">
        {!! settings('presentation_assoc') !!}
    </div>
@endsection
