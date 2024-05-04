<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\ContractType;
use App\Models\StudentPractice;
use App\Models\Volume;
use App\Models\Traits;
use App\Models\Troubles;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPracticeController extends Controller
{
    public function index($id = null)
    {





;

        $user = Auth::user();

        if ($user->hasRole('head_enterprice'))
        {
            $practiceStudent = StudentPractice::where('practice_head_organization_id', $user->id)->orderBy('id','desc')->get();
            if ($id!=null)
            {
                $arr = [];
                if ($id == 1)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 1)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }

                if ($id == 0)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 0)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }

            }
            return view('practiceStudent/PracticeStudent', compact([ 'practiceStudent']));
        }

        if ($user->hasRole('head_OPOP'))
        {

            $practiceStudent = StudentPractice::all();
            if ($id!=null)
            {
                $arr = [];
                if ($id == 1)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 1)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }

                if ($id == 0)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 1)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }
            }

            return view('practiceStudent/PracticeStudent', compact([ 'practiceStudent']));
        }

        if ($user->hasRole('student'))
        {
            $practiceStudent = StudentPractice::where('student_id', $user->id)->orderBy('id','desc')->get();

            if ($id!=null)
            {
                $arr = [];
                if ($id == 1)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 1)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }

                if ($id == 0)
                {
                    foreach($practiceStudent as $student)
                    {
                        if ($student->isReady == 1)
                            array_push($arr,$student);
                    }
                    $practiceStudent = $arr;
                }
            }

            return view('practiceStudent/PracticeStudent', compact([ 'practiceStudent']));
        }

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


        $practiceHeadsOrganization = User::role('head_enterprice')->get();;

        $practiceStudent = StudentPractice::findOrFail($id);

        $contractTypes = ContractType::all();

        $volumes = Volume::all();

        $traits = Traits::all();

        $troubles = Troubles::all();

        $scores = Score::all();

      return view('practiceStudent/PracticeStudentEdit', compact(['practiceHeadsOrganization', 'practiceStudent', 'volumes', 'traits', 'troubles', 'contractTypes', 'scores']));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'volume_id' => 'required',
            'traits_id' => 'required',
            'trouble_id' => 'required',
            'score_id' => 'required',
            'practice_place' => 'required',
            'reprimand' => 'nullable|string|max:255',
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

        return redirect()->route('PracticeStudent.index')->with('success', 'Практика студента успешно обновлена!');

    }

    public function destroy($id)
    {
        $practiceStudent = StudentPractice::findOrFail($id);

        $practiceStudent->delete();

        return redirect()->route('PracticeStudent.index');
    }

}
