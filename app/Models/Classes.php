<?php

namespace App\Models;

class Classes extends Mode
{
    protected $table = 'class';

    protected $guarded = 'id';

    protected $dates = [
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nbr',
        'name',
        'unit',
        'section',
        'building_id',
        'room',
        'instructor',
        'start_date',
        'end_date',
        'status',
    ];
}
