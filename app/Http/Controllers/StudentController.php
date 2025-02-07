<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('teacher')->paginate(10);
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);
    
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }
    
    public function edit($id)
{
    $student = Student::findOrFail($id);
    $teachers = Teacher::all();
    return view('students.edit', compact('student', 'teachers'));
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->update($request->all());
    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student soft deleted successfully');
}

    
}
