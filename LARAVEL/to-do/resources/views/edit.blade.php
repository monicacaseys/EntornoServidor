@extends('layouts.base')

@section('title', 'Editar Tarea')

@section('content')
    <h1>Editar Tarea</h1>

    <form action="{{ route('tarea.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre de la tarea:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tarea->nombre }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $tarea->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="prioridad">Prioridad:</label>
            <select class="form-control" name="prioridad" id="prioridad">
                <option value="Normal" {{ $tarea->prioridad === 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Urgente" {{ $tarea->prioridad === 'Urgente' ? 'selected' : '' }}>Urgente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection
