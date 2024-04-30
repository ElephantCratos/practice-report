<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'course_id',
        'training_direction_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);

    }

    public function trainingDirections()
    {
        return $this->belongsTo(TrainingDirection::class, 'training_direction_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
