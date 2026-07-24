<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'reason' => $this->faker->paragraph(2),
            'type' => $this->faker->randomElement(['in-clinic', 'online']),
            'status' => 'pending',
            'is_read' => false,
        ];
    }
}