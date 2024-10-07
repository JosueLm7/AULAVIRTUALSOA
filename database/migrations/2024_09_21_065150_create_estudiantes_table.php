<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabla estudiantes
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('idestudiantes'); // Cambia a increments
            $table->string('nombreEstudiante');
            $table->string('emailEstudiante')->unique();
            $table->timestamps();
        });

        // Tabla notificaciones
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('idnotificaciones');
            $table->unsignedInteger('idestudiantes'); // Mantenerlo como unsignedInteger
            $table->text('mensajeNotificaciones');
            $table->timestamp('fechaEnvio')->nullable();
            $table->string('estado', 50);
            
            $table->foreign('idestudiantes')->references('idestudiantes')->on('estudiantes')->onDelete('cascade');
        });

        // Tabla tareas
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('idareas');
            $table->string('tituloTarea', 100);
            $table->text('description');
            $table->date('fechaEntrega');
            $table->timestamps();
        });

        // Tabla estudiantes_tareas
        Schema::create('estudiantes_tareas', function (Blueprint $table) {
            $table->unsignedInteger('idestudiantes');
            $table->unsignedInteger('idareas');
            $table->string('completada', 50)->nullable();
            $table->timestamp('fechaCompletada')->nullable();

            $table->foreign('idestudiantes')->references('idestudiantes')->on('estudiantes')->onDelete('cascade');
            $table->foreign('idareas')->references('idareas')->on('tareas')->onDelete('cascade');

            $table->primary(['idestudiantes', 'idareas']);
        });

        // Tabla historial_notificaciones
        Schema::create('historial_notificaciones', function (Blueprint $table) {
            $table->increments('id'); // Cambiado a increments para que sea consistente
            $table->unsignedInteger('idestudiantes'); // Usa el mismo tipo de dato
            $table->string('mensaje');
            $table->timestamps();

            // Clave foránea
            $table->foreign('idestudiantes')->references('idestudiantes')->on('estudiantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiantes_tareas');
        Schema::dropIfExists('notificaciones');
        Schema::dropIfExists('historial_notificaciones');
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('estudiantes');
    }
};