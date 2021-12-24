<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // dologin and Logout function for Authentication with admin middleware
    public function dologin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:20',
        ],[
            'email.exists' => 'This email is not register into our system.'
        ]);
        $check = $request->only('email','password');
        if (Auth::guard('admin')->attempt($check)) {
            return redirect()->route('admin.home')->with('success','Welcome to Admin Dashboard.');
        }else{
            return redirect()->back()->with('error','Login failed.');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    // ! dologin and Logout function



// showing admin users data
    public function show()
    {
        $admins = Admin::all();
        return view('admin.show', compact('admins'));
    }
//Addming new Admin form view
    public function create()
    {
        return view('admin.create');
    }
    //Storing new admin users data to DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'password' => 'required|min:6|max:20',
            'cpassword' => 'required',
            'cpassword' => 'required|same:password',
            'address' => 'required|max:40'
        ],[
            'email.unique' => 'The email already register.',
            'cpassword.required' => 'The Confirm password field is required.',
            'cpassword.same' => 'The confirm password and password must match.'
        ]);
        $adminUser = new Admin();

        $adminUser->name = $request->name;
        $adminUser->username = $request->username;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->password = Hash::make($request->password);
        $adminUser->address = $request->address;

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/admins/',$filename);
            
            $adminUser->profile_image = $filename;
        }
        $adminUser->save();

        return redirect('admin/adminUsers')->with('status', 'Admin user added successfully');
    }
    //showing Editing Admin form with db data
    public function edit($id)
    {
        $adminUser = Admin::find($id);

        return view('admin.edit', compact('adminUser'));
    }
    //Updat the admin data
    public function update(Request $request,$id)
    {
        $adminUser = Admin::find($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6|max:20',
            'cpassword' => 'required',
            'cpassword' => 'required|same:password',
            'address' => 'required|max:40'
        ],[
            'email.unique' => 'The email already register.',
            'cpassword.required' => 'The Confirm password field is required.',
            'cpassword.same' => 'The confirm password and password must match.'
        ]);

        $adminUser->name = $request->name;
        $adminUser->userName = $request->username;
        $adminUser->email = $request->email;
        $adminUser->phone = $request->phone;
        $adminUser->password = Hash::make($request->password);
        $adminUser->address = $request->address;

        if ($request->hasFile('profile_image'))
        {
            $destination = 'uploads/admins/'.$adminUser->profile_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/admins/',$filename);
            
            $adminUser->profile_image = $filename;
        }
        $adminUser->save();

        return redirect('admin/adminUsers')->with('status', 'Admin user added successfully');
    }
    // Delete the admin
    public function destroy($id)
    {
        $adminUser = Admin::find($id);
        $destination = 'uploads/admins/'.$adminUser->profile_image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $adminUser -> delete();
        return redirect()->back()->with('status', 'Parents Deleted successfully');
    }
}
