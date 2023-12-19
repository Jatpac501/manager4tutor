<?php

use App\Http\Controllers\TutorController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('subject', 'subjects')
    ->middleware(['auth', 'verified'])
    ->name('subjects');

Route::resource('subjects', SubjectController::class);
Route::resource('tutors', TutorController::class);
Route::resource('timetable', TimetableController::class)->middleware(['auth']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
