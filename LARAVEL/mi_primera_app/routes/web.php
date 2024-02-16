<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TasksController;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\ImagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/',[TasksController::class, 'home']); 
Route::get('ejemplo', [EjemploController::class, 'index']); 
Route::get('ejemplo', [ImageController::class]); 
