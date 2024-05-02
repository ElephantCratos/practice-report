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

        $h_pr_usu = explode(" ",$student_practice->practice->head_ugrasu->full_name);

        $surname = $h_pr_usu[0];

        $initials = Str::substr($h_pr_usu[1], 0, 1) . '.' . Str::substr($h_pr_usu[2], 0, 1)  ;

        $h_pr_usu = $surname . " " . $initials;

        $pos_ent = $student_practice->practice->head_enterprise->position;

        $pos_usu = $student_practice->practice->head_ugrasu->position;

        $s_c = $student_practice->practice->group->course->name;

        $stud_g = $student_practice->practice->group->name;

        $student_full_name = $student_practice->student->full_name;

        $full_name_r = $student_practice->student->full_name_r;

        $full_name_d = $student_practice->student->full_name_d;

        $pr_pl = $student_practice->place->name;

        $pr_pl_p = $student_practice->place->name_p;

        $inst = $student_practice->practice->group->trainingDirections->institute->name;

        $pr_s_d = $student_practice->practice->sort->p_d;

        $pr_s_w = $student_practice->practice->sort->p_w;

        $tr_d = $student_practice->practice->group->trainingDirections->name;

        $st_ent = explode(" ",$student_practice->student->full_name);

        $surname = $st_ent[0];

        $initials = Str::substr($st_ent[1], 0, 1) . '.' . Str::substr($st_ent[2], 0, 1)  ;

        $st_ent = $surname . " " . $initials;

        $practice_name = $student_practice->practice->practice_name;

        $sc = $student_practice->score->name;

        $pr_p_ad = $student_practice->place->address;

        $startDateFormat = date('d.m.Y', strtotime($student_practice->practice->start_date));

        $st_d = date('d', strtotime($startDateFormat));

        $st_m = date('m', strtotime($startDateFormat));

        $endDateFormat = date('d.m.Y', strtotime($student_practice->practice->end_date));

        $en_d = date('d', strtotime($endDateFormat));

        $en_m = date('m', strtotime($endDateFormat));

        if ($student_practice->reprimand == null)
        {
        $rep = 'Замечания отсутствуют.';
        }
        else{
            $rep = $student_practice->reprimand;
        }

       $trait = $student_practice->trait->description;

       $trouble = $student_practice->troubles->description;  

        $volum = $student_practice->volume->description;

        $document->setValues(array('h_pr_ent' => $h_pr_ent, 'h_pr_usu' => $h_pr_usu, 'inst' => $inst, 'pr_s_d' => $pr_s_d, 'pr_s_w' => $pr_s_w, 'tr_d' => $tr_d, 'st_ent' => $st_ent, 'practice_name' => $practice_name, 'sc' => $sc, 'pr_p_ad' => $pr_p_ad, 'start_date' => $startDateFormat, 'end_date' => $endDateFormat,
            'pos_ent' => $pos_ent, 'pos_usu' => $pos_usu, 's_c' => $s_c, 'stud_g' => $stud_g, 'student_full_name' => $student_full_name, 'full_name_r' => $full_name_r,'full_name_d' => $full_name_d, 'pr_pl' => $pr_pl,
            'st_d' => $st_d, 'st_m' => $st_m, 'en_d' => $en_d, 'en_m' => $en_m, 'rep' => $rep, 'trait' => $trait, 'trouble' => $trouble, 'volum' => $volum)
        );

        $document->cloneRow('taskN', count($tasks));

        $i = 1;

        foreach($tasks as $task)
        {
            $document->setValue('taskN#'.$i, $i);
            $document->setValue('task#'.$i, $task->description);
            $i++;
        }

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
