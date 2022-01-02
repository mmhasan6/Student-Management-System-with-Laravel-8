<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SParentController extends Controller
{
    public function index()
    {
        $parents = StudentParent::all();

        $students_for_registration = Student::all();

        return view('parents.index', compact('parents','students_for_registration'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'address' => 'required|max:50',
            'profile_picture' => 'required'
        ],[
            'email.unique' => 'The email already register.',
        ]);

        $parents = new StudentParent();
        $parents->first_name = $request->first_name;
        $parents->last_name = $request->last_name;
        $parents->email = $request->email;
        $parents->phone = $request->phone;
        $parents->gender = $request->gender;
        $parents->date_of_birth = $request->date_of_birth;
        $parents->password = Hash::make($request->first_name);
        $parents->address = $request->address;
        $parents->student_id = $request->student_id;

        //  $parents->profile_picture = $request->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/parents/',$filename);
            
            $parents->profile_picture = $filename;
        }
        $parents->save();

        return redirect('admin/parents')->with('status', 'Parents added successfully');
    }
    public function edit($id)
    {
        $parents = StudentParent::find($id);
        $students_for_registration = Student::all();

        return view('parents.edit', compact('parents','students_for_registration'));
    }
    public function update(Request $request,$id)
    {
        $parents = StudentParent::find($id);
        $parents->first_name = $request->first_name;
        $parents->last_name = $request->last_name;
        $parents->email = $request->email;
        $parents->phone = $request->phone;
        $parents->gender = $request->gender;
        $parents->date_of_birth = $request->date_of_birth;
        $parents->password = Hash::make($request->first_name);
        $parents->address = $request->address;
        $parents->student_id = $request->student_id;


        // $parents->name = $request->profile_image;
        if ($request->hasFile('profile_picture')) {

            $destination = 'uploads/parents/'.$parents->profile_picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/parents/',$filename);
            
            $parents->profile_picture = $filename;
        }
        $parents->update();

        return redirect('admin/parents')->with('status', 'updated successfully');
    }

    public function destroy($id)
    {
        $parents = StudentParent::find($id);
        $destination = 'uploads/parents/'.$parents->profile_picture;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $parents -> delete();
        return redirect()->back()->with('status', 'Data Deleted successfully');
    }
}
