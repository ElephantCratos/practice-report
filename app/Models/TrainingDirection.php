<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDirection extends Model
{
    use HasFactory;

    protected $table = 'training_directions';

    protected $fillable = [
        'name',
        'head_OPOP_id',
        'institute_id'
    ];

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function head_OPOP()
    {
        return $this->belongsTo(User::class, 'head_OPOP_id');
    }
}
