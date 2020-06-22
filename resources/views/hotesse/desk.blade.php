<!doctype html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <title>Tableau de bord hôtesse</title>
</head>
<body class="h-100">
<div class="container mt-lg-4" style="height: 95%;"  id="app">
    <div class="card h-100  border-light shadow">
        <div class="card-header bg-light text-dark">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="display-5 mt-2">Desk de gestion : {{ featured_event()->nom }}</h3>
                </div>
                <div class="col-md-2 text-right">
                    <div class="dropdown">
                        <button class="btn rounded-0 btn-block btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-female"></i> {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <hotesse-app :featured="{{ featured_event()->id }}"></hotesse-app>
        </div>
        <div class="card-footer">
           <small><strong>Note : </strong> Les informations relatives aux médecins sont strictement confidentielles et ne doivent êtres divulgués a un tierce <strong>sous aucun prétexte</strong>.</small>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/hotesse.js') }}"></script>
</body>
</html>
