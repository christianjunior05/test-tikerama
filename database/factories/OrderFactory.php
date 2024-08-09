<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    use HasFactory;
    protected $model = Order::class;

    public function definition()
    {
        return [
            'order_number' => 'ORD' . strtoupper(Str::random(10)),
            'order_event_id' => Event::factory(),
            'order_price' => $this->faker->numberBetween(10000, 100000),
            'order_type' => 'ticket',
            'order_payment' => $this->faker->randomElement(['credit_card', 'paypal', 'mobile_money']),
            'order_info' => $this->faker->sentence,
        ];
    }
}