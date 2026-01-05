@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Ajouter un module</h3>
        </div>
        <div class="card-body">
            
            <form action="{{ route('modules.store') }}" method="POST">
                
                @csrf

                <div class="mb-3">
                    <label class="form-label">Intitulé</label>
                    <input type="text" name="intitule" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre</label>
                    <input type="text" name="semestre" class="form-control" placeholder="Ex: Semestre 1" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection