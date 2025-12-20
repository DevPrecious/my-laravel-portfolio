<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;


// Public Portfolio Routes
Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project}', [PortfolioController::class, 'showProject'])->name('projects.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
 
// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // About & Skills
    Route::get('/about', [AdminController::class, 'editAbout'])->name('about.edit');
    Route::put('/about', [AdminController::class, 'updateAbout'])->name('about.update');
    Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skills.store');
    Route::delete('/skills/{skill}', [AdminController::class, 'destroySkill'])->name('skills.destroy');
    Route::post('/experiences', [AdminController::class, 'storeExperience'])->name('experiences.store');
    Route::delete('/experiences/{experience}', [AdminController::class, 'destroyExperience'])->name('experiences.destroy');

    // Projects
    Route::get('/projects/create', [AdminController::class, 'create'])->name('projects.create');
    Route::post('/projects', [AdminController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'destroy'])->name('projects.destroy');

    // Blog Posts
    Route::resource('posts', AdminPostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

