<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{

    public function mostrarCalendario()
    {
        return view('calendario');
    }

    /**
     * Obtiene las tareas para la fecha seleccionada.
     */
    public function obtenerTareas(Request $request)
    {
        $fechaSeleccionada = $request->fecha;
        $tareas = Tarea::whereDate('fecha_creacion', $fechaSeleccionada)->get();

        return $tareas;
    }
}
