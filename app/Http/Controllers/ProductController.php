<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
	public function show(Request $request){

	$img=addslashes($request->img) ;
	$title=addslashes($request->title) ;
	$price=addslashes($request->price) ;
	$unit=addslashes($request->unit) ;

		//return Redirect::to('detail/'.$img.'/'.$title.'/'.$price.'/'.$unit);
	return view('detail');
	}
}
