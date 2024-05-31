<?php

namespace Database\Seeders;

use App\Models\BackgroundProcess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackgroundProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BackgroundProcess::factory()->create([
            'name' => 'mysqld.exe',
            'service_id' => '1',
        ]);

        BackgroundProcess::factory()->create([
            'name' => 'mysql',
            'service_id' => '1',
        ]);

        BackgroundProcess::factory()->create([
            'name' => 'httpd.exe',
            'service_id' => '2',
        ]);

        BackgroundProcess::factory()->create([
            'name' => 'httpd',
            'service_id' => '2',
        ]);
        
        BackgroundProcess::factory()->create([
            'name' => 'tomcat.exe',
            'service_id' => '3',
        ]);

        BackgroundProcess::factory()->create([
            'name' => 'tomcat',
            'service_id' => '3',
        ]);
    }
}
