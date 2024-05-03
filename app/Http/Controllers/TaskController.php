<?php

namespace App\Http\Controllers;
use App\Models\StudentPractice;
use App\Models\PracticePlace;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::OrderBy('id')->get();
        $practiceStudents = StudentPractice::all();
        return view('task.task', compact('tasks', 'practiceStudents'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $practiceStudents = StudentPractice::all();
        return view('task.taskcreate', compact('practiceStudents'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|min:10',
            'date' => 'required|date_format:Y-m-d',
            'student_practice_id' => 'required', // Добавляем проверку на наличие идентификатора студента
        ]);

        // Создаем новую задачу с полученными данными
        $task = new Task();
        $task->description = $validatedData['description'];
        $task->date = $validatedData['date'];
        $task->student_practice_id = $validatedData['student_practice_id']; // Используем идентификатор студента из запроса
        $task->status = 'задача';

        // Сохраняем задачу в базе данных
        $task->save();

        // После сохранения задачи, перенаправляем пользователя на страницу с задачами с сообщением об успехе
        return redirect()->route('Task.index')->with('success', 'Новое задание успешно добавлено');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);

        $id = $tasks->student_practice_id;
        $practiceStudents = StudentPractice::findOrFail($id);
      
        return view('task/taskEdit',compact([
            'tasks', 'practiceStudents'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|min:10',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $tasks = Task::findOrFail($id);

        $tasks->update($validatedData);

        return redirect()->route('Task.index')->with('success', 'Задание успешно обновлено');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect()->route('Task.index') ->with('success', 'Задание было успешно удалено.');
    }
    /**
     * Импорт тасков из CVS файла
     */
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);
//хуй
        $file = $request->file('csv_file');
        $filePath = $file->getRealPath();

        $csvData = array_map('str_getcsv', file($filePath));
       
        $csvHeaders = array_shift($csvData);

        foreach ($csvData as $csvTask) {
            $description = $csvTask[4];
            $csvDate = $csvTask[6];
            $Date = explode(' ', $csvDate);
            $date = $Date[0];
            $date1 = date_create_from_format("d/m/Y",$date);
            
            $studentId = $request->input('student_practice_id');

            $task = new Task();
            $task->description = $description;
            $task->date = $date1;
            $task->student_practice_id = $studentId;
            $task->status = 'работа';
            $task->save();
        }

        return redirect()->route('Task.index')->with('success', 'Задачи успешно импортированы.');
    }

}
