<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'group_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function student_practice()
    {
        return $this->belongsTo(StudentPractice::class);
    }

    public function practiceHeadUgrasu()
    {
        return $this->hasOne(Practice::class, 'practice_head_ugrasu_id');
    }

    public function practiceHeadEnterprice()
    {
        return $this->hasOne(Practice::class, 'practice_head_enterprise_id');
    }






    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
