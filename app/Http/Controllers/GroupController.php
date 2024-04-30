<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $group = Group::OrderBy('name')->get();

        return view('Group.index', compact(['group']));
    }

    public function create()
    {
        return view('Group.create');
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

        return redirect()->route('dashboard')->with('success', 'Group added');
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('Group.edit', compact('group'));
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

        return redirect()->route('dashboard')->with('success', 'Group updated');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('dashboard')->with('success', 'Group destroy');
    }
}
