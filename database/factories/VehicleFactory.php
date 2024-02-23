<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $images = [
            '1616634375264-2d2e17736a36',
            '1541038019982-5b38b55ddea8',
            '1573451441840-d7e8a4de0a66',
            '1618843479313-40f8afb4b4d8',
            '1625417534290-51c3f6f4712a',
            '1563426417880-d78e3f830a67',
            '1477863194645-f73e9c71b296',
            '1636277449088-2ab7d90021cd',
            '1646314672985-fb7d73cb7ad1',
            '1551830820-330a71b99659',
        ];

        return [
            'make' => $this->faker->word(),
            'model' => $this->faker->word(),
            'year' => $this->faker->year(),
            'price' => $this->faker->numberBetween(9999, 99999),
            'description' => $this->faker->paragraph(),
            'image' => Arr::random($images),
        ];
    }
}
