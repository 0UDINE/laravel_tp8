@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Ajouter une note</h3>
        </div>
        <div class="card-body">
            
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Étudiant</label>
                    <select name="etudiant_id" class="form-select" required>
                        <option value="">Sélectionnez un étudiant</option>
                        @foreach($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}">
                                {{ $etudiant->nom }} {{ $etudiant->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Module</label>
                    <select name="module_id" class="form-select" required>
                        <option value="">Sélectionnez un module</option>
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}">
                                {{ $module->intitule }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Intra (35%)</label>
                    <input type="number" step="0.01" name="note_intra" class="form-control" min="0" max="20" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Projet (25%)</label>
                    <input type="number" step="0.01" name="note_projet" class="form-control" min="0" max="20" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Final (40%)</label>
                    <input type="number" step="0.01" name="note_final" class="form-control" min="0" max="20" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection