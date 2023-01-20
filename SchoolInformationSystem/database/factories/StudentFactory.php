<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'kelas' => $this->faker->numberBetween(10, 20),
            'latihan1' => $this->faker->numberBetween(10, 100),
            'latihan2' => $this->faker->numberBetween(10, 100),
            'latihan3' => $this->faker->numberBetween(10, 100),
            'latihan4' => $this->faker->numberBetween(10, 100),
            'ulanganHarian1' => $this->faker->numberBetween(10, 100),
            'ulanganHarian2' => $this->faker->numberBetween(10, 100),
            'uts' => $this->faker->numberBetween(10, 100),
            'uas' => $this->faker->numberBetween(10, 100),
            'nilai' => $this->faker->numberBetween(10, 100),
        ];
    }
}
