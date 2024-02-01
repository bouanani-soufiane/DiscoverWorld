<?php

namespace Database\Seeders;

use App\Models\Continent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $continentNames = ["Asia", "Africa", "Antarctica", "Oceania", "North America", "Europe", "South America"];

        foreach ($continentNames as $continentName) {
            \App\Models\Continent::factory()->create([
                'nameContinent' => $continentName,
                'description' => 'Lorem ipsum',
            ]);
        }
    }

}
