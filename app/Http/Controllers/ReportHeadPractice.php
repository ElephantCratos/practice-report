<?php

namespace App\Http\Controllers;

use App\Models\StudentPractice;
use App\Models\Practice;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportHeadPractice extends Controller
{
    public function downloadDocxHead(Request $request, $pr_id)
    {
        $practice = Practice::findOrFail($pr_id);
        foreach ($practice->practice_st as $pr)
        {
            if (!$pr->isReady)
            {
                return redirect()->route('Practice.index')->with('success', 'Не все документы студентов заполнены');
            }
        }
        $document1 = new \PhpOffice\PhpWord\TemplateProcessor('1121.docx');

        $h_pr_usu = explode(" ", $practice->head_ugrasu->full_name);

        $surname = $h_pr_usu[0];

        $initials = Str::substr($h_pr_usu[1], 0, 1) . '.' . Str::substr($h_pr_usu[2], 0, 1);

        $h_pr_usu = $surname . " " . $initials;

        $h_pr_ent = explode(" ", $practice->head_enterprise->full_name);

        $surname = $h_pr_ent[0];

        $initials = Str::substr($h_pr_ent[1], 0, 1) . '.' . Str::substr($h_pr_ent[2], 0, 1);

        $h_pr_ent = $surname . " " . $initials;

        $startDateFormat = date('d.m.Y', strtotime($practice->start_date));

        $endDateFormat = date('d.m.Y', strtotime($practice->end_date));

        $inst = $practice->group->trainingDirections->institute->name;

        $tr_d = $practice->group->trainingDirections->name;

        $pr_s = $practice->sort->name;

        $s_c = $practice->group->course->name;

        $stud_g = $practice->group->name;

        $pr_t = $practice->type->name;

        $or_n = $practice->order_number;

        $or_d = date('d.m.Y', strtotime($practice->order_date));

        $h_pr_op = explode(" ", $practice->group->trainingDirections->head_OPOP->full_name);

        $surname = $h_pr_op[0];

        $initials = Str::substr($h_pr_op[1], 0, 1) . '.' . Str::substr($h_pr_op[2], 0, 1);

        $h_pr_op = $surname . " " . $initials;

        $practice_st = $practice->practice_st;

        $practiceStudent = StudentPractice::all();

        $count_norm = count($practiceStudent);

        $count_good_score = 0;
        for ($i=0; $i<$count_norm;$i++ )
        {

            if ($practiceStudent[$i]->practice->id == $practice->id && $practiceStudent[$i]->score_id!=1)
            {
                $count_good_score++;
            }
        }

        $count_bad_score = 0;

        for ($i=0; $i<$count_norm;$i++ )
        {

            if ($practiceStudent[$i]->practice->id == $practice->id && $practiceStudent[$i]->score_id==1)
            {
                $count_bad_score++;
            }
        }
        $ne_count_norm = count(StudentPractice::where('score_id', '=', 1)->get());

        $document1->cloneRow('st_full_nameN', $count_good_score);
        $document1->cloneRow('ne_st_full_nameN', $count_bad_score);

        $i = 1;
        $j = 1;

        foreach ($practice_st as $Practice_st) {
            if ($Practice_st->score_id != 1) {
                $h_pr_ent = explode(" ", $Practice_st->practice_head->full_name);
                $surname = $h_pr_ent[0];
                $initials = Str::substr($h_pr_ent[1], 0, 1) . '.' . Str::substr($h_pr_ent[2], 0, 1);
                $h_pr_ent = $surname . " " . $initials;

                $st_full_nameN = $i;
                $st_full_name = $Practice_st->student->full_name;

                $pr_pl = $Practice_st->place->name;

                $ct_t = $Practice_st->contract_type->name;

                if ($Practice_st->paid == 1) {
                    $p = "Да";
                } else {
                    $p = "Нет";
                };

                $document1->setValue('st_full_nameN#' . $i, $st_full_nameN);
                $document1->setValue('st_full_name#' . $i, $st_full_name);
                $document1->setValue('pr_pl#' . $i, $pr_pl);
                $document1->setValue('ct_t#' . $i, $ct_t);
                $document1->setValue('p#' . $i, $p);
                $document1->setValue('h_pr_ent#' . $i, $h_pr_ent);
                $i++;
            } else {
                $rep = $Practice_st->reprimand;
                $ne_st_full_nameN = $j;
                $ne_st_full_name = $Practice_st->student->full_name;

                $document1->setValue('ne_st_full_nameN#' . $j, $ne_st_full_nameN);
                $document1->setValue('ne_st_full_name#' . $j, $ne_st_full_name);
                $document1->setValue('rep#' . $j, $rep);
                $j++;
            }
        };

        $document1->setValues(array(
            'h_pr_usu' => $h_pr_usu,
            'h_pr_ent' => $h_pr_ent,
            'start_date' => $startDateFormat,
            'end_date' => $endDateFormat,
            'inst' => $inst,
            'tr_d' => $tr_d,
            'pr_s' => $pr_s,
            's_c' => $s_c,
            'stud_g' => $stud_g,
            'pr_t' => $pr_t,
            'or_n' => $or_n,
            'or_d' =>  $or_d,
            'h_pr_op' => $h_pr_op,
            'ct_t' => $ct_t,
            'p' => $p,
            'count_norm' => $count_good_score,
            'ne_count_norm' => $count_bad_score,
        ));

        $document1->saveAs($h_pr_ent . $stud_g . '.docx');

        return response()->download(public_path($h_pr_ent . $stud_g . '.docx'));
    }
}
