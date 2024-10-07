<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes'; // Nombre de la tabla
    protected $primaryKey = 'idestudiantes'; // Clave primaria
    protected $fillable = ['nombreEstudiante', 'emailEstudiante']; // Campos asignables
}
