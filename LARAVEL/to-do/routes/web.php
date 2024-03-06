<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ToDoListController;

Route::get('/', [CalendarioController::class, 'mostrarCalendario'])->name('calendario.mostrar');
Route::post('/listas-tareas', [CalendarioController::class, 'obtenerListasTareas'])->name('calendario.listas_tareas');

Route::get('/todo-list', [ToDoListController::class, 'mostrarToDoList'])->name('todo_list.mostrar');
Route::post('/agregar-tarea', [ToDoListController::class, 'agregarTarea'])->name('tarea.agregar');
Route::post('/completar-tarea/{id}', [ToDoListController::class, 'completarTarea'])->name('tarea.completar');
Route::post('/cambiar-estado-tarea/{id}', [ToDoListController::class, 'cambiarEstadoTarea'])->name('tarea.cambiar_estado');
Route::get('/tareas/{tarea}/edit', [ToDoListController::class, 'edit'])->name('tarea.edit');
Route::delete('/tareas/{tarea}', [ToDoListController::class, 'destroy'])->name('tarea.destroy');
Route::put('/tareas/{tarea}', [ToDoListController::class, 'update'])->name('tarea.update');
Route::get('/agregar-tarea/{fecha}', [ToDoListController::class, 'mostrarAgregarTarea'])->name('agregar-tarea.mostrar');
Route::post('/agregar-tarea/{fecha}', [ToDoListController::class, 'agregarTarea'])->name('agregar-tarea');


/* Route::get('/', function () {
    return view('welcome');
}); */
