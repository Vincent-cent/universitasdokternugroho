<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CollaboratorFactory extends Factory
{
    protected $model = \App\Models\Collaborator::class;

    public function definition()
    {
        $name = $this->faker->unique()->company;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => $this->faker->randomElement(['organization','university','foundation','individual']),
            'description' => $this->faker->paragraph(),
            'website' => $this->faker->url,
            'verified' => $this->faker->boolean(75),
            'social_links' => [
                'linkedin' => $this->faker->url,
            ],
        ];
    }
}
