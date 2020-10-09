<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $current_user  = Auth::user();
        return view('users.index', compact('users', 'current_user'));
    }

    public function show(Request $request)
    {
        $current_user = Auth::user();
        $user = User::find($request->id);
        return view('users.show', compact('user', 'current_user'));
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $current_user = Auth::user();
        if ($user != $current_user) {
            return redirect(route('users.show', ['id' => $request->id]));
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id)->update([
            'name' => $request->name
        ]);
        return redirect(route('users.show', ['id' => $request->id]));
    }
}
