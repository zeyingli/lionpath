<?php

namespace App\Models;

use App\Models\Building;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
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

    /**
     * Relationships.
     *
     * @return mixed
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
