<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index()
    {
        return View('students');
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
    ->with('success','Stusent added successfully!');
    }
}
