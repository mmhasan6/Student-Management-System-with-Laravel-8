<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSchedule;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\SParentController;
use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInfoController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
return view('welcome');
});

Auth::routes();

// Admin Routes
Route::prefix('/admin')->name('admin.')->group(function(){
Route::middleware(['guest:admin'])->group(function(){
		Route::view('/login','auth.admin.login')->name('login');
		Route::post('/dologin',[AdminController::class,'dologin'])->name('dologin');
});
Route::middleware(['auth:admin'])->group(function(){
		//Route::view('/','auth.admin.home')->name('home');
		Route::post('/logout',[AdminController::class,'logout'])->name('logout');

//Routes for users
		Route::view('/users','dashboard.users')->name('users'); //need to check
		Route::post('/addNewAdmin', [AdminController::class,'create'])->name('addNewAdmin');


// Routes for Students parrents image CRUD
		Route::get('parents', [SParentController::class, 'index'])->name('parents');
		Route::get('add-parents', [SParentController::class, 'create']);
		Route::post('add-parents', [SParentController::class,'store'])->name('add-parents');
		Route::get('edit-parents/{id}', [SParentController::class, 'edit']);
		Route::put('update-parents/{id}',[SParentController::class, 'update']);
		Route::get('delete_data/{id}',[SParentController::class, 'destroy']);

// Routes for Admin users
		Route::get('adminUsers', [AdminController::class, 'show'])->name('adminUsers');
		Route::get('add-admin-user', [AdminController::class, 'create']);
		Route::post('add-new-admin', [AdminController::class, 'store'])->name('add-new-admin');
		Route::get('edit-admin/{id}', [AdminController::class, 'edit']);
		Route::put('update-admin/{id}',[AdminController::class, 'update']);
		Route::get('delete_admin_data/{id}',[AdminController::class, 'destroy']);

// Routes for Students
		Route::get('student', [StudentsController::class, 'show'])->name('student');
		Route::get('add-new-student', [StudentsController::class, 'create']);
		Route::post('add-new-student', [StudentsController::class, 'store'])->name('add-new-student');
		Route::get('edit-student/{id}', [StudentsController::class, 'edit']);
		Route::put('update-student/{id}',[StudentsController::class, 'update']);
		Route::get('delete_student_data/{id}',[StudentsController::class, 'destroy']);

// Routes for teachers
		Route::get('teachers', [TeacherController::class, 'show'])->name('teachers');
		Route::get('add-new-teachers', [TeacherController::class, 'create']);
		Route::post('add-new-teachers', [TeacherController::class, 'store'])->name('add-new-teachers');
		Route::get('edit-teachers/{id}', [TeacherController::class, 'edit']);
		Route::put('update-teachers/{id}',[TeacherController::class, 'update']);
		Route::get('delete_teachers_data/{id}',[TeacherController::class, 'destroy']);

//information
			Route::get('informations', [UserInfoController::class, 'info'])->name('informations');
//Dashboard info
		Route::get('/', [DashboardController::class, 'index'])->name('home');
		Route::post('add_new_todos', [DashboardController::class, 'create_todo'])->name('add_new_todos');
		Route::put('update-todo/{id}',[DashboardController::class, 'update_todo']);
		Route::get('delete_todo/{id}', [DashboardController::class, 'destroy']);


// Courses
		Route::get('courses', [CourseController::class, 'show'])->name('courses');
		Route::post('add_new_course', [CourseController::class, 'create_course'])->name('add_new_course');
		Route::get('edit_course/{id}', [CourseController::class, 'course_edit']);
		Route::put('update_course/{id}',[CourseController::class, 'course_update']);
		Route::get('delete_course_data/{id}',[CourseController::class, 'destroy']);

// subjects
		Route::get('subjects', [SubjectsController::class, 'show'])->name('subjects');
<<<<<<< HEAD
		Route::post('add_new_subjects', [SubjectsController::class, 'create_csubjects'])->name('add_new_subjects');
=======
		Route::post('add_new_subjects', [SubjectsController::class, 'create_subjects'])->name('add_new_subjects');
>>>>>>> 184f23f (Course & subject relationonal db create, edit, Update)
		Route::get('edit_subjects/{id}', [SubjectsController::class, 'subjects_edit']);
		Route::put('update_subjects/{id}',[SubjectsController::class, 'subjects_update']);
		Route::get('delete_subjects_data/{id}',[SubjectsController::class, 'destroy']);




});

});


// User Routes
		Route::prefix('/user')->name('user.')->group(function(){
		Route::middleware(['guest:web'])->group(function(){
		Route::view('/login','auth.user.login')->name('login');
		Route::view('/register','auth.user.register')->name('register');
		Route::post('/create', [UserController::class,'create'])->name('create');
		Route::post('/dologin',[UserController::class,'dologin'])->name('dologin');
});
Route::middleware(['auth:web'])->group(function(){
		Route::view('/home','auth.user.home')->name('home');
		Route::post('/logout',[UserController::class,'logout'])->name('logout');
});
});
