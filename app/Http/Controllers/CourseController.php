<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show()
    {
        $courses = Course::all();
        return view('course.show', compact('courses'));
    }

    //Storing new todos data to DB
    public function create_course(Request $request)
    {
        $request->validate([
            'course_short_name' => 'required|min:2|max:20',
            'course_full_name' => 'required'
        ]);
        $courses = new Course();

        $courses -> course_short_name = $request->course_short_name;
        $courses -> course_full_name = $request->course_full_name;
        $courses -> created_at = now();

        $courses->save();
        return redirect('admin/courses')->with('status', 'Admin user added successfully');
    }

     //showing Editing Admin form with db data
    public function course_edit($id)
    {
        $courses = Course::find($id);

        return view('course.edit', compact('courses'));
    }
    //Updat the admin data
    public function course_update(Request $request,$id)
    {
        $courses = Course::find($id);

        $request->validate([
            'course_short_name' => 'required|min:2|max:20',
            'course_full_name' => 'required'
        ]);

        $courses -> course_short_name = $request->course_short_name; 
        $courses -> course_full_name = $request->course_full_name;


        $courses->save();

        return redirect('admin/courses')->with('status', 'Course Updated successfully');
    }
    // Delete the admin
    public function destroy($id)
    {
        $teachers = Course::find($id);
        $teachers -> delete();
        return redirect('admin/courses')->with('status', 'Course Deleted successfully');
    }
}
