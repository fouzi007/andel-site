@extends('layouts.app')

@section('page-css')
<style>
    .app-header {
        background-image:url("{{ asset('img/jumbo-background.png')}}");
        background-size: cover;
        
    }
</style>
@endsection

@section('content')

    <div class="jumbotron jumbotron-fluid bg-andel text-white app-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="display-3">
                        {{ $event->nom }}
                    </h4>
                    <p class="lead">
                        <i class="fal fa-calendar-alt"></i> {{ $event->date_start->formatLocalized('%d %B') }} au {{ $event->date_end->formatLocalized("%d %B %Y") }} <i class="fal fa-map-marker"></i>  {{ $event->lieu }}
                    </p>
                    <a href="{{ route('site.events.participer', $event ) }}" class="btn {{ !$event->is_active ? 'disabled' : '' }}  btn-outline-light rounded-0"><i class="fal fa-calendar-plus"></i> PARTICIPER</a>
                </div>
                <div class="col-md-4 d-flex align-items-center">

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-presentation" role="tabpanel" aria-labelledby="v-pills-presentation-tab">
                        @include('events.details')
                    </div>
                    <div class="tab-pane fade" id="v-pills-programme" role="tabpanel" aria-labelledby="v-pills-programme-tab">
                        @include('events.programme')
                    </div>
                    <div class="tab-pane fade" id="v-pills-orateurs" role="tabpanel" aria-labelledby="v-pills-orateurs-tab">
                        @include('events.orateurs')
                    </div>
                    <div class="tab-pane fade" id="v-pills-sponsors" role="tabpanel" aria-labelledby="v-pills-sponsors-tab">
                        @include('events.sponsors')
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <nav class="nav nav-pills flex-column nav-fill" id="v-pills-tab" role="tablist" >
                    <a class="nav-item nav-link active"  data-toggle="pill" href="#v-pills-presentation">
                        <i class="fal fa-3x fa-info-circle"></i><br>
                        Présentation
                    </a>
                    <a class="nav-item nav-link"  data-toggle="pill" href="#v-pills-programme">
                        <i class="fal fa-3x fa-calendar-check"></i><br>
                        Programme
                    </a>
                    <a class="nav-item nav-link"  data-toggle="pill" href="#v-pills-orateurs">
                        <i class="fal fa-3x fa-microphone"></i><br>
                        Orateurs
                    </a>
                    <a class="nav-item nav-link "  data-toggle="pill" href="#v-pills-sponsors">
                        <i class="fal fa-3x fa-star"></i><br>
                        Sponsors
                    </a>
                </nav>
            </div>
        </div>
    </div>
@endsection
