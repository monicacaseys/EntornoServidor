<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class ToDoListController extends Controller
{

    public function mostrarToDoList(Request $request)
    {
        try {
            $fechaSeleccionada = $request->input('fecha');

            $tareas = Tarea::whereDate('fecha_creacion', $fechaSeleccionada)->get();
         
            return view('todo_list', compact('tareas', 'fechaSeleccionada'));
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Se ha producido un error. Por favor, inténtalo de nuevo más tarde.');
        }
    }
    

    public function agregarTarea(Request $request, $fecha)
    {
        try {
        $tarea = new Tarea();
        $tarea->nombre = $request->input('nombre');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estado = 'Pendiente'; 
        $tarea->prioridad = $request->input('prioridad');
        $tarea->fecha_creacion = $fecha; // Asociar la tarea con la fecha correspondiente

        $tarea->save();

        return redirect()->route('todo_list.mostrar', ['fecha' => $fecha])->with('success', 'Tarea agregada correctamente.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Se ha producido un error al agregar la tarea. Por favor, inténtalo de nuevo más tarde.');
        }
    }
    
   
    public function mostrarAgregarTarea(Request $request, $fecha)
{
   
    return view('agregar-tarea', ['fecha' => $fecha]);
}

    
    public function completarTarea($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'Completada';
        $tarea->save();

        return redirect()->back();
    }

    public function cambiarEstadoTarea($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = $tarea->estado === 'En proceso' ? 'Pendiente' : 'En proceso';
        $tarea->save();

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        return view('edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea): RedirectResponse
{
    try {
        $request->validate([
            "nombre" => "required",
            "descripcion" => "required"
        ]); 
        
        $tarea->update($request->all());
        
        $fechaSeleccionada = $tarea->fecha_creacion;
    
        return redirect()->route('todo_list.mostrar', ['fecha' => $fechaSeleccionada])
                         ->with('success', 'Tarea actualizada correctamente.');
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'No se pudo actualizar la tarea. Inténtalo de nuevo más tarde.');
    }
   
}
   
    public function destroy(Tarea $tarea): RedirectResponse
    {
        try {
            $fechaSeleccionada = $tarea->fecha; 
            $tarea->delete(); 
            return view('todo_list', compact('tareas', 'fechaSeleccionada'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo eliminar la tarea. Inténtalo de nuevo más tarde.');
        }
    }
}
