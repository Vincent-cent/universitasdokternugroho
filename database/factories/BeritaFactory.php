<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Berita;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{

    protected $model = Berita::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'id' => $this->faker->unique()->numberBetween(1, 1000),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'author' => $this->faker->name(),
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'image' => $this->faker->imageUrl(),
            'keterangan_gambar' => $this->faker->sentence(),
        ];
    }
}
