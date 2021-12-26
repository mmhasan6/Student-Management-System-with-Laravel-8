<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function create(Request $request) // register form validation and insert data
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'cpassword' => 'required|same:password'
        ],[
            'email.unique' => 'The email already register.',
            'cpassword.required' => 'The Confirm password field is required.',
            'cpassword.same' => 'The confirm password and password must match.'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $data = $user->save();
        if($data){
            return redirect()->back()->with('success','You have register successfully.');
        }else{
            return redirect()->back()->with('error','Registration failed.');
        }
    }
    public function dologin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);
        $check = $request->only('email','password');
        if (Auth::guard('web')->attempt($check)) {
            return redirect()->route('user.home')->with('success','Welcome to dashboard.');
        }else{
            return redirect()->back()->with('error','Login failed.');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
