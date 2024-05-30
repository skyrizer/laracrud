<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NodeService;


class NodeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NodeService::factory()->create([
            'node_id' => '1',
            'service_id' => '1',
        ]);

        NodeService::factory()->create([
            'node_id' => '1',
            'service_id' => '2',
        ]);

        NodeService::factory()->create([
            'node_id' => '1',
            'service_id' => '3',
        ]);
    }
}
