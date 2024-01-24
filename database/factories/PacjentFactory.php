<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacjentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->lastName(),
            'pesel' => $this->faker->numerify('###########'),
            'numer_kontaktowy_opiekuna' => $this->faker->phoneNumber(),
        ];
    }
}
