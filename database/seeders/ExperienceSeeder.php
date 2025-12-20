<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Experience::create([
            'role' => 'Senior Developer',
            'company' => 'Tech Company Inc.',
            'period' => '2023 - Present',
            'description' => '> Leading development team<br>> Architecting scalable solutions<br>> Code review and optimization',
        ]);

        \App\Models\Experience::create([
            'role' => 'Web Developer',
            'company' => 'Digital Agency',
            'period' => '2021 - 2023',
            'description' => '> Developed custom e-commerce platforms<br>> Client requirement analysis<br>> Database design and implementation',
        ]);
    }
}
