<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NodeConfig;


class NodeConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NodeConfig::factory()->create([
            'config_id' => 1,
            'node_id' => 2,
            'value' => '10'
        ]);
    
    }
}
