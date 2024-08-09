<?php

namespace Database\Factories;

use App\Models\TicketType;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketTypeFactory extends Factory
{
    protected $model = TicketType::class;

    public function definition()
    {
        return [
            'ticket_type_event_id' => Event::factory(), // Associer à un événement
            'ticket_type_name' => $this->faker->randomElement(['Grand Public', 'VIP', 'Premium']), // Nom du type de ticket
            'ticket_type_price' => $this->faker->numberBetween(1000, 10000), // Prix du ticket
            'ticket_type_quantity' => $this->faker->numberBetween(50, 500), // Quantité totale de tickets disponibles
            'ticket_type_real_quantity' => $this->faker->numberBetween(0, 50), // Quantité réelle de tickets disponibles
            'ticket_type_total_quantity' => $this->faker->numberBetween(50, 550), // Quantité totale de tickets
            'ticket_type_description' => $this->faker->sentence, // Description du type de ticket
        ];
    }
}