<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\About;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.dashboard', compact('projects'));
    }

    // About & Skills Management
    public function editAbout()
    {
        $about = About::first();
        $skills = Skill::all();
        $experiences = Experience::latest()->get();
        return view('admin.about.edit', compact('about', 'skills', 'experiences'));
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'bio' => 'required|string',
        ]);

        $about = About::first();
        if (!$about) {
            $about = new About();
        }
        $about->bio = $validated['bio'];
        $about->save();

        return redirect()->route('admin.about.edit')->with('success', 'About section updated successfully.');
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.about.edit')->with('success', 'Skill added successfully.');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.about.edit')->with('success', 'Skill deleted successfully.');
    }

    public function storeExperience(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Experience::create($validated);

        return redirect()->route('admin.about.edit')->with('success', 'Experience added successfully.');
    }

    public function destroyExperience(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.about.edit')->with('success', 'Experience deleted successfully.');
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'tags' => 'nullable|string', // We'll accept comma separated tags
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        // Remove 'image' from validated array as it's not a column
        unset($validated['image']);

        Project::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        } else {
            $validated['tags'] = null;
        }

        unset($validated['image']);

        $project->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully.');
    }
}
