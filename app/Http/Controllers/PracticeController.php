<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Practice;
use App\Models\PracticePlace;
use App\Models\PracticeType;
use App\Models\PracticeSort;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $practice = Practice::all();

        return view('practice/practice', compact(['practice']));

    }

    public function create()
    {
        //Надо рефакторить по мере появления ролевой политики
        $users = User::all();

        $practiceTypes = PracticeType::all();
        $practiceSorts = PracticeSort::all();
        $practicePlaces = PracticePlace::all();
        $groups = Group::all();

        return view('practice/PracticeCreate', compact(['practiceTypes', 'practiceSorts', 'practicePlaces' , 'groups' , 'users']));
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
            '$practicePlaces' => 'required|array'
        ]);

        $practiceNew = Practice::create([
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

        $practice_places = PracticePlace::whereIn('id', $request->input('$practicePlaces', []))->get();

        $practiceNew->places()->attach($practice_places);

        return redirect()->route('Practice.index')->with('success', 'Практика успешно создана!');
    }

    public function edit($id)
    {
        //Надо рефакторить по мере появления ролевой политики
        $users = User::all();

        $practiceTypes = PracticeType::all();
        $practiceSorts = PracticeSort::all();
        $practicePlaces = PracticePlace::all();
        $groups = Group::all();

        $practice = Practice::findOrFail($id);
        return view('practice/PracticeEdit',compact(['practice', 'practiceTypes', 'practiceSorts', 'practicePlaces' , 'groups' , 'users']));
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

        return redirect()->route('Practice.index')->with('success', 'Практика успешно обновлена!');
    }

    public function destroy($id)
    {
        $practice = Practice::findOrFail($id);
        $practice->delete();

        return redirect()->route('Practice.index')->with('success', 'Место практики было успешно удалено.');
    }
}
