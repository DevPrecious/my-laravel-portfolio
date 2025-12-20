<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A full-featured e-commerce solution built with Laravel and Vue.js. Includes payment processing, order management, and a custom admin dashboard.',
            'image_url' => 'https://placehold.co/600x400/1f2937/white?text=E-Commerce',
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com',
            'tags' => ['Laravel', 'Vue.js', 'Stripe', 'MySQL'],
        ]);

        Project::create([
            'title' => 'Task Management App',
            'description' => 'A productivity tool for teams to manage tasks and projects. Features real-time updates using WebSockets and a drag-and-drop interface.',
            'image_url' => 'https://placehold.co/600x400/1f2937/white?text=Task+App',
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com',
            'tags' => ['Laravel', 'Livewire', 'Alpine.js', 'Tailwind CSS'],
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'A personal portfolio website to showcase projects and skills. Built with Laravel and Tailwind CSS, featuring a clean and responsive design.',
            'image_url' => 'https://placehold.co/600x400/1f2937/white?text=Portfolio',
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com',
            'tags' => ['Laravel', 'Tailwind CSS', 'Blade'],
        ]);
        
        Project::create([
            'title' => 'API Gateway Service',
            'description' => 'A microservices API gateway handling authentication, rate limiting, and request routing. Built for high performance and scalability.',
            'image_url' => 'https://placehold.co/600x400/1f2937/white?text=API+Gateway',
            'project_url' => null,
            'github_url' => 'https://github.com',
            'tags' => ['PHP', 'Lumen', 'Redis', 'Docker'],
        ]);
    }
}
