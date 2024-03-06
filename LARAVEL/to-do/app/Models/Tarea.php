<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   // Nombre de la tabla en la base de datos
   protected $table = 'tareas';

   // Campos que pueden ser asignados masivamente
   protected $fillable = ['nombre', 'descripcion', 'prioridad'];

   public $timestamps = false;

   
}
