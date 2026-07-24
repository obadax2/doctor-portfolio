<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $categories = ['Diagnosis', 'Treatment', 'Specialized Care', 'Preventative'];
        $icons = ['monitor_heart', 'neurology', 'orthopedics', 'stethoscope', 'psychology', 'pediatrics'];

        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(15),
            'long_description' => $this->faker->paragraphs(3, true),
            'icon' => $this->faker->randomElement($icons),
            'category' => $this->faker->randomElement($categories),
            'highlights' => [
                $this->faker->sentence(8),
                $this->faker->sentence(8),
                $this->faker->sentence(8),
                $this->faker->sentence(8),
            ],
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 20),
        ];
    }
}