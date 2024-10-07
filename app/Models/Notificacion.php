<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones'; // Nombre de la tabla
    protected $primaryKey = 'idnotificaciones'; // Clave primaria
    protected $fillable = ['idestudiantes', 'mensajeNotificaciones', 'fechaEnvio', 'estado']; // Campos asignables

    public $timestamps = false; // Desactiva las marcas de tiempo
}
