@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">🌎 {{ $planet->name }}</h2>
                    <a href="{{ route('planets.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <h4 class="text-primary">Descripción</h4>
                                <p class="lead">{{ $planet->description }}</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5>Cantidad de tripulantes</h5>
                                        <p class="h3">{{ $planet->quantity }} <small class="text-muted">lunas</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h5>Fecha de lanzamiento</h5>
                                        <p class="h3">{{ \Carbon\Carbon::parse($planet->fecha_lanzamiento)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <a href="{{ route('planets.edit', $planet) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar Planeta
                                </a>
                                <form action="{{ route('planets.destroy', $planet) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este planeta?')">
                                        <i class="fas fa-trash"></i> Eliminar Mision
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection