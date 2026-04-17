<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessful;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BankCenterCreditController extends Controller
{
    public function postpay(Request $request): RedirectResponse
    {
        if ($request->input('ACTION') != Order::BCC_ACTION_STATUS_SUCCESS || $request->input('RC') != '00') {
            return redirect()->route('register.failure')->with('error', 'An error occurred. Please try again.');
        }

        $order = Order::where('id', (int) $request->input('ORDER'))->first();

        if (! $order || $order->bcc_attributes['NONCE'] != $request->input('NONCE')
        ) {
            return redirect()->route('register.failure')
                ->with('error', 'An error occurred. Please try again.');
        }

        if ($order->status == Order::STATUS_PAID) {
            return redirect()->route('register.success', $order)->with('success', 'Успешно');
        }

        $order->status = Order::STATUS_PAID;
        $order->paid_at = now();
        $order->bcc_response = $request->only([
            'ACTION', 'RC', 'RC_TEXT', 'APPROVAL', 'TRAN_AMOUNT', 'CARD_MASK', 'TERMINAL', 'TRTYPE',
            'AMOUNT', 'ORDER', 'RRN', 'MERCHANT', 'INT_REF', 'NONCE', 'MERCH_TOKEN_ID',
        ]);
        $order->save();

        Mail::to($order->user->email)->queue(new PaymentSuccessful($order));

        return redirect()->route('register.success', $order)->with('success', 'Успешно');
    }

    public function callback(Request $request): RedirectResponse
    {
        Log::debug('Callback Pay');
        dd($request->all());
    }
}
