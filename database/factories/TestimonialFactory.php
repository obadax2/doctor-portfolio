<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'message' => $this->faker->paragraph(3),
            'rating' => $this->faker->numberBetween(4, 5),
            'patient_since' => (string) $this->faker->year(),
            'is_active' => true,
        ];
    }
}