<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\StudentController;

// Authentication Routes
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/students', [StudentController::class, 'index'])->name('students.index');  // List Students
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');  // Show Create Form
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');  // Store New Student
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');  // Show Edit Form
Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');  // Update Student // Update Student
Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');  // Soft Delete Student

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
