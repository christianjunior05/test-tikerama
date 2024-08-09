<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $events = Event::factory()->count(40)->create()->each(function ($event) {
            // Pour chaque événement, créer 3 types de tickets
            TicketType::factory()->count(3)->create([
                'ticket_type_event_id' => $event->event_id,
            ]);
        });
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ohnt@example.com',
        ]);
    }
}
