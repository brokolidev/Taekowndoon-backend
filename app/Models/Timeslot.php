<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeslot extends Model
{
    /** @use HasFactory<\Database\Factories\TimeslotFactory> */
    use HasFactory, SoftDeletes;

    protected $hidden = ['id', 'deleted_at', 'created_at', 'updated_at'];

    protected function getStartsAtAttribute($value): string
    {
        return date('H:i', strtotime($value));
    }

    protected function getEndsAtAttribute($value): string
    {
        return date('H:i', strtotime($value));
    }
}
