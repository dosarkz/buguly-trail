<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with(['sportEvent', 'distance'])
            ->latest()
            ->get();

        return view('profile.index', compact('user', 'orders'));
    }
}
