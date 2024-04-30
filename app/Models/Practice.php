<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'practice_name',
            'start_date',
            'end_date',
            'order_number',
            'order_date',
            'group_id',
            'practice_head_ugrasu_id',
            'practice_head_enterprice_id',
            'practice_sort_id',
            'practice_type_id'
        ];

    public function places()
    {
        return $this->belongsToMany(Practice::class);
    }

    public function head_ugrasu()
    {
        return $this->hasOne(User::class);
    }

    public function head_ugrasu()
    {
        return $this->belongsTo(User::class, 'practice_head_ugrasu_id');
    }

    public function head_enterprise()
    {
        return $this->belongsTo(User::class, 'practice_head_enterprise_id');
    }

    public function sort()
    {
        return $this->belongsTo(PracticeSort::class, 'practice_sort_id');
    }

    public function type()
    {
        return $this->belongsTo(PracticeType::class, 'practice_type_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }






}
