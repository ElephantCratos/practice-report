<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'score';

    protected $fillable = [
        'id',
        'name',
    ];

    public function troubles()
    {
        return $this->hasMany(Troubles::class);
    }
}
