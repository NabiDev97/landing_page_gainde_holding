<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Post;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'projects' => Project::count(),
            'services' => Service::count(),
            'posts' => Post::count(),
            'users' => User::count(),
            'team' => TeamMember::count(),
            'testimonials' => Testimonial::count(),
        ];

        $latestProjects = Project::orderBy('created_at', 'desc')->limit(6)->get();

        return view('admin.dashboard', compact('counts', 'latestProjects'));
    }
}
