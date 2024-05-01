<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

protected $fillable = [

    'practice_id',
    'student_id',
    'paid',
    'contract_type_id',
    'practice_head_organization_id',
    'volume_id',
    'traits_id',
    'trouble_id',
    'score_id',
    'reprimand'

];
class StudentPracticeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('studentPractice.StudentPracticeCreate');
    }

    public function store()
    {

    }

}
