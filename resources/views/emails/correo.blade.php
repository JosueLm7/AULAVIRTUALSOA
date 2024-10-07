<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Tarea</title>
</head>
<body>
    <h1>Hola {{ $estudiante->nombreEstudiante }},</h1>
    <p>{{ $mensaje }}</p>
    <p>Fecha de envío: {{ $fechaEnvio }}</p>
    <p>¡No olvides completar tu tarea!</p>
</body>
</html>
