<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

//Agregando nueva ruta
Route::get('/estudiantes', function() {
    return "Bienvenido a pagina principal de estudiantes";
});

//Agregando nueva ruta para CREAR un nuevo registro
Route::get('/tareas', function() {
    return "En esta página podrás visualizar tus tareas.";
});

Route::get('/notificaciones', function () {
    /* return view ('welcome');*/
    return "En esta página podrás visualizar tus notificaciones";
});