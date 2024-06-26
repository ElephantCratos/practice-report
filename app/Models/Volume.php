<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $table = 'volume';

    protected $fillable = [
        'description',
        'score_id',
    ];

    public function score()
    {
        return $this->belongsTo(Score::class);

    }
}
