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
            'matakuliah' => [
                'namaMK' => $this->faker->text(10),
                'LT1' => $this->faker->numberBetween(10, 100),
                'LT2' => $this->faker->numberBetween(10, 100),
                'LT3' => $this->faker->numberBetween(10, 100),
                'LT4' => $this->faker->numberBetween(10, 100),
                'UH1' => $this->faker->numberBetween(10, 100),
                'UH2' => $this->faker->numberBetween(10, 100),
                'UTS' => $this->faker->numberBetween(10, 100),
                'UAS' => $this->faker->numberBetween(10, 100),
                'nilai' => $this->faker->numberBetween(10, 100)
            ]
        ];
    }
}
