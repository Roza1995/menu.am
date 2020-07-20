<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;



class CheckoutController extends Controller
{
    public function charge()
    {
        Stripe::setApiKey('sk_test_51H6eMsI4dSJifl9VhjYFZLXXa1Lrt8beGtsiku1nnlMtDCqa4U9k0PcPstXarCwMbHWLswPe6l3k0PKi8dVgcVT00082jKhGC3');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => 'john@example.com',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Pizza',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://menuss.am/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://menuss.am/cancel',
        ]);
    //dd($session);
        return "Your payment was done";


    }



}
