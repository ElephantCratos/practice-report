<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TroublesController;

// GroupController routes
Route::get('/groups', 'GroupController@index');
Route::get('/groups/{id}', 'GroupController@show');
Route::post('/groups', 'GroupController@store');
Route::put('/groups/{id}', 'GroupController@update');
Route::delete('/groups/{id}', 'GroupController@destroy');

// InstitutController routes
Route::get('/institutes', 'InstitutController@index');
Route::get('/institutes/{id}', 'InstitutController@show');
Route::post('/institutes', 'InstitutController@store');
Route::put('/institutes/{id}', 'InstitutController@update');
Route::delete('/institutes/{id}', 'InstitutController@destroy');

// TrainingDirectionController routes
Route::get('/training-directions', 'TrainingDirectionController@index');
Route::get('/training-directions/{id}', 'TrainingDirectionController@show');
Route::post('/training-directions', 'TrainingDirectionController@store');
Route::put('/training-directions/{id}', 'TrainingDirectionController@update');
Route::delete('/training-directions/{id}', 'TrainingDirectionController@destroy');

// TroublesController routes
Route::get('/troubles', [TroublesController::class, 'index'])->name('Troubles.show');
Route::get('/troubles/edit/{id}', [TroublesController::class, 'edit'])->name('Troubles.edit');
Route::get('/troubles/create', [TroublesController::class, 'create'])->name('Troubles.create');
Route::post('/troubles/store', [TroublesController::class, 'store'])->name('Troubles.store');
Route::put('/troubles/update/{id}', [TroublesController::class, 'update'])->name('Troubles.update');
Route::delete('/troubles/delete/{id}', [TroublesController::class, 'destroy'])->name('Troubles.delete');

// TraitsController routes
Route::get('/traits', 'TraitsController@index');
Route::get('/traits/{id}', 'TraitsController@show');
Route::post('/traits', 'TraitsController@store');
Route::put('/traits/{id}', 'TraitsController@update');
Route::delete('/traits/{id}', 'TraitsController@destroy');

// TaskController routes
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{id}', 'TaskController@show');
Route::post('/tasks', 'TaskController@store');
Route::put('/tasks/{id}', 'TaskController@update');
Route::delete('/tasks/{id}', 'TaskController@destroy');

// ReprimandController routes
Route::get('/reprimands', 'ReprimandController@index');
Route::get('/reprimands/{id}', 'ReprimandController@show');
Route::post('/reprimands', 'ReprimandController@store');
Route::put('/reprimands/{id}', 'ReprimandController@update');
Route::delete('/reprimands/{id}', 'ReprimandController@destroy');

// PracticeStudentController routes
Route::get('/practice-students', 'PracticeStudentController@index');
Route::get('/practice-students/{id}', 'PracticeStudentController@show');
Route::post('/practice-students', 'PracticeStudentController@store');
Route::put('/practice-students/{id}', 'PracticeStudentController@update');
Route::delete('/practice-students/{id}', 'PracticeStudentController@destroy');

// PracticePlaceController routes
Route::get('/practice-places', 'PracticePlaceController@index');
Route::get('/practice-places/{id}', 'PracticePlaceController@show');
Route::post('/practice-places', 'PracticePlaceController@store');
Route::put('/practice-places/{id}', 'PracticePlaceController@update');
Route::delete('/practice-places/{id}', 'PracticePlaceController@destroy');

// PracticeController routes
Route::get('/practices', 'PracticeController@index');
Route::get('/practices/{id}', 'PracticeController@show');
Route::post('/practices', 'PracticeController@store');
Route::put('/practices/{id}', 'PracticeController@update');
Route::delete('/practices/{id}', 'PracticeController@destroy');


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
