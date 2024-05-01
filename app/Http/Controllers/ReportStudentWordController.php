<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportStudentWordController extends Controller
{

    public function downloadDocx(Request $request, $id)
    {
        $practice = Practice::findOrFail($id);

        $document = new \PhpOffice\PhpWord\TemplateProcessor('CompletedTemplate.docx');

        $h_pr_ent = explode(" ",$practice->head_enterprise->full_name);

        $surname = $h_pr_ent[0];

        $initials = Str::substr($h_pr_ent[1], 0, 1) . '.' . Str::substr($h_pr_ent[2], 0, 1)  ;

        $h_pr_ent = $surname . " " . $initials;

        $pos_ent = $practice->head_enterprise->position;



        $document->setValues(array('h_pr_ent' => $h_pr_ent,
            'pos_ent' => $pos_ent)
        );



        $document -> saveAs('fish - '.'faggot'.'.docx');

        return response()->download(public_path('fish - '.'faggot'.'.docx'));
    }



}
