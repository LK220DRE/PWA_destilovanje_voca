<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
public function run()
{
    User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@pwa.rs',
        'password' => bcrypt('admin'),
        'role' => 'admin'
    ]);

    $this->call([
        UserSeeder::class,
        DistillerySeeder::class,
        ProductSeeder::class,
        OrderSeeder::class
    ]);
}
}
