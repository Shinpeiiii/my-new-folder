<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('section')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $sections = Section::orderBy('name')->pluck('name','id');
        return view('students.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required','max:100'],
            'last_name'  => ['required','max:100'],
            'email'      => ['required','email','max:150','unique:students,email'],
            'section_id' => ['required','exists:sections,id'],
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        $student->load('section');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $sections = Section::orderBy('name')->pluck('name','id');
        return view('students.edit', compact('student','sections'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => ['required','max:100'],
            'last_name'  => ['required','max:100'],
            'email'      => ['required','email','max:150',"unique:students,email,{$student->id}"],
            'section_id' => ['required','exists:sections,id'],
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
