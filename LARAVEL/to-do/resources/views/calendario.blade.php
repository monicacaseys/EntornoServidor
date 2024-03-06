<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
</head>
<body>
   
@extends('layouts.base')

@section('content')
<h1 class="text-center">Calendario</h1>
    <!-- Formulario con estilos de Bootstrap -->
    <form action="{{ route('todo_list.mostrar') }}" method="GET">
        @csrf
        <div class="form-group mx-auto text-center">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" class="form-control text-center" id="fecha" name="fecha">
        </div>
        <button type="submit" class="btn btn-primary d-block mx-auto">Ver tareas</button>
    </form>
@endsection


</body>
</html>
