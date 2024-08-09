<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TicketTypeFactory extends Factory
{
    use HasFactory;
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'ticket_event_id' => Event::factory(),
            'ticket_email' => $this->faker->unique()->safeEmail,
            'ticket_phone' => $this->faker->phoneNumber,
            'ticket_price' => $this->faker->numberBetween(5000, 50000),
            'ticket_order_id' => Order::factory(),
            'ticket_key' => Str::random(10),
            'ticket_ticket_type_id' => $this->faker->numberBetween(1, 3), // Vous pouvez ajuster selon les types de billets disponibles
            'ticket_status' => $this->faker->randomElement(['active', 'validated', 'expired', 'cancelled']),
        ];

    }
}