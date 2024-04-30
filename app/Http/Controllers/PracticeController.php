<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $practice = Practice::all();

        return view('test', compact(['practice']));

    }

    public function create()
    {
        return view('practice.create');
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'practice_name' => 'required|string|min:10',
            'start_date' => 'date',
            'end_date' => 'date',
            'order_number' => 'required|string',
            'order_date' => 'date',
            'group_id' => 'required',
            'practice_head_ugrasu_id' => 'required',
            'practice_head_enterprice_id' => 'required',
            'practice_sort_id' => 'required',
            'practice_type_id' => 'required',
        ]);

        Practice::create([
            'practice_name' => $validatedData['practice_name'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'order_number' => $validatedData['order_number'],
            'order_date' => $validatedData['order_date'],
            'group_id' => $validatedData['group_id'],
            'practice_head_ugrasu_id' => $validatedData['practice_head_ugrasu_id'],
            'practice_head_enterprice_id' => $validatedData['practice_head_enterprice_id'],
            'practice_sort_id' => $validatedData['practice_sort_id'],
            'practice_type_id' => $validatedData['practice_type_id'],
        ]);

        return redirect()->route('')->with('success', 'Практика успешно создана!');
    }

    public function edit($id)
    {
        $practice = Practice::findOrFail($id);
        return view('practice.edit',compact(['practice']);
    }

    public function update($id, Request $request)
    {
        $validatedData =$request->validate([
            'practice_name' => 'required|string|min:10',
            'start_date' => 'date',
            'end_date' => 'date',
            'order_number' => 'required|string',
            'order_date' => 'date',
            'group_id' => 'required',
            'practice_head_ugrasu_id' => 'required',
            'practice_head_enterprice_id' => 'required',
            'practice_sort_id' => 'required',
            'practice_type_id' => 'required',
        ]);

        $practice = Practice::findOrFail($id);

        $practice->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Практика успешно обновлена!');
    }

    public function destroy($id)
    {
        $practice = Practice::findOrFail($id);
        $practice->delete();

        return redirect()->route('') ->with('success', 'Место практики было успешно удалено.');
    }
}
