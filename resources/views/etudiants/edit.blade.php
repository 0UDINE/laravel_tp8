@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Modifier un étudiant</h3>
        </div>
        <div class="card-body">
            {{-- L'action pointe vers la route 'update' avec l'ID de l'étudiant --}}
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                @csrf
                {{-- Directive pour simuler une requête PUT pour la mise à jour --}}
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ $etudiant->nom }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ $etudiant->prenom }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $etudiant->email }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Filière</label>
                    <input type="text" name="filiere" value="{{ $etudiant->filiere }}" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection