<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorbike;

class ListingsManagement extends Controller
{
    // show all motorbikes listings for the logged in user
    public function index(): View
    {
        $user = Auth::user();
        return view('pages/listings-management', [
            'motorbikes' => Motorbike::where('user_id', 11)->get()
        ]);
    }
}
