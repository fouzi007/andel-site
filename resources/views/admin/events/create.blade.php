@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Créer évènement</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Évènements</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Créer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Nouvel évènement </h5>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Il y a des erreurs dans le formulaire : </strong>
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.events.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom de l'évènement</label>
                            <input type="text" name="nom" id="nom" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" value="{{ old('nom') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description de l'évènement</label>
                            <textarea class="form-control" id="description" name="description" >{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="lieu">Lieu</label>
                            <input type="text" class="form-control {{ $errors->has('lieu') ? 'is-invalid' : '' }}" name="lieu" id="lieu"value="{{ old('lieu') }}">
                        </div>
                        <div class="form-group">
                            <label for="coordonnes">Coordonnées GPS </label>
                            <div class="">

                                <small class="text-muted">facultatif.</small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control {{ $errors->has('coordonnes') ? 'is-invalid' : '' }}" name="latitude" placeholder="Latitude">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control {{ $errors->has('coordonnes') ? 'is-invalid' : '' }}" name="longitude" placeholder="Longitude">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data_start">Date et heure de début</label>
                            <input type="datetime-local" class="form-control {{ $errors->has('date_start') ? 'is-invalid' : '' }}" id="date_start" name="date_start"  value="{{ old('date_end') }}">
                        </div>
                        <div class="form-group">
                            <label for="date_end">Date et heure de fin</label>
                            <input type="datetime-local" class="form-control {{ $errors->has('date_end') ? 'is-invalid' : '' }}" id="date_end" name="date_end" value="{{ old('date_end') }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-dark"><i class="fa fa-save"></i> Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.is-invalid').click(function(){
            $(this).removeClass('is-invalid');
        })
    </script>
@endsection
