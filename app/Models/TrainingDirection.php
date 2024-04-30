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

    public function institut()
    {
        return $this->belongsTo(Institut::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

}
