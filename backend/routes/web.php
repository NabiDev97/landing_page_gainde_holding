<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PageSectionController as AdminPageSectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Front\HomeController as FrontHomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/', [FrontHomeController::class, 'index'])->name('home');

// Static pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/quote', 'quote')->name('quote');
Route::view('/detail', 'detail')->name('detail');

// Public resource routes (read-only)
use App\Http\Controllers\Front\ProjectController as FrontProjectController;
use App\Http\Controllers\Front\ServiceController as FrontServiceController;

Route::get('/projects', [FrontProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [FrontProjectController::class, 'show'])->name('projects.show');
Route::get('/services', [FrontServiceController::class, 'index'])->name('services.index');
use App\Http\Controllers\Front\TeamController as FrontTeamController;
use App\Http\Controllers\Front\TestimonialController as FrontTestimonialController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;

Route::get('/team', [FrontTeamController::class, 'index'])->name('team.index');
Route::get('/testimonials', [FrontTestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/blog', [FrontBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [FrontBlogController::class, 'show'])->name('blog.show');

// Contact form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return app(\App\Http\Controllers\Admin\DashboardController::class)->index();
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin CRUD routes (protected by is_admin middleware)
    Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', AdminProjectController::class);
        Route::resource('services', AdminServiceController::class);
        Route::resource('testimonials', AdminTestimonialController::class);
        Route::resource('team-members', AdminTeamMemberController::class);
        Route::resource('posts', AdminPostController::class);
        Route::resource('page-sections', AdminPageSectionController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index','create','store','edit','update','destroy']);
    });
});

require __DIR__.'/auth.php';

// Temporary route to create an admin user in environments without shell access.
// Usage: visit /setup-admin?secret=LONG_SECRET&email=admin@example.com&password=YourP@ss
Route::get('/setup-admin', function (Request $request) {
    $secret = env('ADMIN_SETUP_SECRET');
    if (empty($secret) || $request->query('secret') !== $secret) {
        abort(403, 'Forbidden');
    }

    $email = $request->query('email', env('ADMIN_EMAIL', 'admin@example.com'));
    $password = $request->query('password', env('ADMIN_PASSWORD', null));
    if (empty($password)) {
        return response()->json(['error' => 'Password required via ADMIN_PASSWORD env or ?password=...'], 400);
    }

    $userModel = \App\Models\User::updateOrCreate(
        ['email' => $email],
        [
            'name' => 'Administrateur',
            'password' => Hash::make($password),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]
    );

    return response()->json(['status' => 'ok', 'email' => $userModel->email]);
});
