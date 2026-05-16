<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthProductsController extends Controller
{
    function products(){
        return view("healthproducts");
    }

    function uploadPrescription(){
        return view("uploadPrescription");
    }
}
