<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); // Retrieve the list of users from the database

        return view('users.index', compact('users'));
    }
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }


    public function edit()
    {
        $timezones = config('app.timezones');
        return view('users.edit', ['user' => Auth::user(), 'timezones' => $timezones]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->timezone = $request->input('timezone');
        $user->save();

        return redirect()->route('user.show')->with('success', 'Timezone updated successfully.');
    }
}
