<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text(20),
            'umur' => $this->faker->numberBetween(19, 22),
            'kelas_id' => $this->faker->text(20)
        ];
    }
}
