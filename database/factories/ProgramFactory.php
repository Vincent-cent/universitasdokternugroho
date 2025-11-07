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
            'slug' => Str::slug($title),
            'short_summary' => $this->faker->sentence(8),
            'description' => $this->faker->paragraphs(3, true),
            'category' => $this->faker->randomElement(['scholarship','outreach','research','community']),
            'status' => 'active',
            'start_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'public' => true,
        ];
    }
}
