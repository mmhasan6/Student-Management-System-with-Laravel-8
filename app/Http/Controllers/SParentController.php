<?php

namespace App\Http\Controllers;

use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SParentController extends Controller
{
    public function index()
    {
        $parents = StudentParent::all();

        return view('parents.index', compact('parents'));
    }
    public function create()
    {
        return view('parents.create');
    }
    public function store(Request $request)
    {
        $parents = new StudentParent();
        $parents->name = $request->name;
        $parents->username = $request->username;
        $parents->email = $request->email;
        $parents->phone = $request->phone;
        $parents->password = $request->password;
        $parents->address = $request->address;

        // $parents->name = $request->profile_image;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/parents/',$filename);
            
            $parents->profile_image = $filename;
        }
        $parents->save();

        return redirect()->back()->with('status', 'Parents imgae added successfully');
    }
    public function edit($id)
    {
        $parents = StudentParent::find($id);

        return view('parents.edit', compact('parents'));
    }
    public function update(Request $request,$id)
    {
        $parents = StudentParent::find($id);
        $parents->name = $request->name;
        $parents->username = $request->username;
        $parents->email = $request->email;
        $parents->phone = $request->phone;
        $parents->password = $request->password;
        $parents->address = $request->address;

        // $parents->name = $request->profile_image;
        if ($request->hasFile('profile_image')) {

            $destination = 'uploads/parents/'.$parents->profile_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/parents/',$filename);
            
            $parents->profile_image = $filename;
        }
        $parents->update();

        return redirect()->back()->with('status', 'Parents imgae updated successfully');
    }

    public function destroy($id)
    {
        $parents = StudentParent::find($id);
        $destination = 'uploads/parents/'.$parents->profile_image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $parents -> delete();
        return redirect()->back()->with('status', 'Parents Deleted successfully');
    }
}
