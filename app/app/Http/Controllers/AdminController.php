<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {   
        $users = User::all();
        return view('admin/index', [
            'users' => $users
        ]);
    }

    public function upgrade(User $user, Request $request) {
        $role = $request->input('role');
        $user->update([
            'is_admin' => $role === 'admin',
            'is_mod' => $role === 'mod',
        ]);
      
        return redirect()->back()->with('success', 'User upgraded successfully.');

    }
}
