<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Los comandos Artisan de tu aplicación.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\EnviarNotificaciones::class,
    ];

    /**
     * Define la programación de las tareas.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     protected function schedule(Schedule $schedule)
     {
         // Ejemplo de tarea programada para ejecutarse cada minuto
         $schedule->command('enviar:notificaciones')->everyMinute();
     }

    /**
     * Registra los comandos para la aplicación.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}