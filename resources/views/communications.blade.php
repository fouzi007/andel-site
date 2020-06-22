@extends('layouts.app')

@section('content')
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0">
                    <div class="card-header">Ma page</div>

                    <div class="card-body p-0">
                        <div class="card-body p-0">
                            @include('user-sidebar')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <div class="card-header">Appel a communication</div>

                    <div class="card-body p-0" >
                        <h3 class="m-3">Mes communications</h3>
                        @if(Session::has('message'))
                            <div class="alert alert-success mx-3">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if(auth()->user()->hasFeaturedCommunication())
                            <ul class="list-group list-group-flush">
                                @foreach(auth()->user()->communications as $communication)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $communication->evenement->nom }}
                                        <a class="badge badge-success badge-pill" href="{{ url('/appels',$communication->file_url) }}">
                                            <i class="fal fa-eye"></i> Voir
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Aucune communication soumise.</li>
                            </ul>
                            <div class="m-3">
                                <h3> Soumettre une communication</h3>
                                {!! settings('communication_instructions') !!}
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Il y a des erreurs dans le formulaire :</strong>
                                        <ul>
                                            @foreach($errors->all() as $message)
                                                <li>{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('site.user.communications.store') }}" class="mt-2" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="file">Votre fichier</label>
                                        <input type="file" name="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" accept="application/pdf">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-andel"><i class="fal fa-paper-plane"></i> Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
