<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    /**
     * Show the owner dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rooms = Room::all(); // Get all rooms owned by the owner (you may filter based on authenticated owner)

        return view('owner.dashboard', compact('rooms'));
    }
}

