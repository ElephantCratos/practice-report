<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index() 
    {
        $institute = Institute::OrderBy('id')->get();

        return view('institute/Institute', compact(['institute']));        
    }

    public function create() 
    {
        return view('institute/InstituteCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255'
        ]);

        $institute = Institute::create([
            'name' => $request->name,
        ]);

        return redirect()->route('Institute.index')->with('success', 'Institut added');
    }

    public function edit($id)
    {
        $institute = Institute::findOrFail($id);
        return view('institute/InstituteEdit', compact(['institute']));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
        ]);

        $institute = Institute::findOrFail($id);
        $institute->update($validatedData);

        return redirect()->route('Institute.index')->with('success', 'Institute updated');
    }

    public function destroy($id)
    {
        $institute = Institute::findOrFail($id);
        $institute->delete();

        return redirect()->route('Institute.index')->with('success', 'Institute destroy');
    }
}
