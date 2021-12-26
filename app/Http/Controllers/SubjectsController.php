<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectsController extends Controller
{
  public function show()
  {

    $subjects = DB::table('courses')
    ->join('subjects', 'courses.id', '=', 'subjects.course_id')
    ->select('subjects.*', 'courses.*')
    ->get();
    $course_for_add_new_subjects = Course::all();

    return view('subjects.show', compact('subjects', 'course_for_add_new_subjects'));
  }

  //Storing new todos data to DB
  public function create_subjects(Request $request)
  {
    $request->validate([
      'course_short_name_id' => 'required',
      'course_full_name_id' => 'required|same:course_short_name_id',
      'Subject1' => 'required',
      'Subject2' => 'required',
      'Subject3' => 'required'
    ]);

    $subjects = new Subject();

    $subjects->course_id = $request->course_short_name_id;
    $subjects->Subject1 = $request->Subject1;
    $subjects->Subject2 = $request->Subject1;
    $subjects->Subject3 = $request->Subject3;
    $subjects->created_at = now();

    $subjects->save();
    return redirect('admin/subjects')->with('status', 'Subjects added successfully');
    // return redirect()->back()->with('status', 'Admin user added successfully');
  }


  //showing Editing Admin form with db data
  public function subjects_edit($id)
  {
    $subjects = Subject::find($id);

    return view('subjects.edit', compact('subjects'));
  }
  //Updat the admin data
  public function subjects_update(Request $request, $id)
  {
    $subjects = Subject::find($id);

    $request->validate([
      'course_short_name' => 'required|min:2|max:20',
      'course_full_name' => 'required'
    ]);

    $subjects->course_short_name = $request->course_short_name;
    $subjects->course_full_name = $request->course_full_name;


    $subjects->save();

    return redirect('admin/subjects')->with('status', 'Course Updated successfully');
  }
  // Delete the admin
  public function destroy($id)
  {
    $subjects = Subject::find($id);

    $subjects->delete();
    return redirect('admin/courses')->with('status', 'Course Deleted successfully');
  }
}
