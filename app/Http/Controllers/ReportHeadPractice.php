<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportHeadPractice extends Controller
{
    public function downloadDocxHead(Request $request, $pr_id)
    {
        $practice = Practice::findOrFail($pr_id);
        $document1 = new \PhpOffice\PhpWord\TemplateProcessor('1121.docx');

        $h_pr_usu = explode(" ",$practice->head_ugrasu->full_name);

        $surname = $h_pr_usu[0];

        $initials = Str::substr($h_pr_usu[1], 0, 1) . '.' . Str::substr($h_pr_usu[2], 0, 1)  ;

        $h_pr_usu = $surname . " " . $initials;

        $startDateFormat = date('d.m.Y', strtotime($practice->start_date));

        $endDateFormat = date('d.m.Y', strtotime($practice->end_date));

        $inst = $practice->group->trainingDirections->institute->name;

        $tr_d = $practice->group->trainingDirections->name;

        $pr_s = $practice->sort->name;

        $s_c = $practice->group->course->name;

        $stud_g = $practice->group->name;

        $pr_t = $practice->type->name;

        $or_n = $practice->order_number;

        $or_d = $practice->order_date;

        $h_pr_op = explode(" ",$practice->group->trainingDirections->head_OPOP->full_name);

        $surname = $h_pr_op[0];

        $initials = Str::substr($h_pr_op[1], 0, 1) . '.' . Str::substr($h_pr_op[2], 0, 1)  ;

        $h_pr_op = $surname . " " . $initials;

        $document->setValues(array()
        );

        $document1 -> saveAs('meat - '.'faggot'.'.docx');

        return response()->download(public_path('meat - '.'faggot'.'.docx'));
    }
}
