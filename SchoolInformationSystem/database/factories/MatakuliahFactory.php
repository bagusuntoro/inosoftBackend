<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaMK' => $this->faker->text(15),
            'LT1' => $this->faker->numberBetween(10, 100),
            'LT2' => $this->faker->numberBetween(10, 100),
            'LT3' => $this->faker->numberBetween(10, 100),
            'LT4' => $this->faker->numberBetween(10, 100),
            'UH1' => $this->faker->numberBetween(10, 100),
            'UH2' => $this->faker->numberBetween(10, 100),
            'UTS' => $this->faker->numberBetween(10, 100),
            'UAS' => $this->faker->numberBetween(10, 100),
            'nilai' => $this->faker->numberBetween(10, 100),
            'mahasiswa_id' => $this->faker->text(15)
        ];
    }
}
