<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable =
        [

        ];

    public function places()
    {
        return $this->belongsToMany(Practice::class);
    }
}
