<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require __DIR__  . '/../../../vendor/autoload.php';

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

class NotificationController extends Controller
{


	public function notification(Request $request){


   	 SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_POST["topic"]) {

        case "payment":
            $payment = Payment::find_by_id($_POST["id"]);
            $response=json_decode($payment, true);
            var_dump($response);
            print_r($response);
            break;
        case "topic":
            $plan = MerchantOrder::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            var_dump($response);
            break;
        case "subscription":
            $plan = Subscription::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            var_dump($response);
            break;
        case "invoice":
            $plan = Invoice::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            var_dump($response);
            break;
    }

    return response('OK', 200);

   	}

}
