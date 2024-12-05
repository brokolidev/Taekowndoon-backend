<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function getStudents(): UserCollection
    {
        return new UserCollection(User::where('role', 'student')
            ->paginate()
            ->withPath('/students')
        );
    }
}
