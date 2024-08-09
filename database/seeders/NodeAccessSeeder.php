<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NodeAccess;


class NodeAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        NodeAccess::factory()->create([
            'role_id' => '1',
            'user_id' => '1',
            'node_id' => '2',
        ]);

        NodeAccess::factory()->create([
            'role_id' => '2',
            'user_id' => '2',
            'node_id' => '2',
        ]);

        NodeAccess::factory()->create([
            'role_id' => '3',
            'user_id' => '3',
            'node_id' => '2',
        ]);
    }
}
