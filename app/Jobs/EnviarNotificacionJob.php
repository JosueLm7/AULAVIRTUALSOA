<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\AulaVirtualService;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionMail;

class EnviarNotificacionJob extends Job
{
    protected $estudianteId;

    public function __construct($estudianteId)
    {
        $this->estudianteId = $estudianteId;
    }

    public function handle(AulaVirtualService $aulaVirtualService)
    {
        // Obtener las tareas del estudiante desde el aula virtual
        $tareasPendientes = $aulaVirtualService->obtenerTareas($this->estudianteId);

        foreach ($tareasPendientes as $tarea) {
            // Enviar correo electrónico
            Mail::to($tarea['estudiante']['email'])->send(new NotificacionMail($tarea));

            // Registrar la notificación en el historial
            \App\Models\HistorialNotificacion::create([
                'estudiante_id' => $this->estudianteId,
                'mensaje' => 'Recordatorio de tarea: ' . $tarea['nombre'],
                'enviado_a' => now(),
            ]);
        }
    }
}
