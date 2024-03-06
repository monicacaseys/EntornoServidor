@extends('layouts.base')

@section('title', 'Agregar una tarea')

@section('content')
    <h1>Agregar una tarea para {{ $fecha }}</h1>
    <form action="{{ route('agregar-tarea', ['fecha' => $fecha]) }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nombre">Nombre de la tarea:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
      
        <div class="form-group">
            <label for="prioridad">Prioridad:</label>
            <select class="form-control" name="prioridad" id="prioridad">
                <option value="Normal">Normal</option>
                <option value="Urgente">Urgente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar tarea</button>
    </form>
@endsection
