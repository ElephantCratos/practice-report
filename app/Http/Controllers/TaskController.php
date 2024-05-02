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
    public function create(){

        $tasks = Task::OrderBy('id')
            ->get();
        
        return view('task/taskCreate',compact([
            'tasks'
        ]));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request -> validate([
            'description' => 'required|min:10',
            'date' => 'required|date_format:Y-m-d',
        ]);

        Task::create([
            'description' => $validatedData['description'],
            'date' => $validatedData['date']
        ]);

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
        return view('task/taskCreate',compact([
            'tasks'
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

        $file = $request->file('csv_file');
        $filePath = $file->getRealPath();

        $csvData = array_map('str_getcsv', file($filePath));
        $csvHeaders = array_shift($csvData);

        foreach ($csvData as $csvTask) {
            $description = $csvTask[4];
            $csvDate = $csvTask[6];
            $date = date('Y-m-d H:i:s', strtotime($csvDate));

            $studentId = $request->input('student_practice_id');

            $task = new Task();
            $task->description = $description;
            $task->date = $date;
            $task->student_practice_id = $studentId; 
            $task->save();
        }

        return redirect()->route('Task.index')->with('success', 'Задачи успешно импортированы.');
    }

}