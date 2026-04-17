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
            abort(404);
        }

        $order = Order::where('id', (int) $request->input('ORDER'))->firstOrFail();

        if ($order->bcc_attributes == null || $order->bcc_attributes['NONCE'] != $request->input('NONCE')) {
            Log::error('Invalid nonce', $request->all());
            abort(404);
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
