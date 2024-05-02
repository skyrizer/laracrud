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
        $this->call(PermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(NodeSeeder::class);


        User::factory()->create([
            'name' => 'wafir',
            'username' => 'skyrizer',
            'phone_number' => '01161636065',
            'email' => 'wafir@gmail.com',
            'password' => 'abc12345'
        ]);
    }
}
