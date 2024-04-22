<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'wafir',
            'username' => 'skyrizer',
            'phone_number' => '01161636065',
            'email' => 'wafir@gmail.com',
            'password' => 'abc12345'
        ]);
    }
}
