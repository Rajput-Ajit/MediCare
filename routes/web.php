<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineProductsController;
use App\Http\Controllers\HealthProductsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\EmailController; // this is for node js node mailer 
use App\Http\Controllers\MailController;



Route::get('/send-node-email', [EmailController::class, 'sendEmailViaNode']);

Route::post('/email', [MailController::class, 'sendOtp']);


Route::controller(AuthController::class)->group(function (){
    Route::get("/login", "showLoginForm")->name("login");
    Route::get("/signup", "showSignupForm")->name("signUp");
    Route::post("/SignupPost", "postSignUp");
    Route::post("/LoginPost", "postLogin");
    Route::get("/LoginPost", "showLoginForm"); // redirect to login for get method 
    Route::get("/verificationPending/{email}", "pendingStatus")->name("verificationPending");    // Route For Verification Pending 
    Route::post("/verifyOtp", "verifyOtp")->name("verifyOtp"); // verify user email with otp
});

Route::get("/", [HomeController::class, "index"])->name("dashboard")->middleware('LoginUser');
Route::get("/logout", [AuthController::class, 'logout'])->name('logout');

Route::controller(MedicineProductsController::class)->middleware('LoginUser')->group(function (){
    //Route::get("/medicines", "products")->name("medicine"); 
    Route::get("/medicines", "productsNewMethod")->name("medicine"); //productsNewMethod
    Route::post("/medicines", "productsNewMethod")->name("post-medicine"); //productsNewMethod
    //Route::get("/medicines/{category}", "category")->name("medicine.category");
    Route::post("/addCart/{id}", "addCart")->name("addCart"); // add to cart
    Route::get("/cart", "userCart")->name("cart"); // cart page
    Route::Post("/cartIncrementDecrement/{id}", "updateCart")->name("cartPageUpdate"); // cart page increment decrement
});

// Route For Controller User Profile
Route::controller(ProfileController::class)->middleware('LoginUser')->group(function (){
    Route::get("/profile", "userProfile")->name("userProfile"); //userProfile
    Route::get("/profile/personal-info", "personalInfo")->name("personalInfo"); //personalInfo
    Route::get("/profile/my-orders", "myOrders")->name("myOrders"); // My Orders
    Route::get("/profile/my-address", "myAddress")->name("myAddress"); // My Address
    Route::get("/profile/my-prescription", "myPrescription")->name("myPrescription"); // My Prescription

    // Post Route For Update
    Route::post("/profile/update", "updateProfileInfo")->name("updateProfileInpfo");
    Route::post("/profile/updatePhoto", "updateProfilePic")->name("updateProfilePic");
    Route::post("/profile/addAddress", "addAddress")->name("addAddress");
});


   // Route::get("/health-products", [HealthProductsController::class, "products"])->name("healthProducts");
Route::get("/upload-prescription", [HealthProductsController::class, "uploadPrescription"])->name("uploadPrescription")->middleware('LoginUser');

Route::controller(AdminController::class)->prefix("admin")->name("admin.")->group(function (){
    Route::get("/", "dashboard")->name("dashboard");
    Route::get("/dashboard", "dashboard")->name("dashboard");
    Route::get("/add-medicines", "addMedicines")->name("add-medicines");
    Route::get("/user-management", "userManagement")->name("user-management");
    Route::get("/pharmacy-management", "pharmacyManagement")->name("pharmacy-management");
    Route::get("/medicine-management", "medicineManagement")->name("medicine-management");
    Route::get("/order-management", "orderManagement")->name("order-management");
    // now this is for the post requests
    Route::post("/addMedicinesPost", "addMedicinesPost")->name("add-medicines-post");
});
