<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    // showing admin users data
    public function show()
    {
        $teachers = Teacher::all();
        return view('teachers.show', compact('teachers'));
    }
//Addming new student form view
    public function create()
    {
        return view('teachers.create');
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
        $teachers = new Teacher();

        $teachers->first_name = $request->first_name;
        $teachers->last_name = $request->last_name;
        $teachers->roll_id = $request->roll_id;
        $teachers->email = $request->email;
        $teachers->gender = $request->gender;
        $teachers->date_of_birth = $request->date_of_birth;
        $teachers->phone = $request->phone;
        $teachers->address = $request->address;
        $teachers->password = Hash::make($request->roll_id);
        $teachers->address = $request->address;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/teachers/',$filename);
            
            $teachers->profile_picture = $filename;
        }
        $teachers->save();

        return redirect('admin/teachers')->with('status', 'New teacher registered successfully');
    }
    //showing Editing Admin form with db data
    public function edit($id)
    {
        $teachers = Teacher::find($id);

        return view('teachers.edit', compact('teachers'));
    }
    //Updat the admin data
    public function update(Request $request,$id)
    {
        $teachers = Teacher::find($id);

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

        $teachers->first_name = $request->first_name;
        $teachers->last_name = $request->last_name;
        $teachers->roll_id = $request->roll_id;
        $teachers->email = $request->email;
        $teachers->gender = $request->gender;
        $teachers->date_of_birth = $request->date_of_birth;
        $teachers->phone = $request->phone;
        $teachers->address = $request->address;
        $teachers->password = Hash::make($request->roll_id);
        $teachers->address = $request->address;


        if ($request->hasFile('profile_picture'))
        {
            $destination = 'uploads/teachers/'.$teachers->profile_picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/teachers/',$filename);
            
            $teachers->profile_picture = $filename;
        }
        $teachers->save();

        return redirect('admin/teachers')->with('status', 'teacher data Updated successfully');
    }
    // Delete the admin
    public function destroy($id)
    {
        $teachers = Teacher::find($id);
        $destination = 'uploads/students/'.$teachers->profile_picture;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $teachers -> delete();
        return redirect('admin/teachers')->with('status', 'teachers Deleted successfully');
    }
}
