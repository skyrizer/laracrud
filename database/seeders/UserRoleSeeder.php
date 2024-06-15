<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserRole::firstOrCreate(['role' => 'admin']);
        UserRole::firstOrCreate(['role' => 'devops']);
        UserRole::firstOrCreate(['role' => 'management']);
        
    }
}
