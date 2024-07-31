<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'MySQL',
            'start_command_linux' => 'sudo service mysql start',
            'start_command_windows' => 'net start MySQL',
        ]);

        Service::create([
            'name' => 'Apache',
            'start_command_linux' => 'sudo service apache2 start',
            'start_command_windows' => 'net start Apache2.4',
        ]);

        Service::create([
            'name' => 'Tomcat',
            'start_command_linux' => 'sudo service tomcat9 start',
            'start_command_windows' => 'net start Tomcat9',
        ]);

        Service::create([
            'name' => 'Docker',
            'start_command_linux' => 'sudo service docker start',
            'start_command_windows' => 'net start Docker',
        ]);
    }
}
