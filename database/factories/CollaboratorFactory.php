<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CollaboratorFactory extends Factory
{
    protected $model = \App\Models\Collaborator::class;

 public function definition(): array
    {
        $name = $this->faker->unique()->company;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => $this->faker->randomElement(['organization', 'university', 'foundation', 'individual']),
            'description' => $this->faker->paragraph(),
            'website' => $this->faker->url,
            'logo_path' => "https://loremflickr.com/300/300/company,office,logo?lock=" . rand(1, 9999),
            'verified' => $this->faker->boolean(75),
            'social_links' => [
                'linkedin' => $this->faker->url,
            ],
        ];
    }
}
