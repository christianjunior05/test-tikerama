<?php

namespace Database\Factories;

use App\Enum\EventCategoryEnum;
use App\Enum\EventStatusEnum;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    use HasFactory;
    protected $model = Event::class;

    public function definition()
    {
        return [
            'event_category' => $this->faker->randomElement(EventCategoryEnum::getAll()),
            'event_title' => $this->faker->sentence,
            'event_description' => $this->faker->paragraph,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'event_image' => $this->faker->imageUrl(),
            'event_city' => $this->faker->city,
            'event_address' => $this->faker->address,
            'event_status' => $this->faker->randomElement(EventStatusEnum::getAll()),
            'event_created_on' => now(),
        ];
    }

}
