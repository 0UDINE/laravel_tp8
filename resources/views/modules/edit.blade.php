@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Modifier un module</h3>
        </div>
        <div class="card-body">
            
            <form action="{{ route('modules.update', $module->id) }}" method="POST">
                @csrf
                
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Intitulé</label>
                    <input type="text" name="intitule" value="{{ $module->intitule }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semestre</label>
                    <input type="text" name="semestre" value="{{ $module->semestre }}" class="form-control" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                    <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection