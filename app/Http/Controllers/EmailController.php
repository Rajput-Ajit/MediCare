<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class EmailController extends Controller
{
    //
    public function sendEmailViaNode(Request $request)
    {
        // Make POST request to your Node.js API
        $otp = rand(100000, 999999);
        $email = $request->input('email');

        $response = Http::post('http://localhost:3000/phpemail', [
            'email' => 'ajitchhanwal1234@gmail.com',
            'otp' => $otp,
        ]);

        // Return Node.js API response
        return $response->json();
    }
}


