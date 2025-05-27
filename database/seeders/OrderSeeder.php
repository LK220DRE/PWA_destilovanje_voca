<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::where('email', 'user@pwa.rs')->first();
        $product = \App\Models\Product::first();

        \App\Models\Order::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'total_price' => $product->price * 2,
            'status' => 'completed'
        ]);
    }
}
