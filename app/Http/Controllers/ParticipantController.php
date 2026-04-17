<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class ParticipantController extends Controller
{
    public function index(): View
    {
        $participants = User::where('status', User::STATUS_ACTIVE)
            ->whereHas('paidOrder')
            ->with('paidOrder.distance')
            ->paginate(50);

        return view('participants', compact('participants'));
    }
}
