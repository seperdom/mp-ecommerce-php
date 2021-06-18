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

class CheckOutController extends Controller
{
	public function index(Request $request){

      $mp_app_id;
      $mp_app_secret;

      //$this->publishes([__DIR__.'/../config/mercadopago.php' => config_path('mercadopago.php')]);
     // $this->mp_app_id     = config('mercadopago.app_id');
      //$this->mp_app_secret = config('mercadopago.app_secret');

      SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
      //SDK::setAccessToken("TEST-249258121436887-112300-26e7def97d13c654e2d3bf6432deaa0f-671059256");
      SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

      $preference = new Preference();




        $items=array();


          if(addslashes($request->title)!="" && addslashes($request->price)!="" && addslashes($request->unit)!="" && addslashes($request->img)!=""){
          $item = new Item();
          $price=(floatval(addslashes($request->price)));
          $item->id="1234";
         // $quantity=(int)addslashes($request->unit);
          $title=addslashes($request->title);
          $item->title = $title;
          $url=addslashes($request->img);
          $item->picture_url="http://localhost:8000/assets/".$url;
          $item->description="Dispositivo móvil de Tienda e-commerce";
          $item->quantity = 1;
          //$item->currency_id = "UYU";
          $item->unit_price = $price;
          $items[0]=$item;

          }




          # Create a payer object


          $payer = new Payer();
          $payer->name = "Lalo Landa";
          $payer->email = "test_user_63274575@testuser
.com";
          $payer->phone = array(
          "area_code" => "11",
          "number" => "22223333");
          $payer->address = array(
		    "street_name" => "Falsa",
		    "street_number" => 123,
		    "zip_code" => "1111"
		  );


          # Setting preference properties
          $preference->items = $items;
          $preference->payer = $payer;
          $preference->back_urls = array(
          	//"success" => "http://localhost:8000/backurl/success",
           "success" => "https://seperdom-mp-ecommerce-php.herokuapp.com/backurl/success",
            "failure" => "https://seperdom-mp-ecommerce-php.herokuapp.com/backurl/failure",
            "pending" => "https://seperdom-mp-ecommerce-php.herokuapp.com/backurl/pending"
        );
        $preference->auto_return = "approved";
        $preference->payment_methods = array(
		  "excluded_payment_methods" => array(
		    array("id" => "amex")
		  ),
		  "excluded_payment_types" => array(
		    array("id" => "atm")
		  ),

          "installments" => 6,

          "default_installments"=> null
        );

          # Save and posting preference
        $preference->notification_url= "https://seperdom-mp-ecommerce-php.herokuapp.com/notification?source_news=webhooks";
        //$preference->notification_url= "http://localhost:8000/notification";
        $preference->external_reference="seperdom@gmail.com";
        $preference->save();
        // get customer details by session customer ID
        //$mId=$_SESSION['sessCustomerID'];
        //$query = $mContrtoladoraUsuario->getUsuario($mId);
        //$custRow = $query;
        $pagar=$preference->init_point;
        return redirect($pagar);
        //header("Location: ../Vista/checkout.php");

      //exit();
      }


}
