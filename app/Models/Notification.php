<?php

namespace App\Models;

class Notification extends Mode
{
    protected $table = 'notification';

    protected $guarded = 'id';

    protected $dates = [
        'notify_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'exam_id',
        'building_id',
        'notify_date',
        'notify_frequency',
    ];
}
