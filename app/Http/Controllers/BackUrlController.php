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

class BackUrlController extends Controller
{
    public function success(Request $request){
    	http_response_code(200);
		if($request!=null){

			//$response=json_decode($_REQUEST, true);
			var_dump($_REQUEST);

			SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_POST["type"]) {

        case "payment":
            $payment = Payment::find_by_id($_POST["id"]);
            //$response=json_decode($payment, true);
            var_dump($payment);
            break;
        case "plan":
            $plan = Plan::find_by_id($_POST["id"]);
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



   	}

		}

	}

	public function failure(Request $request){

		if($request!=null){

			 echo('Su pedido ha fallado');
		}

	}

	public function pending(Request $request){

		if($request!=null){

			 echo('Pedido pendiente');
		}

	}

	public function notification(){

   	 http_response_code(200);
   	 SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_POST["type"]) {

        case "payment":
            $payment = Payment::find_by_id($_POST["id"]);
            //$response=json_decode($payment, true);
            var_dump($payment);
            break;
        case "plan":
            $plan = Plan::find_by_id($_POST["id"]);
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



   	}

}
