<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function getStudents(): UserCollection
    {
        return new UserCollection(User::where('role', 'student')
            ->orderBy('created_at', 'desc')
            ->paginate()
            ->withPath('/students')
        );
    }

    public function storeStudent(Request $request): Response
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required', 'date'],
            'belt_color' => ['required', 'string'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 'student',
            'password' => Hash::make($request->string('password')),
            'dob' => $request->dob,
            'belt_color' => $request->belt_color,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
