<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BackUrlController extends Controller
{
    public function success(Request $request){

		if($request!=null){

			//$response=json_decode($_REQUEST, true);
			var_dump($_REQUEST);


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


}
