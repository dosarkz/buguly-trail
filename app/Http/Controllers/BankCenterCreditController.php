<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankCenterCreditController extends Controller
{
    public function postPay(Request $request): RedirectResponse
    {
        Log::debug('Post Pay');
        Log::debug($request->all());
        dd($request->all());
    }

    public function callback(Request $request): RedirectResponse
    {
        Log::debug('Callback Pay');
        Log::debug($request->all());
        dd($request->all());
    }
}
