<?php

namespace App\Http\Controllers;

use App\Models\TrainingDirection;
use Illuminate\Http\Request;

class TrainingDirectionController extends Controller
{
    public function index()
    {
        $trainingDirection = TrainingDirection::OrderBy('name')->get();

        return view('TrainingDirection.index', compact(['trainingDirection']));
    }

    public function create()
    {
        return view('TrainingDirection.create');
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

        return redirect()->route('dashboard')->with('success', 'TrainingDirection added');
    }

    public function edit($id)
    {
        $trainingDirection = TrainingDirection::findOrFail($id);
        return view('TrainingDirection.edit', compact('trainingDirection'));
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

        return redirect()->route('dashboard')->with('success', 'TrainingDirection updated');
    }

    public function destroy($id)
    {
        $trainingDirection = TrainingDirection::findOrFail($id);
        $trainingDirection->delete();

        return redirect()->route('dashboard')->with('success', 'TrainingDirection destroy');
    }
}
