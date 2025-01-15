@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">✏️ Editar Misiones: {{ $planet->name }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('planets.update', $planet) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la mision</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $planet->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $planet->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="distance_from_sun" class="form-label">Distancia desde el Sol (millones de km)</label>
                            <input type="number" step="0.01" class="form-control @error('distance_from_sun') is-invalid @enderror" 
                                   id="distance_from_sun" name="distance_from_sun" value="{{ old('distance_from_sun', $planet->distance_from_sun) }}" required>
                            @error('distance_from_sun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('planets.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Misiones
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 