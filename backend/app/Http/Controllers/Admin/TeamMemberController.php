<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = TeamMember::latest()->paginate(10);
        return view('admin.team_members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team_members', 'public');
        }
        if (!empty($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }
        TeamMember::create($data);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        return view('admin.team_members.show', ['member' => $teamMember]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team_members.edit', ['member' => $teamMember]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $data['photo'] = $request->file('photo')->store('team_members', 'public');
        }
        if (!empty($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }
        $teamMember->update($data);
        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }
        $teamMember->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted.');
    }
}
