<?php

namespace App\Services;

use GuzzleHttp\Client;

class AulaVirtualService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://APIUniversidadContinental', // URL base de la API de la UNIVERSIDAD
        ]);
    }

    public function obtenerTareas($estudianteId)
    {
        $response = $this->client->get("tareas/{$estudianteId}");
        return json_decode($response->getBody()->getContents(), true);
    }
}