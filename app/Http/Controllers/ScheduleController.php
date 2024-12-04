<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return new ScheduleCollection(Schedule::all());
    }
}
