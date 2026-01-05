@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Modifier les notes</h3>
        </div>
        <div class="card-body">
            
            <form action="{{ route('notes.update', $note->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Étudiant</label>
                   
                    <input type="text" class="form-control" value="{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Module</label>
                   
                    <input type="text" class="form-control" value="{{ $note->module->intitule }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Intra (35%)</label>
                    <input type="number" step="0.01" name="note_intra" value="{{ $note->note_intra }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Projet (25%)</label>
                    <input type="number" step="0.01" name="note_projet" value="{{ $note->note_projet }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Note Final (40%)</label>
                    <input type="number" step="0.01" name="note_final" value="{{ $note->note_final }}" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Enregistrer les modifications</button>
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection