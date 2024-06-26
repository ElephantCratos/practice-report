<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'description',
        'date',
        'student_practice_id',
        'status'
    ];
    public function practice()
    {
	return $this->belongsTo(StudentPractice::class, 'student_practice_id');
    }
}
