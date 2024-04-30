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
//Route::get('/institutes/index', [InstitutController::class, 'index'])->name('Institut.index');
//Route::get('/institutes/create', [InstitutController::class, 'create'])->name('Institut.create');
//Route::get('/institutes/edit/{id}', [InstitutController::class, 'edit'])->name('Institut.edit');
//Route::post('/institutes/store', [InstitutController::class, 'store'])->name('Institut.store');
//Route::put('/institutes/update/{id}', [InstitutController::class, 'update'])->name('Institut.update');
//Route::delete('/institutes/delete/{id}', [InstitutController::class, 'destroy'])->name('Institut.delete');

// TroublesController routes
Route::get('/troubles', [TroublesController::class, 'index'])->name('Troubles.show');
Route::get('/troubles/edit/{id}', [TroublesController::class, 'edit'])->name('Troubles.edit');
Route::get('/troubles/create', [TroublesController::class, 'create'])->name('Troubles.create');
Route::post('/troubles/store', [TroublesController::class, 'store'])->name('Troubles.store');
Route::put('/troubles/update/{id}', [TroublesController::class, 'update'])->name('Troubles.update');
Route::delete('/troubles/delete/{id}', [TroublesController::class, 'destroy'])->name('Troubles.delete');

// GroupController routes
//Route::get('/groups/index', [GroupController::class, 'index'])->name('Group.index');
//Route::get('/groups/create', [GroupController::class, 'create'])->name('Group.create');
//Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('Group.edit');
//Route::post('/groups/store', [GroupController::class, 'store'])->name('Group.store');
//Route::put('/groups/update/{id}', [GroupController::class, 'update'])->name('Group.update');
//Route::delete('/groups/delete/{id}', [GroupController::class, 'destroy'])->name('Group.delete');

// TrainingDirectionController routes
//Route::get('/training-directions/index', [TrainingDirectionController::class, 'index'])->name('TrainingDirection.index');
//Route::get('/training-directions/create', [TrainingDirectionController::class, 'create'])->name('TrainingDirection.create');
//Route::get('/training-directions/edit/{id}', [TrainingDirectionController::class, 'edit'])->name('TrainingDirection.edit');
//Route::post('/training-directions/store', [TrainingDirectionController::class, 'store'])->name('TrainingDirection.store');
//Route::put('/training-directions/update/{id}', [TrainingDirectionController::class, 'update'])->name('TrainingDirection.update');
//Route::delete('/training-directions/delete/{id}', [TrainingDirectionController::class, 'destroy'])->name('TrainingDirection.delete');

// PracticeController routes
//Route::get('/practices/index', [PracticeController::class, 'index'])->name('Practice.index');
//Route::get('/practices/create', [PracticeController::class, 'create'])->name('Practice.create');
//Route::get('/practices/edit/{id}', [PracticeController::class, 'edit'])->name('Practice.edit');
//Route::post('/practices/store', [PracticeController::class, 'store'])->name('Practice.store');
//Route::put('/practices/update/{id}', [PracticeController::class, 'update'])->name('Practice.update');
//Route::delete('/practices/delete/{id}', [PracticeController::class, 'destroy'])->name('Practice.delete');

// PracticePlaceController routes
Route::get('/practice-places/index', [PracticePlaceController::class, 'index'])->name('PracticePlace.index');
Route::get('/practice-places/create', [PracticePlaceController::class, 'create'])->name('PracticePlace.create');
Route::get('/practice-places/edit/{id}', [PracticePlaceController::class, 'edit'])->name('PracticePlace.edit');
Route::post('/practice-places/store', [PracticePlaceController::class, 'store'])->name('PracticePlace.store');
Route::put('/practice-places/update/{id}', [PracticePlaceController::class, 'update'])->name('PracticePlace.update');
Route::delete('/practice-places/delete/{id}', [PracticePlaceController::class, 'destroy'])->name('PracticePlace.delete');

// PracticeStudentController routes
//Route::get('/practice-students/index', 'PracticeStudentController::class, 'index'])->name('PracticeStudent.index');
//Route::get('/practice-students/create', 'PracticeStudentController::class, 'create'])->name('PracticeStudent.create');
//Route::get('/practice-students/edit/{id}', 'PracticeStudentController::class, 'edit'])->name('PracticeStudent.edit');
//Route::post('/practice-students/store', 'PracticeStudentController::class, 'store'])->name('PracticeStudent.store');
//Route::put('/practice-students/update/{id}', 'PracticeStudentController::class, 'update'])->name('PracticeStudent.update');
//Route::delete('/practice-students/delete/{id}', 'PracticeStudentController::class, 'destroy'])->name('PracticeStudent.delete');


// TraitsController routes
//Route::get('/traits/index', [TraitsController::class, 'index'])->name('Traits.index');
//Route::get('/traits/create', [TraitsController::class, 'create'])->name('Traits.create');
//Route::get('/traits/edit/{id}', [TraitsController::class, 'edit'])->name('Traits.edit');
//Route::post('/traits/store', [TraitsController::class, 'store'])->name('Traits.store');
//Route::put('/traits/update/{id}', [TraitsController::class, 'update'])->name('Traits.update');
//Route::delete('/traits/delete/{id}', [TraitsController::class, 'destroy'])->name('Traits.delete');

// ReprimandController routes
//Route::get('/reprimands/index', [ReprimandController::class, 'index'])->name('Reprimand.index');
//Route::get('/reprimands/create', [ReprimandController::class, 'create'])->name('Reprimand.create');
//Route::get('/reprimands/edit/{id}', [ReprimandController::class, 'edit'])->name('Reprimand.edit');
//Route::post('/reprimands/store', [ReprimandController::class, 'store'])->name('Reprimand.store');
//Route::put('/reprimands/update/{id}', [ReprimandController::class, 'update'])->name('Reprimand.update');
//Route::delete('/reprimands/delete/{id}', [ReprimandController::class, 'destroy'])->name('Reprimand.delete');

// TaskController routes
//Route::get('/tasks/index', [TaskController::class, 'index'])->name('Task.index');
//Route::get('/tasks/create', [TaskController::class, 'create'])->name('Task.create');
//Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('Task.edit');
//Route::post('/tasks/store', [TaskController::class, 'store'])->name('Task.store');
//Route::put('/tasks/update/{id}', [TaskController::class, 'update'])->name('Task.update');
//Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('Task.delete');

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
