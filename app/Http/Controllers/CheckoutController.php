<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request, Order $order)
    {
        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $request->validated('amount'),
            'method' => $request->validated('method'),
            'status' => PaymentStatus::Succeeded,
            'transaction_id' => 'FAKE-' . strtoupper(uniqid()),
            'currency' => 'usd',
        ]);

        return response()->json([
            'message' => 'Payment successful',
            'payment' => $payment,
        ]);
    }
}
