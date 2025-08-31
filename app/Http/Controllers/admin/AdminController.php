<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard(){
        return view("admin.dashboard");
    }

    function userManagement(){
        return view("admin.user-management");
    }

    function pharmacyManagement(){
        return view("admin.pharmacy-management");
    }

    function medicineManagement(){
        return view("admin.medicine-management");
    }

    function orderManagement(){
        return view("admin.order-management");
    }
}
