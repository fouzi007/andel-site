@extends('admin.layout.app')
@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector:'#article',
            branding:false,
            language:'fr_FR'
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Rédiger un article </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Articles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rédiger</li>
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
                    <form action="{{ route('admin.articles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Actualité">Actualité</option>
                                <option value="Communiqué">Communiqué</option>
                                <option value="Appel">Appel</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article">Article</label>
                            <textarea name="article" id="article"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="is_published">Publié sur le site</label>
                            <input type="checkbox" class="custom-checkbox" name="is_published" id="is_published">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
