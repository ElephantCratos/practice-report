<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\TrainingDirection;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $group = Group::OrderBy('id')->get();
        $trainingDirection = TrainingDirection::OrderBy('id')->get();

        return view('group/Group', compact(['group', 'trainingDirection']));
    }

    public function create()
    {
        $trainingDirection = TrainingDirection::OrderBy('id')->get();
        $course = Course::OrderBy('id')->get();

        return view('group/GroupCreate', compact(['trainingDirection', 'course']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'course_id' => 'required',
            'training_direction_id' => 'required',
        ]);

        $group = Group::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'training_direction_id' => $request->training_direction_id,
        ]);

        return redirect()->route('Group.index')->with('success', 'Group added');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $trainingDirection = TrainingDirection::OrderBy('id')->get();
        $course = Course::OrderBy('id')->get();

        return view('group/GroupEdit', compact('group', 'trainingDirection', 'course'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
            'course_id' => 'required',
            'training_direction_id' => 'required',
        ]);

        $group = Group::findOrFail($id);
        $group->update($validatedData);

        return redirect()->route('Group.index')->with('success', 'Group updated');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('Group.index')->with('success', 'Group destroy');
    }
}
