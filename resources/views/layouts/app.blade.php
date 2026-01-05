<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de Scolarité</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; }
        .navbar { margin-bottom: 30px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Scolarité App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-nav-item">
                        <a class="nav-link {{ request()->is('etudiants*') ? 'active' : '' }}" href="{{ route('etudiants.index') }}">Étudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('modules*') ? 'active' : '' }}" href="{{ route('modules.index') }}">Modules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('notes*') ? 'active' : '' }}" href="{{ route('notes.index') }}">Notes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        {{-- Cette directive permet d'injecter le contenu des autres pages --}}
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>