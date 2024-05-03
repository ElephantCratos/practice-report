<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TrainingDirectionController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PracticePlaceController;
use App\Http\Controllers\StudentPracticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TroublesController;
use App\Http\Controllers\TraitsController;
use App\Http\Controllers\TaskController;
//use App\Http\Controllers\VolumeController;
use App\Http\Controllers\ReportStudentWordController;
use App\Http\Controllers\ReportHeadPractice;





Route::middleware(['auth', 'verified'])->group(function () {


    Route::middleware(['can:access to admin panel'])->group(function () {
        Route::get('/institutes/index', [InstituteController::class, 'index'])->name('Institute.index');
        Route::get('/institutes/create', [InstituteController::class, 'create'])->name('Institute.create');
        Route::get('/institutes/edit/{id}', [InstituteController::class, 'edit'])->name('Institute.edit');
        Route::post('/institutes/store', [InstituteController::class, 'store'])->name('Institute.store');
        Route::put('/institutes/update/{id}', [InstituteController::class, 'update'])->name('Institute.update');
        Route::delete('/institutes/delete/{id}', [InstituteController::class, 'destroy'])->name('Institute.delete');
    });


    Route::middleware(['can:access to head_OPOP panel'])->group(function () {
        Route::get('/groups/index', [GroupController::class, 'index'])->name('Group.index');
        Route::get('/groups/create', [GroupController::class, 'create'])->name('Group.create');
        Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('Group.edit');
        Route::post('/groups/store', [GroupController::class, 'store'])->name('Group.store');
        Route::put('/groups/update/{id}', [GroupController::class, 'update'])->name('Group.update');
        Route::delete('/groups/delete/{id}', [GroupController::class, 'destroy'])->name('Group.delete');
    });


    Route::middleware(['can:access to admin panel'])->group(function () {
        Route::get('/training-directions/index', [TrainingDirectionController::class, 'index'])->name('TrainingDirection.index');
        Route::get('/training-directions/create', [TrainingDirectionController::class, 'create'])->name('TrainingDirection.create');
        Route::get('/training-directions/edit/{id}', [TrainingDirectionController::class, 'edit'])->name('TrainingDirection.edit');
        Route::post('/training-directions/store', [TrainingDirectionController::class, 'store'])->name('TrainingDirection.store');
        Route::put('/training-directions/update/{id}', [TrainingDirectionController::class, 'update'])->name('TrainingDirection.update');
        Route::delete('/training-directions/delete/{id}', [TrainingDirectionController::class, 'destroy'])->name('TrainingDirection.delete');
    });

    Route::middleware(['role:head_OPOP|head_enterprice'])->group(function () {
        Route::get('/practices/index', [PracticeController::class, 'index'])->name('Practice.index');
        Route::get('/practices/create', [PracticeController::class, 'create'])->name('Practice.create')->middleware('role:head_OPOP');
        Route::get('/practices/edit/{id}', [PracticeController::class, 'edit'])->name('Practice.edit')->middleware('role:head_OPOP');
        Route::post('/practices/store', [PracticeController::class, 'store'])->name('Practice.store')->middleware('role:head_OPOP');
        Route::put('/practices/update/{id}', [PracticeController::class, 'update'])->name('Practice.update')->middleware('role:head_OPOP');
        Route::delete('/practices/delete/{id}', [PracticeController::class, 'destroy'])->name('Practice.delete')->middleware('role:head_OPOP');
    });


    Route::middleware(['role:head_OPOP|head_enterprice'])->group(function () {
        Route::get('/practice-places/index', [PracticePlaceController::class, 'index'])->name('PracticePlace.index');
        Route::get('/practice-places/create', [PracticePlaceController::class, 'create'])->name('PracticePlace.create');
        Route::get('/practice-places/edit/{id}', [PracticePlaceController::class, 'edit'])->name('PracticePlace.edit');
        Route::post('/practice-places/store', [PracticePlaceController::class, 'store'])->name('PracticePlace.store');
        Route::put('/practice-places/update/{id}', [PracticePlaceController::class, 'update'])->name('PracticePlace.update');
        Route::delete('/practice-places/delete/{id}', [PracticePlaceController::class, 'destroy'])->name('PracticePlace.delete');
    });


    Route::middleware(['role:head_OPOP|head_enterprice'])->group(function () {
        Route::get('/practice-students/index', [StudentPracticeController::class, 'index'])->name('PracticeStudent.index');
        //Route::get('/practice-students/create', [StudentPracticeController::class, 'create'])->name('PracticeStudent.create');
        Route::get('/practice-students/edit/{id}', [StudentPracticeController::class, 'edit'])->name('PracticeStudent.edit');
        //Route::post('/practice-students/store', [StudentPracticeController::class, 'store'])->name('PracticeStudent.store');
        Route::put('/practice-students/update/{id}', [StudentPracticeController::class, 'update'])->name('PracticeStudent.update');
        Route::delete('/practice-students/delete/{id}', [StudentPracticeController::class, 'destroy'])->name('PracticeStudent.delete');
    });


    Route::middleware(['can:access to head_enterprice panel'])->group(function () {
        Route::get('/traits/index', [TraitsController::class, 'index'])->name('Traits.index');
        Route::get('/traits/edit/{id}', [TraitsController::class, 'edit'])->name('Traits.edit');
        Route::get('/traits/create', [TraitsController::class, 'create'])->name('Traits.create');
        Route::post('/traits/store', [TraitsController::class, 'store'])->name('Traits.store');
        Route::put('/traits/update/{id}', [TraitsController::class, 'update'])->name('Traits.update');
        Route::delete('/traits/delete/{id}', [TraitsController::class, 'destroy'])->name('Traits.delete');
    });


   Route::middleware(['can:access to head_enterprice panel'])->group(function () {
       Route::get('/troubles/index', [TroublesController::class, 'index'])->name('Troubles.index');
       Route::get('/troubles/create', [TroublesController::class, 'create'])->name('Troubles.create');
       Route::get('/troubles/edit/{id}', [TroublesController::class, 'edit'])->name('Troubles.edit');
       Route::post('/troubles/store', [TroublesController::class, 'store'])->name('Troubles.store');
       Route::put('/troubles/update/{id}', [TroublesController::class, 'update'])->name('Troubles.update');
       Route::delete('/troubles/delete/{id}', [TroublesController::class, 'destroy'])->name('Troubles.delete');
   });


    Route::middleware(['can:access to head_enterprice panel'])->group(function () {
        Route::get('/tasks/index', [TaskController::class, 'index'])->name('Task.index');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('Task.create');
        Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('Task.edit');
        Route::post('/tasks/store', [TaskController::class, 'store'])->name('Task.store');
        Route::put('/tasks/update/{id}', [TaskController::class, 'update'])->name('Task.update');
        Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy'])->name('Task.delete');
        Route::post('/tasks/import', [TaskController::class, 'import'])->name('tasks.import');
    });


    Route::resource('roles', RoleController::class) ->middleware('can:access to admin panel');


    Route::group(['middleware' => ['role:head_OPOP|admin']], function () {
        Route::resource('users', UserController::class);
        Route::get('users/{user}/edit-roles', [UserController::class, 'edit'])->name('users.edit-roles');
        Route::post('users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
        Route::post('users/{user}/remove-role', [UserController::class, 'removeRole'])->name('users.removeRole');
        Route::post('users/{user}/update-position', [UserController::class, 'updatePosition'])->name('users.updatePosition');
        Route::post('users/{user}/update-group', [UserController::class, 'updateGroup'])->name('users.updateGroup');
    });


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/generate-registration-link', [RegistrationController::class, 'generateRegistrationLink'])->name('generateLink');
    Route::get('/PhpWord/{pr_stud_id}', [ReportStudentWordController::class, 'downloadDocx'])->name('downloadDocx');
    Route::get('/practice-students/ind/index/{pr_stud_id}', [ReportStudentWordController::class, 'downloadDocx'])->name('downloadDocx.ind');
    Route::get('/PhpWord1/{pr_id}', [ReportHeadPractice::class, 'downloadDocxHead'])->name('downloadDocxHead');

});

Route::get('/signUpWithToken/{token}', [RegistrationController::class, 'signUpWithToken'])->name('signUpWithToken');


Route::get('/', function () {
        return view('welcome');
    });


require __DIR__.'/auth.php';
