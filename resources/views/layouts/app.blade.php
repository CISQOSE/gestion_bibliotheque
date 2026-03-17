<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Bibliothèque')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .table th { background-color: #343a40; color: white; }
        .btn-action { margin: 0 2px; }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('livres.index') }}">
                Bibliothèque
            </a>

            <div class="navbar-nav me-auto">
                @auth
                    <a class="nav-link" href="{{ route('auteurs.index') }}">Auteurs</a>
                    <a class="nav-link" href="{{ route('livres.index') }}">Livres</a>
                    <a class="nav-link" href="{{ route('etudiants.index') }}">Étudiants</a>
                    <a class="nav-link" href="{{ route('emprunts.index') }}">Emprunts</a>
                @endauth
            </div>

            <div class="navbar-nav ms-auto">
                @auth
                    <span class="navbar-text text-white me-3">
                        Bonjour, {{ Auth::user()->name }}
                    </span>
                    <a class="nav-link btn btn-outline-light btn-sm px-3"
                    href="{{ route('logout') }}">
                        Déconnexion
                    </a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- CONTENU PRINCIPAL --}}
    <div class="container">

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Ici s'injecte le contenu de chaque vue enfant --}}
        @yield('contenu')

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>