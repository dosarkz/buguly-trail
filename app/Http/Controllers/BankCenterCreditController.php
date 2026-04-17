<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BankCenterCreditController extends Controller
{
    public function postPay(Request $request): RedirectResponse
    {
        dd($request->all());
    }

    public function callback(Request $request): RedirectResponse
    {
        dd($request->all());
    }
}
