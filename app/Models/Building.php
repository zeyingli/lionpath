<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Mode
{

    protected $table = 'building';

    protected $guarded = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'lat',
        'lng',
    ];

}