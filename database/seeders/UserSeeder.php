<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => bcrypt('editor'),
            'role' => 'editor'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Korisnik',
            'email' => 'user@pwa.rs',
            'password' => bcrypt('user'),
            'role' => 'user'
        ]);
    }
}
