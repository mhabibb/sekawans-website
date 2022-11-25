<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'sex' => fake()->randomElement(['laki-laki', 'perempuan']),
            'education_id' => fake()->numberBetween(1, 5),
            'id_card_address' => fake()->streetAddress(),
            'id_card_district' => fake()->city(),
            'id_number' => fake()->nik(),
            'religion_id' => fake()->numberBetween(1, 6),
            'residence_address' => fake()->streetAddress(),
            'district_id' => fake()->randomElement(['3508010', '3508020', '3508030', '3508040', '3508050', '3508060', '3508061', '3508070', '3508080', '3508090', '3508100', '3508110', '3508120', '3508130', '3508140', '3508150', '3508160', '3508170', '3508180', '3508190', '3508200', '3509010', '3509020', '3509030', '3509040', '3509050', '3509060', '3509070', '3509080', '3509090', '3509100', '3509110', '3509120', '3509130', '3509140', '3509150', '3509160', '3509170', '3509180', '3509190', '3509200', '3509210', '3509220', '3509230', '3509240', '3509250', '3509260', '3509270', '3509280', '3509710', '3509720', '3509730', '3511010', '3511020', '3511030', '3511031', '3511040', '3511050', '3511060', '3511061', '3511070', '3511080', '3511090', '3511100', '3511110', '3511111', '3511120', '3511130', '3511140', '3511141', '3511150', '3511151', '3511152', '3511160', '3511170', '3512010', '3512020', '3512030', '3512040', '3512050', '3512060', '3512070', '3512080', '3512090', '3512100', '3512110', '3512120', '3512130', '3512140', '3512150', '3512160', '3512170']),
            'phone' => fake()->phoneNumber(),
            'marital_status' => fake()->randomElement(['menikah', 'belum menikah', 'janda/duda']),
            'has_job' => fake()->boolean(),
            'workplace' => fake()->company(),
            'work_address' => fake()->streetAddress(),
            'dependent' => fake()->numberBetween(1, 21),
            'mother_name' => fake()->name('female'),
            'father_name' => fake()->name('mele'),
            'guardian_phone' => fake()->phoneNumber(),
            'guardian_address' => fake()->streetAddress(),
            'emergency_contact_id' => fake()->numberBetween(1, 20)
        ];
    }
}
