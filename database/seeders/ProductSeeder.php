<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distillery1 = \App\Models\Distillery::first();
        $distillery2 = \App\Models\Distillery::find(2);

        \App\Models\Product::factory()->create([
            'name' => 'Šljivovica Premium',
            'description' => 'Odabir najkvalitetnijih šljiva',
            'price' => 5500,
            'distillery_id' => $distillery1->id,
            'is_featured' => true
        ]);

        \App\Models\Product::factory()->create([
            'name' => 'Kajsijevača Deluxe',
            'description' => 'Aroma zrelih kajsija',
            'price' => 6200,
            'distillery_id' => $distillery2->id,
            'is_featured' => true
        ]);
    }
}
