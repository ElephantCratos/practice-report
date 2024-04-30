<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $practice = Practice::all();

        return view('test', compact(['practice']));

    }
}
