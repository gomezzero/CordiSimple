<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'name' => 'Concierto de Rock',
                'description' => 'Un concierto de rock en vivo con varias bandas locales.',
                'date' => '2024-12-10',
                'time' => '19:00',
                'location' => 'Auditorio Nacional',
                'max_capacity' => 500,
                'availableSports' => 450,
                'status' => 'Activo',
            ],
            [
                'name' => 'Feria Gastronómica',
                'description' => 'Evento de comida y cultura con más de 50 puestos de comida.',
                'date' => '2024-11-15',
                'time' => '12:00',
                'location' => 'Parque Central',
                'max_capacity' => 1000,
                'availableSports' => 900,
                'status' => 'Activo',
            ],
            [
                'name' => 'Exposición de Arte',
                'description' => 'Exhibición de arte moderno de artistas locales.',
                'date' => '2024-12-01',
                'time' => '10:00',
                'location' => 'Museo de Arte',
                'max_capacity' => 300,
                'availableSports' => 290,
                'status' => 'Activo',
            ],
            [
                'name' => 'Maratón Anual',
                'description' => 'Maratón anual de 10 km.',
                'date' => '2024-10-30',
                'time' => '06:00',
                'location' => 'Ciudad Deportiva',
                'max_capacity' => 2000,
                'availableSports' => 1950,
                'status' => 'Activo',
            ],
            [
                'name' => 'Conferencia de Tecnología',
                'description' => 'Conferencia sobre avances en tecnología y software.',
                'date' => '2024-11-20',
                'time' => '09:00',
                'location' => 'Centro de Convenciones',
                'max_capacity' => 800,
                'availableSports' => 750,
                'status' => 'Activo',
            ],
            [
                'name' => 'Torneo de Ajedrez',
                'description' => 'Competencia anual de ajedrez para todas las edades.',
                'date' => '2024-11-25',
                'time' => '08:00',
                'location' => 'Club de Ajedrez',
                'max_capacity' => 150,
                'availableSports' => 130,
                'status' => 'Activo',
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['name' => $event['name']],
                [
                    'description' => $event['description'],
                    'date' => $event['date'],
                    'time' => $event['time'],
                    'location' => $event['location'],
                    'max_capacity' => $event['max_capacity'],
                    'availableSports' => $event['availableSports'],
                    'status' => $event['status'],
                ]
            );
        }
    }
}
