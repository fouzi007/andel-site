@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Évènement : {{ $event->nom }} </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Évènements</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $event->nom }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="tab-regular">
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info"></i> Informations générales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-calendar-check"></i> Inscriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-cogs"></i> Configurer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p class="lead"><i class="fa fa-list-alt"></i> Données  </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-map-marker-alt"></i> <strong>Lieu : </strong> {{ $event->lieu }}
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar-plus"></i> <strong>Début : </strong> {{ $event->date_start->format('d-m-Y à H:i') }} <i>( {{ $event->date_start->diffForHumans() }} ) </i>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar-times"></i> <strong>Fin : </strong> {{ $event->date_end->format('d-m-Y à H:i') }} <i>( {{ $event->date_start->diffForHumans() }} ) </i>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-paragraph"></i> <strong>Description : </strong> <a href="#" class="badge badge-dark"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Voir / Masquer</a>
                                <div id="collapseExample" class="card mt-2 rounded-0 collapse">
                                    <div class="card-body">
                                        {!!  $event->description  !!}
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="lead"><i class="fa fa-chart-line"></i> Statistiques</p>
                        <a href="{{ route('site.events.show',$event) }}" target="_blank" class="btn btn-secondary">Voir sur le site</a>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3>Liste des inscrits</h3>
                        <p>Ci-dessous la liste des inscrits en temps réel ( {{ now()->formatLocalized('%d %B %Y') }} ) , Ainsi que la possibilité de valider ou annuler celle-ci .</p>
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Spécialité</th>
                                <th>Inscription</th>
                                <th>Valider inscription</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($event->participants as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->statut }}</td>
                                    <td>{{ $p->specialite }}</td>
                                    <td>
                                        @if($p->pivot->is_active)
                                            <span class="badge badge-success"><i class="fa fa-check"></i> Active</span>
                                        @else
                                            <span class="badge badge-warning"><i class="fa fa-times"></i> En attente</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->pivot->is_active)
                                            <a href="#" onclick="affectSubscription({{$p->id}},0)"><i class="fa fa-times-circle"></i> Annuler</a>
                                        @else
                                            <a href="#" onclick="affectSubscription({{$p->id}},1)"><i class="fa fa-chevron-right"></i> Valider</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h3>Paramètres </h3>
                        <div class="alert alert-info">
                            Cette section est en cours de développement .
                        </div>
                        <form action="">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" {{ featured_event()->id == $event->id ? 'checked' : '' }} class="custom-control-input"><span class="custom-control-label">Évènement à la une</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input disabled"><span class="custom-control-label">Places limités</span>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function affectSubscription(id,update){
            $.ajax({
                url:'{{ url('api/affect-subscription') }}',
                method:'post',
                data:{
                    user_id:id,
                    event_id:'{{ $event->id }}',
                    update:update
                },
                success:function(data){
                    location.reload()
                    // console.log(data)
                }
            })
        }
    </script>
@endsection

