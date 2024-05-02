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
        'student_practice_id'
    ];
    public function practice()
    {
	return $this->belongsToMany(PracticePlace::class);
    }
}
