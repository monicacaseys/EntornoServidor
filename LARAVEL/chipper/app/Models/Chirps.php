<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Chirps extends Model
{
    use HasFactory;

    protected $fillable = [ //permite el envio masivo de inicio de sesion de un usuario
        'message',
        ]; 

    public function user(): BelongsTo
        {
        return $this->belongsTo(User::class); // cada chirp pertenece a un usuario en concreto.
        } 
}
