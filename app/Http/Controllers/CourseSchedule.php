<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class CourseSchedule extends Controller
{
    public function index()
    {
        // $course = Student::join('courese_student','courese_student.student_id', '=', 'students.id')
        //             ->join('courese_student', 'courese_student.course_schedule_id', '=', 'course_scheduled.id')
        //             ->join('course_scheduled','course_scheduled.course_offer_id', '=', 'course_offered.id')
        //             ->get(['students.first_name','students.last_name','students.roll_id','course_scheduled.course_offer_id','course_offered.name']);

$course = "SELECT 'students.first_name','students.last_name','students.roll_id', 'course_scheduled.id','course_offered.name'
FROM students 
INNER JOIN courese_student ON students.id=courese_student.student_id
INNER JOIN course_scheduled ON course_scheduled.id=courese_student.course_schedule_id
INNER JOIN course_offered ON course_offered.id=course_scheduled.course_offer_id";

        return view('course.courses', compact('course'));
    }
}
