<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
require __DIR__  . '/../../../vendor/autoload.php';

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

class NotificationController extends Controller
{


	public function getNotification(Request $request){


   	 SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_GET["topic"]) {

        case "payment":
            $payment = Payment::find_by_id($_GET["id"]);

            $response=json_encode($payment, true);
            var_dump($response);

            break;
        case "merchant_order":
            $plan = MerchantOrder::find_by_id($_GET["id"]);
            $response=json_encode($plan, true);
            var_dump($response);
            break;
        case "subscription":
            $plan = Subscription::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            console_log($response);
            break;
        case "invoice":
            $plan = Invoice::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            var_dump($response);
            break;
    }

    return response('OK', 200);

   	}


   	public function postNotification(Request $request){


   	 SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_POST["topic"]) {

        case "payment":
            $payment = Payment::find_by_id($_POST["id"]);
            $response=json_encode($payment, true);
            var_dump($response);

            break;
        case "merchant_order":
            $plan = MerchantOrder::find_by_id($_POST["id"]);
            $response=json_encode($plan, true);
            var_dump($response);
            break;
        case "subscription":
            $plan = Subscription::find_by_id($_POST["id"]);
            $response=json_decode($plan, true);
            console_log($response);
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
