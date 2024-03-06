<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
@extends('layouts.base')

@section('title', 'ToDoList')

@section('content')
    <h1>Lista de tareas para {{ $fechaSeleccionada }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->nombre }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>
                        @if($tarea->estado === 'Pendiente')
                            <form action="{{ route('tarea.completar', $tarea->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Completar</button>
                            </form>
                        @else
                            Completada
                        @endif
                    </td>
                    <td>
                        @if($tarea->prioridad === 'Urgente')
                            <span style="color: red;">{{ $tarea->prioridad }}</span>
                        @else
                            {{ $tarea->prioridad }}
                        @endif
                    </td>
                    <td>

             <a href="{{route('tarea.edit', $tarea)}}" class="btn btn-warning">Editar</a>

             <form action="{{ route('tarea.destroy', $tarea) }}" method="post" class="d-inline">
    @csrf
    @method("DELETE") 
    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
</form>

              </td>
                </tr>
            @endforeach
            
        </tbody>

    </table>
    <a href="{{ route('agregar-tarea.mostrar', ['fecha' => $fechaSeleccionada]) }}" class="btn btn-success"> + Agregar tarea</a>
@endsection



 </body>
</html>
