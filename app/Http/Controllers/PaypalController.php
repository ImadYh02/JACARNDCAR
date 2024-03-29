<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    // public function goPayment() {
    //     return view('products.welcome');
    // }

    public function payment() {
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 112,
                'desc'  => 'Running shoes for Men',
                'qty' => 2
            ]
        ];

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('payment.cancel');
        $product['cancel_url'] = route('payment.success');
        $product['total'] = 224;

        $paypalModule = new ExpressCheckout();

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }

    public function cancel() {
        dd('Your payment is canceled.');
    }

    public function success(Request $request) {
        $paypalModule = new ExpressCheckout();
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }

        dd('Error occured!');
    }
}
