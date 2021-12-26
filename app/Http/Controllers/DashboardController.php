<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Teacher;
use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentinfo = Student::count();
        $admininfo = Admin::count();
        $teacherinfo = Teacher::count();
        $parentsinfo = StudentParent::count();
        $todos = Todo::all();
        return view('auth.admin.home', compact('studentinfo','admininfo','teacherinfo','parentsinfo','todos'));
    }

    //Storing new todos data to DB
    public function create_todo(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:20',
            'description' => 'required'
        ]);
        //dd(request()->all()); //show the form data
        $data = request()->all();
        $todo = new Todo();//$todo is a objet of Todo model,
        $todo -> name = $data['name']; // $todo -> name is db table name row
        $todo -> description = $data['description'];
        $todo -> completed = false; //inisilize to false
        $todo->save();

        return redirect()->back()->with('status', 'Admin user added successfully');
    }

    
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }
    //Updat the admin data
    public function update_todo(Request $request,$id)
    {
        $todo = Todo::find($id);

        $request->validate([
             'name' => 'required|min:6|max:20',
            'description' => 'required'
        ]);

        $todo->name = $request->name;
        $todo->userName = $request->description;
        $todo->email = false;
        
        $todo->save();

        return redirect()->back()->with('status', 'Todo updated successfully');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        
        $todo -> delete();

        return redirect()->back()->with('status', 'Deleted successfully');
    }
}
