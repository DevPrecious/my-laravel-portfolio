<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\About::create([
            'bio' => '<p><span class="text-white font-bold">DevPrecious</span> is a highly capable software developer utility designed to build efficient, scalable, and user-friendly web applications. Initialized with a strong curiosity for internet protocols, it has evolved into a robust tool for solving complex problems.</p>',
        ]);

        $skills = [
            'PHP / Laravel',
            'JavaScript / Vue',
            'Tailwind CSS',
            'MySQL / Redis',
            'Docker / Git',
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::create(['name' => $skill]);
        }
    }
}
