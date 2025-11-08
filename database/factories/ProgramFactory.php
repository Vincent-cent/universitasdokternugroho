<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->catchPhrase;
        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numberBetween(100, 999)),
            'short_summary' => $this->faker->sentence(10),
            'description' => $this->faker->paragraphs(2, true),
            'vision_goals' => json_encode($this->faker->sentences(3)),
            'category' => $this->faker->randomElement(['Community', 'Research', 'Education', 'Charity']),
            'logo_path' => "https://placehold.co/200x200?text=Logo+" . rand(1, 9999),
            'hero_image_path' => "https://loremflickr.com/800/600/education,university,school?lock=" . rand(1, 9999),
            'status' => $this->faker->randomElement(['active', 'paused', 'archived']),
            'start_date' => $this->faker->dateTimeBetween('-3 years', '-1 year'),
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'budget_amount' => $this->faker->numberBetween(5_000_000, 50_000_000),
            'public' => true,
            'is_featured' => $this->faker->boolean(10), // 10% chance
            'created_by' => 1,
        ];
    }
}
