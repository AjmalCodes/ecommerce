<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stripeCheckoutController extends Controller
{





    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51M3MxUJ0F066JcU06uoPYdD8giOGnAGTzlD6vWwJxdSMMsP6esg9xYliNN57pFgujg5BwDetbLK13uX1xG3ns2Gn00joYKYjVY');


		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'AED',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }








}
