<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory, SoftDeletes;

    protected $casts = [
        'students' => 'array',
        'instructors' => 'array',
    ];

    protected function timeslot(): HasOne
    {
        return $this->hasOne(Timeslot::class, 'id', 'timeslot_id');
    }

    public function getMainInstructorAttribute(): string
    {
        return User::find($this->instructors[0])->fullName;
    }
}
