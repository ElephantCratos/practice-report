<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Troubles;
use App\Models\Score;

class TroublesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trouble = Troubles::OrderBy('score_id')
            ->get();

        $score = Score::OrderBy('id')
            ->get();

       return view('Troubles.show',compact([
           'trouble', 'score'
       ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('Troubles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'description' => 'required|string',
        'score_id' => 'required|exists:score,id',
    ]);

    $trouble = Troubles::create($validatedData);

    return redirect()->route('dashboard')->with('success', 'Trouble create successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trouble = Troubles::findOrFail($id);
        return view('Troubles.edit', compact('trouble'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $trouble = Troubles::findOrFail($id);

    $validatedData = $request->validate([
        'description' => 'required|string',
        'score_id' => 'required|exists:score,id',
    ]);

    $trouble->update($validatedData);

    return redirect()->route('dashboard')->with('success', 'Trouble edit successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $trouble = Troubles::findOrFail($id);
    $trouble->delete();

    return redirect()->route('dashboard')->with('success', 'Trouble delete successfully.');
}
}
