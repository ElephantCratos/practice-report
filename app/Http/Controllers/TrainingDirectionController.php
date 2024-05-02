<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\TrainingDirection;
use App\Models\User;

use Illuminate\Http\Request;

class TrainingDirectionController extends Controller
{
    public function index()
    {
        $trainingDirection = TrainingDirection::OrderBy('name')->get();
        
        $institute = Institute::OrderBy('id')->get();


        //Надо рефакторить по мере появления ролевой политики
        $heads_OPOP = User::role('head_OPOP')->get();
    
        return view('trainingDirection/TrainingDirection', compact(['trainingDirection', 'institute', 'heads_OPOP']));
    }

    public function create()
    {
        $institute = Institute::OrderBy('id')->get();
        $heads_OPOP = User::role('head_OPOP')->get();

        return view('trainingDirection/TrainingDirectionCreate', compact(['institute', 'heads_OPOP']));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required | string | max:255',
            'head_OPOP_id' => 'required',
            'institute_id' => 'required',
        ]);

        $trainingDirection = TrainingDirection::create([
            'name' => $request->name,
            'head_OPOP_id' => $request->head_OPOP_id,
            'institute_id' => $request->institute_id,
        ]);

        return redirect()->route('TrainingDirection.index')->with('success', 'TrainingDirection added');
    }

    public function edit($id)
    {
        $trainingDirection = TrainingDirection::findOrFail($id);
        $institute = Institute::OrderBy('id')->get();
        $heads_OPOP = User::role('head_OPOP')->get();

        return view('trainingDirection/TrainingDirectionEdit', compact(['trainingDirection', 'institute', 'heads_OPOP']));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
            'head_OPOP_id' => 'required',
            'institute_id' => 'required',
        ]);

        $trainingDirection = TrainingDirection::findOrFail($id);
        $trainingDirection->update($validatedData);

        return redirect()->route('TrainingDirection.index')->with('success', 'TrainingDirection updated');
    }

    public function destroy($id)
    {
        $trainingDirection = TrainingDirection::findOrFail($id);
        $trainingDirection->delete();

        return redirect()->route('TrainingDirection.index')->with('success', 'TrainingDirection destroy');
    }
}
