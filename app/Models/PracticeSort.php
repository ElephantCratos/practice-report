<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeSort extends Model
{
    use HasFactory;

    protected $table = 'practice_sort';

    protected $fillable = [
        'name',
        'p_d',
        'p_w'
    ];
}
