<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Medicine;
use App\Models\Cart;

class HomeController extends Controller
{
    function index(){
		//$data = DB::select("SELECT * FROM Users");
		//$data = User::all()->toJson();
		//, ['data'=> $data];
		$userId = session('user');
		$qty = session('cartQty');

		$featuedProducts = Medicine::where('featured_product', 1)->get();
		return view("index", compact('featuedProducts', 'qty'));
	}
}
