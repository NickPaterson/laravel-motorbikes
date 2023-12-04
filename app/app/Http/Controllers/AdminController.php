<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Motorbike;

class AdminController extends Controller
{
    public function index()
    {   
        $users = User::all();
        return view('admin/index', [
            'users' => $users
        ]);
    }
}
