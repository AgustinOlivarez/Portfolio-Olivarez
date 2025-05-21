<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'mensajes_formulario'; // Asegurate de que sea el nombre correcto de la tabla

    public $timestamps = false; // Desactivamos los timestamps automáticos de Laravel

    protected $fillable = [
        'nombre_formulario',
        'mail_formulario',
        'mensaje_formulario',
        'created_at'
    ];
}
