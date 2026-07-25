<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'image' => 'gallery/' . $this->faker->uuid() . '.jpg',
            'caption' => ['en' => $this->faker->sentence(5)],
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 20),
        ];
    }
}
