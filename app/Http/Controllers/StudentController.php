<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $students = Student::query()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        })
        ->get();

    return view('students', compact('students'));
}
    
    public function create()
    {
        return View('create_student');
    }
    public function store(Request $request){
    $validated = $request->validate([
       'name'=> 'required|string|max:255',
       'email'=> 'required|email|unique:students,email',
       'phone' => 'required|string|max:20',
    ]);
    Student::create($validated);
    return redirect('/students')
    ->with('success','Student added successfully!');
    }
    public function edit(Student $student)
    {
        return View('edit_student',compact('student'));
    }

    public function update(Request $request, Student $student)
   {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:20',
    ]);

    $student->update($validated);

    return redirect('/students')
        ->with('success', 'Student updated successfully!');
}

public function destroy(Student $student){
$student->delete();
return redirect()->route('students.index')->with('success','Student deleted successfully');
}
}
        