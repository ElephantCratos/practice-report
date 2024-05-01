<?php

namespace App\Http\Controllers;

use App\Models\StudentPractice;
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

       
       $xyi = 'хуй';

       $i =0;

       $size = count($tasks);

       
       for ($i = 0; $i<$size;$i++)
       {
            if($xyi){
            $document->setValue('row' . $i, $tasks[$i]->description);
            $newDateFormat = date('d.m.Y', strtotime($tasks[$i]->date));
            $document->setValue('date' . $i, $newDateFormat);
            }
       }

       while($i <= 21)
       {
            $document->setValue('row' . $i, ' ');
            $document->setValue('date' . $i, ' ');
            $i++;
       }


        $document -> saveAs('fish - '.'faggot'.'.docx');

        return response()->download(public_path('fish - '.'faggot'.'.docx'));
    }



}
