<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineProductsController;
use App\Http\Controllers\HealthProductsController;
use App\Http\Controllers\admin\AdminController;


Route::get("/", [HomeController::class, "index"]);
Route::get("/medicines", [MedicineProductsController::class, "products"]);
Route::get("/health-products", [HealthProductsController::class, "products"]);

Route::controller(AdminController::class)->prefix("admin")->name("admin.")->group(function (){
    Route::get("/dashboard", "dashboard")->name("dashboard");
    Route::get("/user-management", "userManagement")->name("user-management");
    Route::get("/pharmacy-management", "pharmacyManagement")->name("pharmacy-management");
    Route::get("/medicine-management", "medicineManagement")->name("medicine-management");
    Route::get("/order-management", "orderManagement")->name("order-management");
});
