<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

//use App\Http\Controllers\InstitutController;
//use App\Http\Controllers\GroupController;
//use App\Http\Controllers\TrainingDirectionController;
//use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PracticePlaceController;
//use App\Http\Controllers\PracticeStudentController;
use App\Http\Controllers\TroublesController;
//use App\Http\Controllers\TraitsController;
//use App\Http\Controllers\ReprimandController;
//use App\Http\Controllers\TaskController;
use App\Http\Controllers\VolumeController;


// InstitutController routes
//Route::get('/institutes', [InstitutController::class, 'index'])->name('Institut.index');
//Route::get('/institutes/{id}', [InstitutController::class, 'show'])->name('Institut.show');
//Route::post('/institutes', [InstitutController::class, 'store'])->name('Institut.store');
//Route::put('/institutes/{id}', [InstitutController::class, 'update'])->name('Institut.update');
//Route::delete('/institutes/{id}', [InstitutController::class, 'destroy'])->name('Institut.destroy');

// GroupController routes
//Route::get('/groups', [GroupController::class, 'index'])->name('Group.');
//Route::get('/groups/{id}', [GroupController::class, 'show'])->name('Group.show');
//Route::post('/groups', [GroupController::class, 'store'])->name('Group.store');
//Route::put('/groups/{id}', [GroupController::class, 'update'])->name('Group.update');
//Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('Group.destroy');

// TrainingDirectionController routes
//Route::get('/training-directions', [TrainingDirectionController::class, 'index'])->name('TrainingDirection.index');
//Route::get('/training-directions/{id}', [TrainingDirectionController::class, 'show'])->name('TrainingDirection.show');
//Route::post('/training-directions', [TrainingDirectionController::class, 'store'])->name('TrainingDirection.store');
//Route::put('/training-directions/{id}', [TrainingDirectionController::class, 'update'])->name('TrainingDirection.update');
//Route::delete('/training-directions/{id}', [TrainingDirectionController::class, 'destroy'])->name('TrainingDirection.destroy');

// PracticeController routes
//Route::get('/practices', [PracticeController::class, 'index'])->name('Practice.index');
//Route::get('/practices/{id}', [PracticeController::class, 'show'])->name('Practice.show');
//Route::post('/practices', [PracticeController::class, 'store'])->name('Practice.store');
//Route::put('/practices/{id}', [PracticeController::class, 'update'])->name('Practice.update');
//Route::delete('/practices/{id}', [PracticeController::class, 'destroy'])->name('Practice.destroy');

// PracticePlaceController routes
Route::get('/practice-places', [PracticePlaceController::class, 'index'])->name('PracticePlace.index');
Route::get('/practice-places/{id}', [PracticePlaceController::class, 'show'])->name('PracticePlace.show');
Route::post('/practice-places', [PracticePlaceController::class, 'store'])->name('PracticePlace.store');
Route::put('/practice-places/{id}', [PracticePlaceController::class, 'update'])->name('PracticePlace.update');
Route::delete('/practice-places/{id}', [PracticePlaceController::class, 'destroy'])->name('PracticePlace.destroy');

// PracticeStudentController routes
//Route::get('/practice-students', 'PracticeStudentController::class, 'index'])->name('PracticeStudent.index');
//Route::get('/practice-students/{id}', 'PracticeStudentController::class, 'show'])->name('PracticeStudent.show');
//Route::post('/practice-students', 'PracticeStudentController::class, 'store'])->name('PracticeStudent.store');
//Route::put('/practice-students/{id}', 'PracticeStudentController::class, 'update'])->name('PracticeStudent.update');
//Route::delete('/practice-students/{id}', 'PracticeStudentController::class, 'destroy'])->name('PracticeStudent.destroy');

// TroublesController routes
Route::get('/troubles', [TroublesController::class, 'index'])->name('Troubles.index');
Route::get('/troubles/{id}', [TroublesController::class, 'show'])->name('Troubles.show');
Route::post('/troubles', [TroublesController::class, 'store'])->name('Troubles.store');
Route::put('/troubles/{id}', [TroublesController::class, 'update'])->name('Troubles.update');
Route::delete('/troubles/{id}', [TroublesController::class, 'destroy'])->name('Troubles.destroy');

// TraitsController routes
//Route::get('/traits', [TraitsController::class, 'index'])->name('Traits.index');
//Route::get('/traits/{id}', [TraitsController::class, 'show'])->name('Traits.show');
//Route::post('/traits', [TraitsController::class, 'store'])->name('Traits.store');
//Route::put('/traits/{id}', [TraitsController::class, 'update'])->name('Traits.update');
//Route::delete('/traits/{id}', [TraitsController::class, 'destroy'])->name('Traits.destroy');

// ReprimandController routes
//Route::get('/reprimands', [ReprimandController::class, 'index'])->name('Reprimand.index');
//Route::get('/reprimands/{id}', [ReprimandController::class, 'show'])->name('Reprimand.show');
//Route::post('/reprimands', [ReprimandController::class, 'store'])->name('Reprimand.store');
//Route::put('/reprimands/{id}', [ReprimandController::class, 'update'])->name('Reprimand.update');
//Route::delete('/reprimands/{id}', [ReprimandController::class, 'destroy'])->name('Reprimand.destroy');

// TaskController routes
//Route::get('/tasks', [TaskController::class, 'index'])->name('Task.index');
//Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('Task.show');
//Route::post('/tasks', [TaskController::class, 'store'])->name('Task.store');
//Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('Task.update');
//Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('Task.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
