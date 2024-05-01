<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContractType;
use App\Models\StudentPractice;
use App\Models\Volume;
use App\Models\Traits;
use App\Models\Troubles;
use App\Models\Score;
use Illuminate\Http\Request;


class StudentPracticeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        // Под большим вопросом может ли это создаваться вообще(обособленно), следующий этап
        //return view('studentPractice.StudentPracticeCreate', compact(['']));
    }

    public function store()
    {
        //
    }

    public function edit($id)
    {
        //Нужно рефакторить по мере появления ролевой политики


        $practiceHeadOrganization = User::all();

        $practiceStudent = StudentPractice::findOrFail($id);

        $contractTypes = ContractType::all();

        $volumes = Volume::all();

        $traits = Traits::all();

        $troubles = Troubles::all();

        $scores = Score::all();

      return view('practiceStudent/PracticeStudentEdit', compact(['practiceHeadOrganization', 'practiceStudent', 'volumes', 'traits', 'troubles', 'contractTypes', 'scores']));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'volume_id' => 'required',
            'traits_id' => 'required',
            'trouble_id' => 'required',
            'contract_type_id' => 'required',
            'score_id' => 'required',
            'practice_place' => 'required',
            'reprimand' => 'string|max:255',
        ]);

        if ($request->input('paid'))
        {
            $validatedData['paid'] = true;
        }

        if ($request->input('isReady'))
        {
            $validatedData['isReady'] = true;
        }


        $studentPractice = StudentPractice::findOrFail($id);

        $studentPractice->update($validatedData);

        return redirect()->route('practiceStudent/PracticeStudentIndex');

    }

    public function delete($id)
    {
        $practiceStudent = StudentPractice::findOrFail($id);

        $practiceStudent->delete();

    }

}
