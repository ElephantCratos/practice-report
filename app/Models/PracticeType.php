<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeType extends Model
{
    use HasFactory;

    protected $table = 'practice_type';

    protected $fillable = [
        'id',
        'name',
    ];
}
