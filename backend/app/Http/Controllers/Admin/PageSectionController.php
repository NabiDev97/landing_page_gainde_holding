<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function index()
    {
        $sections = PageSection::all();
        return view('admin.page_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.page_sections.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|unique:page_sections,key',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        PageSection::create($data);
        return redirect()->route('admin.page-sections.index')->with('success', 'Section créée.');
    }

    public function edit(PageSection $page_section)
    {
        return view('admin.page_sections.edit', ['section' => $page_section]);
    }

    public function update(Request $request, PageSection $page_section)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $page_section->update($data);
        return redirect()->route('admin.page-sections.index')->with('success', 'Section mise à jour.');
    }

    public function destroy(PageSection $page_section)
    {
        $page_section->delete();
        return redirect()->route('admin.page-sections.index')->with('success', 'Section supprimée.');
    }
}
