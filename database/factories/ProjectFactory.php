<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->text(15),
            'description'=>$this->faker->text(255),
            'hours'=>$this->faker->randomFloat(2, 1, 9999),
            'start_date'=>$this->faker->date(),
            'end_date'=>$this->faker->date(),
        ];
    }
}
