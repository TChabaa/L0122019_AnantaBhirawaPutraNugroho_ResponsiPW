<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $eventType = $this->faker->randomElement(['seminar', 'webinar']);
        $paymentStatus = $this->faker->randomElement(['paid', 'free']);

        return [
            'event_title' => $this->faker->sentence,
            'event_description' => $this->faker->paragraph,
            'event_time' => $this->faker->time('H:i'),
            'organizer_name' => $this->faker->company,
            'event_type' => $eventType,
            'event_location' => $eventType === 'seminar' ? $this->faker->address : null,
            'event_link' => $eventType === 'webinar' ? $this->faker->url : null,
            'payment_status' => $paymentStatus,
            'event_price' => $paymentStatus === 'paid' ? $this->faker->randomFloat(2, 10, 200) : null,
        ];
    }

    public function webinar()
    {
        return $this->state([
            'event_type' => 'webinar',
            'event_location' => null,
        ]);
    }

    public function seminar()
    {
        return $this->state([
            'event_type' => 'seminar',
            'event_link' => null,
        ]);
    }

    public function free()
    {
        return $this->state([
            'payment_status' => 'free',
            'event_price' => null,
        ]);
    }

    public function paid()
    {
        return $this->state([
            'payment_status' => 'paid',
        ]);
    }
}