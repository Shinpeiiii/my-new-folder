<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::withCount('students')->orderBy('name')->paginate(10);
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','max:100','unique:sections,name'],
            'room' => ['nullable','max:50'],
        ]);

        Section::create($validated);
        return redirect()->route('sections.index')->with('success', 'Section created.');
    }

    public function show(Section $section)
    {
        $section->load('students');
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'name' => ['required','max:100',"unique:sections,name,{$section->id}"],
            'room' => ['nullable','max:50'],
        ]);

        $section->update($validated);
        return redirect()->route('sections.index')->with('success', 'Section updated.');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted.');
    }
}
