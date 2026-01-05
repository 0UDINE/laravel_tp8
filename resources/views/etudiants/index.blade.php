@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Liste des étudiants</h3>
    
    <div class="mb-3">
        <a href="{{ route('etudiants.create') }}" class="btn btn-success">Ajouter étudiant</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">Retour</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->filiere }}</td>
                    <td>
                        
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary btn-sm">Modifier</a>

                       
                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet étudiant ?')">
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