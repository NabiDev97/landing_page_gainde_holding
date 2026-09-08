<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::all();
        return view('team.index', compact('members'));
    }
}
