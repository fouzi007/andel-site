<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Tableau de bord</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ tabMenuActive('admin') }}" href="{{ route('admin.index') }}"><i class="fa fa-fw fa-tachometer-alt"></i>Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ tabMenuActive('articles') }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-calendar-alt"></i>Évènements</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ tabMenuActive('admin/events') }}" href="{{ route('admin.events.index') }}">Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.events.create') }}">Créer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.events.calendar') }}">Calendrier</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Contenu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ tabMenuActive('articles') }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-newspaper"></i>Articles</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.articles.liste') }}"> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.articles.create') }}">Rédiger</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Gestion
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ tabMenuActive('admin/users') }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-users"></i>Utilisateurs</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users.liste') }}"> Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users.create') }}">Créer</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ tabMenuActive('admin/adhesions') }}" href="{{ route('admin.adhesions.liste') }}"><i class="fa fa-fw fa-hand-holding-usd"></i>Adhésions</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ tabMenuActive('admin/communications') }}" href="{{ route('admin.communications.liste') }}"><i class="fa fa-fw fa-file-pdf"></i>Communications</a>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
