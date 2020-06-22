@extends('admin.layout.app')


@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Évènements</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Évènements</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Liste des évènements</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-plus"></i> Créer</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($events as $event)
                            @include('admin.layout.event-card',$event)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p>Un évènement terminé ne peut être mis à la une, <a href="#">créez-en un</a> .</p>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function makeFeatured() {
            $('#exampleModal').modal('show');
        }
    </script>
@endsection
