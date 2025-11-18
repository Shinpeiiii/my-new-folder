<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;

Route::get('/', fn () => redirect()->route('students.index'));

Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);
