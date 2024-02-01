<?php

namespace Database\Factories;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Continent>
 */
class ContinentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Continent::class;

    public function definition(): array
    {
        $continentNames = ["Africa", "Antarctica", "Asia", "Europe", "North America", "Oceania", "South America"];

        return [
            "nameContinent" => $continentNames[array_rand($continentNames)],
            "description" => $this->faker->sentence(10),
        ];
    }
}
