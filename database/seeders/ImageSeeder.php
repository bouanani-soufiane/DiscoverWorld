<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $continentImages = ["asia.jpg", "africa.jpg", "Antarctica.jpg", "Oceania.jpg", "NorthAmerica.jpg", "europ.jpg", "NorthAmerica.jpg"];

        foreach ($continentImages as $index => $continentImage) {
            DB::table('images')->insert([
                'text' => 'images/'.$continentImage,
                'continent_id' => $index + 1,
            ]);
        }
    }

}
