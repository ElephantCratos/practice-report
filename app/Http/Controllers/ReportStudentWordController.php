<?php

namespace App\Http\Controllers;

use App\Models\StudentPractice;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportStudentWordController extends Controller
{

    public function downloadDocx(Request $request, $pr_stud_id)
    {
        $student_practice = StudentPractice::findOrFail($pr_stud_id);
        $tasks=$student_practice->tasks;

        $document = new \PhpOffice\PhpWord\TemplateProcessor('CompletedTemplate.docx');

        $h_pr_ent = explode(" ",$student_practice->practice->head_enterprise->full_name);

        $surname = $h_pr_ent[0];

        $initials = Str::substr($h_pr_ent[1], 0, 1) . '.' . Str::substr($h_pr_ent[2], 0, 1)  ;

        $h_pr_ent = $surname . " " . $initials;

        $pos_ent = $student_practice->practice->head_enterprise->position;



        $document->setValues(array('h_pr_ent' => $h_pr_ent,
            'pos_ent' => $pos_ent)
        );

        $tasks = Task::OrderBy('id')->get();

        $document->cloneRow('taskN', count($tasks));

        $i = 1;

        foreach($tasks as $task)
        {
            $document->setValue('taskN#'.$i, $i);
            $document->setValue('task#'.$i, $task->description);
            $i++;
        }

        $document -> saveAs('fish - '.'faggot'.'.docx');

        return response()->download(public_path('fish - '.'faggot'.'.docx'));
    }



}
