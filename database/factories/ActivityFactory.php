<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Activity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
      protected $model = Activity::class;
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title.' '.$this->faker->year),
            'summary' => $this->faker->sentence(10),
            'description' => $this->faker->paragraphs(2, true),
            'location' => $this->faker->city,
            'start_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['planned','ongoing','completed']),
            'public' => true,
            'impact_metrics' => [
                'participants' => $this->faker->numberBetween(10,500),
                'funds_distributed' => $this->faker->numberBetween(1000000,50000000),
            ],
        ];
    }
}
