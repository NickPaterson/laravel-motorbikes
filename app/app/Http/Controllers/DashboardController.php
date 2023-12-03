<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;

use App\Models\Motorbike;

class DashboardController extends Controller
{
    public function index() : View
    {
        $user = Auth::user();
        $motorbikes = Motorbike::where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('dashboard', [
            'motorbikes' => $motorbikes
        ]);
    }
}
