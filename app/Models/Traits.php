<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traits extends Model
{
    use HasFactory;

    protected $table = 'traits';

    protected $fillable = [
        'description',
        'score_id',
    ];

    public function score()
    {
        return $this->belongsTo(Score::class);

    }

    public function student_practice()
    {
        return $this->hasMany(StudentPractice::class);
    }
}
