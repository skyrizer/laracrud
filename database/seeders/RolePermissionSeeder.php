<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RolePermission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RolePermission::firstOrCreate([
            'role_id' => '1',
            'permission_id' => '2'
        ]);
        RolePermission::firstOrCreate([
            'role_id' => '2',
            'permission_id' => '1'
        ]);

    }
}
