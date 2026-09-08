<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\PageSection;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(6)->get();
        $services = Service::latest()->take(6)->get();
        $members = TeamMember::take(4)->get();
        $testimonials = Testimonial::latest()->take(3)->get();

        $pageSections = PageSection::pluck('content','key')->toArray();

        return view('index', compact('projects','services','members','testimonials','pageSections'));
    }
}
