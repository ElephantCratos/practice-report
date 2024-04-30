<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPractice extends Model
{
    use HasFactory;

    protected $table = 'student_practice';

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

    ];
}
