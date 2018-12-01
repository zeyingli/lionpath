<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Mode
{
    protected $table = 'enrollment';

    protected $guarded = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'class_id',
    ];

    /**
     * Relationships.
     *
     * @return mixed
     */
    public function classes()
    {
        return $this->hasOne(Classes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
