<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\About;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        // Get featured projects (e.g., latest 3)
        $featuredProjects = Project::latest()->take(3)->get();
        return view('home', compact('featuredProjects'));
    }

    public function about()
    {
        $about = About::first();
        $skills = Skill::all();
        $experiences = Experience::latest()->get();
        return view('about', compact('about', 'skills', 'experiences'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function showProject(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
