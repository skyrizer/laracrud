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

        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'phone_number' => '01161636065',
            'email' => 'admin@gmail.com',
            'password' => 'abc12345'
        ]);  
        
        User::factory()->create([
            'name' => 'wafir',
            'username' => 'skyrizer',
            'phone_number' => '01161636065',
            'email' => 'wafir@gmail.com',
            'password' => 'abc12345'
        ]);

        User::factory()->create([
            'name' => 'devops1',
            'username' => 'devops1',
            'phone_number' => '01161636065',
            'email' => 'devops1@gmail.com',
            'password' => 'abc12345'
        ]);
        
        $this->call(PermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(NodeSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(NodeServiceSeeder::class);
        $this->call(NodeConfigSeeder::class);
        $this->call(NodeAccessSeeder::class);
        $this->call(BackgroundProcessSeeder::class);
     
      
    }
}
