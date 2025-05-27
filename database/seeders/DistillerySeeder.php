<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Distillery;

class DistillerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Distillery::factory()->create([
            'name' => 'Stara Destilerija',
            'description' => 'Porodična tradicija od 1890. godine',
            'location' => 'Šumadija'
        ]);

        \App\Models\Distillery::factory()->create([
            'name' => 'Zlatna Rakija',
            'description' => 'Moderna destilerija sa vrhunskim proizvodima',
            'location' => 'Vojvodina'
        ]);
    }
}
