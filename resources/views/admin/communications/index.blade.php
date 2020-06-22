@extends('admin.layout.app')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Communications</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Communications</li>
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
                    <h3>Liste des Communications</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Utilisateur</th>
                                <th>Évènement concerné</th>
                                <th>Envoyé le</th>
                                <th>Est valide</th>
                                <th>Voir le fichier</th>
                            </tr>
                            </thead>
                            @forelse($communications as $communication)
                                <tr>
                                    <td>{{ $communication->id }} </td>
                                    <td>{{ $communication->user->name }} </td>
                                    <td>{{ $communication->evenement->nom }}</td>
                                    <td>
                                        {{ $communication->created_at->format('d-m-Y') }} ( {{ $communication->created_at->diffForHumans() }} )
                                    </td>
                                    <td>
                                        <i class="fas fa-circle {{ $communication->is_active ? 'text-success' : 'text-danger' }}"></i>
                                    </td>
                                    <td>
                                        <a href="#" class="badge badge-pill badge-primary" onclick="showModal({{ $communication->id }},'{{ url('appels',$communication->file_url) }}')">Voir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aucune communication .</td>
                                </tr>
                            @endforelse
                        </table>

                        {{ $communications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Affichage PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="" frameborder="0" style="width:100%;height: 800px" id="pdf-view"></iframe>
                    <form action="{{ route('admin.communications.valider') }}" method="post" id="valider-communication">
                        @csrf
                        <input type="hidden" id="id" name="id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                    <button type="button" class="btn btn-primary" id="valider"><i class="fas fa-check"></i> Valider </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showModal(id,url) {
            $('#id').val(id);
            $('#pdf-view').attr('src', url);
            $('#pdfModal').modal('show');
        }

        $('#valider').click(function(){
            $('#valider-communication').submit();
        });
    </script>
@endsection
