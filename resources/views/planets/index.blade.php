@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">🌍 Stellar Explorers</h1>
        <a href="{{ route('planets.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear Nuevo Mision
        </a>
    </div>

    <div class="row">
        @foreach ($planets as $planet)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $planet->name }}</h5>
                        <p class="card-text">{{ Str::limit($planet->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('planets.show', $planet) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('planets.edit', $planet) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </div>
                            <form action="{{ route('planets.destroy', $planet) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este planeta?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

