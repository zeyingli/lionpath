<?php

namespace App\Models;

use App\Models\Building;
use App\Models\Classes;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
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
