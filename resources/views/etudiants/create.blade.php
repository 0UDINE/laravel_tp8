@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Ajouter un étudiant</h3>
        </div>
        <div class="card-body">
            {{-- L'action pointe vers la route 'store' définie dans votre contrôleur --}}
            <form action="{{ route('etudiants.store') }}" method="POST">
                {{-- Protection obligatoire contre les attaques CSRF dans Laravel --}}
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Filière</label>
                    <input type="text" name="filiere" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection