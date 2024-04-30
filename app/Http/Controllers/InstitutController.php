<?php

namespace App\Http\Controllers;

use App\Models\Institut;
use Illuminate\Http\Request;

class InstitutController extends Controller
{
    public function index() 
    {
        $institut = Institut::OrderBy('name')->get();

        return view('Institut.index', compact(['institut']));        
    }

    public function create() 
    {
        return view('Institut.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255'
        ]);

        $institut = Institut::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard')->with('success', 'Institut added');
    }

    public function edit($id)
    {
        $institut = Institut::findOrFail($id);
        return view('Institut.edit', compact('institut'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | string | max:255',
        ]);

        $institut = Institut::findOrFail($id);
        $institut->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Institut updated');
    }

    public function destroy($id)
    {
        $institut = Institut::findOrFail($id);
        $institut->delete();

        return redirect()->route('dashboard')->with('success', 'Institut destroy');
    }
}
