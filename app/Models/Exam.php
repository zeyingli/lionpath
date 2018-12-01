<?php

namespace App\Models;

class Exam extends Mode
{
    protected $table = 'exam';

    protected $guarded = 'id';

    protected $dates = [
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id',
        'building_id',
        'room',
        'start_time',
        'end_time',
    ];

    /**
     * Relationships.
     *
     * @return mixed
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
