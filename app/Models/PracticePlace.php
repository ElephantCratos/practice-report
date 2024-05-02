<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticePlace extends Model
{
    use HasFactory;

    protected $table = 'practice_places';

    protected $fillable = [
        'name',
        'address'
    ];
    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'practices_practice_places', 'practice_id','practice_places_id', 'practice_places_name', 'practice_places_address' );
    }

    public function stud_pr()
    {
        return $this->hasMany(StudentPractice::class);
    }
}
