<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Teacher;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function info()
    {
        $studentinfo = Student::all();
        $admininfo = Admin::all();
        $teacherinfo = Teacher::all();
        $parentsinfo = StudentParent::all();
        return view('informations', compact('studentinfo','admininfo','teacherinfo','parentsinfo'));
    }
}
