<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientDetail>
 */
class PatientDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id' => fake()->numberBetween(1, 20),
            'worker_id' => fake()->numberBetween(1, 150),
            'no_regis' => fake()->unique()->numerify('##########'),
            'patient_status_id' => fake()->numberBetween(1, 5),
            'age' => fake()->numberBetween(3, 80),
            'weight' => fake()->numberBetween(10, 80),
            'height' => fake()->numberBetween(40, 200),
        ];
    }
}
