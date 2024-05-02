<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Node;


class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Node::factory()->create([
            'hostname' => 'DGOWafir',
            'ip_address' => '128.199.194.23',
        ]);

        Node::factory()->create([
            'hostname' => 'LAPTOP-M9LTAKNR',
            'ip_address' => '192.168.0.115',
        ]);
    
    }
}
