@extends('admin.layout.app')

@section('css')

    <link href="{{ asset('dashboard/assets/vendor/full-calendar/css/fullcalendar.css') }}" rel='stylesheet'/>
    <link href="{{ asset('dashboard/assets/vendor/full-calendar/css/fullcalendar.print.css') }}" rel='stylesheet'
          media='print'/>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Calendrier </h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                    vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Évènements</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4">

                            <select id="events" class="form-control form-control-sm">
                                <option selected disabled>Choisir un évènement</option>
                                @foreach(\App\Event::select(['date_start','nom'])->get() as $event))
                                <option value="{{ $event->date_start->format('Y-m-d') }}">{{ $event->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-sm" id="goToLastEvent">Aller</button>
                        </div>
                    </div>
                    <div id='calendar1'></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var data = {!! $data !!};
        var now = "{{ now()->format('Y-m-d') }}";
    </script>
    <script src='{{ asset('dashboard/assets/vendor/full-calendar/js/moment.min.js') }}'></script>
    <script src='{{ asset('dashboard/assets/vendor/full-calendar/js/fullcalendar.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/fr.js"
            integrity="sha256-/QQeSDufnoPX+a3mgaGjtjhuvejJYhn8jkohw+nN6rM=" crossorigin="anonymous"></script>
    <script src='{{ asset('dashboard/assets/vendor/full-calendar/js/jquery-ui.min.js') }}'></script>
    <script src='{{ asset('dashboard/assets/vendor/full-calendar/js/calendar.js') }}'></script>
@endsection
