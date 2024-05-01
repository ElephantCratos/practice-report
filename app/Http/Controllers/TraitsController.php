<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traits;
use App\Models\Score;

class TraitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trait = Traits::OrderBy('score_id')
            ->get();

        $score = Score::OrderBy('id')
            ->get();

       return view('traits/Traits',compact([
           'trait', 'score'
       ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $score = Score::OrderBy('id')
            ->get();
        
       return view('traits/TraitsCreate',compact([
           'score'
       ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'description' => 'required|string',
        'score_id' => 'required|integer',
    ]);

    $trait = Traits::create($validatedData);

    return redirect()->route('Traits.index')->with('success', 'Шаблон успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trait = Traits::findOrFail($id);
        $score = Score::OrderBy('id')
            ->get();
        return view('traits/TraitsEdit', compact('trait', 'score'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $trait = Traits::findOrFail($id);

    $validatedData = $request->validate([
        'description' => 'required|string',
        'score_id' => 'required|exists:score,id',
    ]);

    $trait->update($validatedData);

    return redirect()->route('Traits.index')->with('success', 'Шаблон успешно изменён!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trait = Traits::findOrFail($id);
        $trait->delete();

    return redirect()->route('Traits.index')->with('success', 'Шаблон успешно удалён!');
    }
}
