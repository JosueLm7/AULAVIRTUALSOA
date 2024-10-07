<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Estudiante; // Asegúrate de que tienes este modelo
use Carbon\Carbon;

class EnviarNotificaciones extends Command
{
    protected $signature = 'enviar:notificaciones';
    protected $description = 'Envía notificaciones automáticas a los estudiantes sobre sus tareas';

    public function handle()
    {

        $fechaInicio = Carbon::createFromDate(2024, 10, 7);
        $fechaFin = Carbon::createFromDate(2024, 12, 31); 

        // Obtener todos los estudiantes
        $estudiantes = Estudiante::all();

        foreach ($estudiantes as $estudiante) {
            // Definir el mensaje
            $mensaje = 'Tienes una nueva tarea pendiente.';
            $fechaEnvio = Carbon::createFromTimestamp(mt_rand($fechaInicio->timestamp, $fechaFin->timestamp));

            // Enviar el correo
            Mail::send('emails.correo', [
                'estudiante' => $estudiante,
                'mensaje' => $mensaje,
                'fechaEnvio' => $fechaEnvio,
            ], function ($message) use ($estudiante) {
                $message->to($estudiante->emailEstudiante)
                        ->subject('Notificación de Tarea');
            });

            // Registrar la notificación en la base de datos
            \DB::table('notificaciones')->insert([
                'idestudiantes' => $estudiante->idestudiantes,
                'mensajeNotificaciones' => $mensaje,
                'fechaEnvio' => $fechaEnvio,
                'estado' => 'pendiente'
            ]);
        }

        $this->info('Notificaciones enviadas exitosamente.');
    }
}
