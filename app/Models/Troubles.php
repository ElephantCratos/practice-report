<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Troubles extends Model
{
    use HasFactory;

    protected $table = 'troubles';

    protected $fillable = [
        'description',
        'score_id',
    ];
}
