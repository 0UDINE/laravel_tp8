@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Gestion des Notes</h3>

    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('notes.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <select name="etudiant_id" class="form-select">
                        <option value="">Tous les étudiants</option>
                        @foreach(\App\Models\Etudiant::all() as $e)
                            <option value="{{ $e->id }}" {{ request('etudiant_id') == $e->id ? 'selected' : '' }}>
                                {{ $e->nom }} {{ $e->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ route('notes.create') }}" class="btn btn-success">Ajouter une note</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">Retour</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Étudiant</th>
                <th>Module</th>
                <th>Intra (35%)</th>
                <th>Projet (25%)</th>
                <th>Final (40%)</th>
                <th>Moyenne</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                   
                    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td>{{ $note->module->intitule }}</td>
                    <td>{{ $note->note_intra }}</td>
                    <td>{{ $note->note_projet }}</td>
                    <td>{{ $note->note_final }}</td>
                    <td class="fw-bold {{ $note->moyenne >= 10 ? 'text-success' : 'text-danger' }}">
                        {{ number_format($note->moyenne, 2) }}
                    </td>
                    <td>
                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette note ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection