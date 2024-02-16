<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; 

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::latest()->paginate(2);  //consulta de 3 en 3
        return view("index", ['tasks' => $tasks]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       return view("create"); //devuelve la vistya create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            ]); 

       // dd($request->all()); muere al hacerlo
        Task::create($request->all()); //  en el modelo task en el create coge todos los valores del form y los pasa a la bbdd y despues retorna al index
        return redirect()->route("tasks.index")->with("success", "La tarea se ha creado exitosamente"); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //dd($task); //nos da un vardom
        return view("edit", ["task" => $task]);//al edit hay que pasarle algo
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            ]); 
        $task->update($request->all());
        return redirect()->route("tasks.index")->with("success", "La tarea se ha editado exitosamente"); //cuando haga el update me sale un mensaje
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
       return redirect()->route("tasks.index")->with("success", "La tarea se ha eliminado exitosamente"); 
    }
}
