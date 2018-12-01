<?php

namespace App\Models;

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

    /**
     * Relationships.
     *
     * @return mixed
     */
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }
}
