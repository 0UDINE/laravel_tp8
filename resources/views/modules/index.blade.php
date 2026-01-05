@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Liste des modules</h3>
    
    <div class="mb-3">
        <a href="{{ route('modules.create') }}" class="btn btn-success">Ajouter module</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">Retour</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Intitulé</th>
                <th>Semestre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>{{ $module->intitule }}</td>
                    <td>{{ $module->semestre }}</td>
                    <td>
                        {{-- Lien vers le formulaire de modification --}}
                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary btn-sm">Modifier</a>

                        {{-- Formulaire de suppression sécurisé --}}
                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce module ?')">
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