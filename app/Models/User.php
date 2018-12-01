<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationships.
     *
     * @return mixed
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
