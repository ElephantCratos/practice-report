<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPractice extends Model
{
    use HasFactory;

    protected $table = 'student_practice';

    protected $fillable = [

        'practice_id',
        'student_id',
        'paid',
        'contract_type_id',
        'practice_head_organization_id',
        'volume_id',
        'traits_id',
        'trouble_id',
        'score_id',
        'reprimand',
        'practice_place',
        'isReady'


    ];
    public function score()
    {
        return $this->belongsTo(Score::class);
    }

    public function volume()
    {
        return $this->belongsTo(Volume::class);
    }

    public function trait()
    {
        return $this->belongsTo(Traits::class, 'traits_id');
    }

    public function troubles()
    {
        return $this->belongsTo(Troubles::class, 'trouble_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


    public function practice_head()
    {
        return $this->belongsTo(User::class , 'practice_head_organization_id');
    }

    public function contract_type()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function place()
    {
        return $this->belongsTo(PracticePlace::class, 'practice_place');
    }


}
