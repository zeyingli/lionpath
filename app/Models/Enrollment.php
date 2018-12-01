<?php

namespace App\Models;

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

}