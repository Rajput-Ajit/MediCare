<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineProductsController extends Controller
{
    function products(){
		return view("medicineproducts");
	}
}
