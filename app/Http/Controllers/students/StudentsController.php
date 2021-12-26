<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Student;
=======
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
>>>>>>> 184f23f (Course & subject relationonal db create, edit, Update)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    // showing admin users data
    public function show()
    {
        $students = Student::all();
        return view('students.show', compact('students'));
    }
//Addming new student form view
    public function create()
    {
        return view('students.create');
        $course_for_registration = Course::all();
        $subjects_for_registration =Subject::all();

        return view('students.create', compact('course_for_registration'));
    }
    //Storing new admin users data to DB
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'last_name' => 'required',
            'roll_id' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'address' => 'required|max:50'
        ],[
            'email.unique' => 'The email already register.',
        ]);
        $students = new Student();

        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->roll_id = $request->roll_id;
        $students->email = $request->email;
        $students->gender = $request->gender;
        $students->date_of_birth = $request->date_of_birth;
        $students->phone = $request->phone;
        $students->address = $request->address;
        $students->password = Hash::make($request->roll_id);
        $students->address = $request->address;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/',$filename);
            $students->profile_picture = $filename;
        }
        $students->save();

        return redirect('admin/student')->with('status', 'New student registered successfully');
    }
    //showing Editing Admin form with db data
    public function edit($id)
    {
        $students = Student::find($id);

        return view('students.edit', compact('students'));
    }
    //Updat the admin data
    public function update(Request $request,$id)
    {
        $students = Student::find($id);

        $request->validate([
            'last_name' => 'required',
            'last_name' => 'required',
            'roll_id' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'address' => 'required|max:50'
        ],[
            'email.unique' => 'The email already register.',
        ]);

        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->roll_id = $request->roll_id;
        $students->email = $request->email;
        $students->gender = $request->gender;
        $students->date_of_birth = $request->date_of_birth;
        $students->phone = $request->phone;
        $students->address = $request->address;
        $students->password = Hash::make($request->roll_id);
        $students->address = $request->address;


        if ($request->hasFile('profile_picture'))
        {
            $destination = 'uploads/students/'.$students->profile_picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/',$filename);
            $students->profile_picture = $filename;
        }
        $students->save();

        return redirect('admin/student')->with('status', 'Student Updated successfully');
    }
    // Delete the admin
    public function destroy($id)
    {
        $students = Student::find($id);
        $destination = 'uploads/students/'.$students->profile_picture;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $students -> delete();
        return redirect('admin/student')->with('status', 'Student Deleted successfully');
    }
}
