<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\PracticePlace;
class PracticePlaceController extends Controller
{
    public function index()
    {

        $practice_places = PracticePlace::OrderBy('id')
            ->get();

        //dd($practice_places);
       return view('practiceplace/Practice_Place',compact([
           'practice_places'
       ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $practice_places = PracticePlace::OrderBy('id')
            ->get();

        return view('practicePlace/Practice_placeCreate',compact([
            'practice_places'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request -> validate([
            'name' => 'required|min:3',
            'address' => 'required|min:3|string',
            'name_p' => 'required|min:3|string',
        ]);

        PracticePlace::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'name_p' => $validatedData['name_p']
        ]);


        return redirect()->route('PracticePlace.index')->with('success', 'Новое место практики успешно добавлено');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $practice_places = PracticePlace::findOrFail($id);
        return view('practicePlace/Practice_placeEdit',compact([
            'practice_places'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'name_p' => 'required|min:3|string',
        ]);

        $practicePlace = PracticePlace::findOrFail($id);

        $practicePlace->update($validatedData);

        return redirect()->route('PracticePlace.index')->with('success', 'Место практики успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $practicePlace = PracticePlace::findOrFail($id);
        $practicePlace->delete();

        return redirect()->route('PracticePlace.index') ->with('success', 'Место практики было успешно удалено.');
    }
}
