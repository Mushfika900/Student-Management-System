<?php

namespace App\Http\Controllers;

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
}
