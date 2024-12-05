<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getStudents(Request $request)
    {
        return new UserCollection(User::where('role', 'student')
            ->take(100)
            ->get());
    }
}
