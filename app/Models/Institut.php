<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institut extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function trainingDirections()
    {
        return $this->hasMany(TrainingDirection::class);
    }
}