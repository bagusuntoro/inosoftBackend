<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prodi' => $this->faker->text(10),
            'kaprodi' => $this->faker->text(10),
        ];
    }
}
