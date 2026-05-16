<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

use App\Http\Controllers\MailController;
use Carbon\Carbon;

class AuthController extends Controller
{
   function showSignupForm() {
        return view("signup");
    }

    function postSignUp(Request $req){
        $req->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' will check against 'password_confirmation'
            'agreeTerms' => 'accepted',
            
        ]);

        $name = $req->firstName;
        $user_email = urlencode($req->email);
        $email = ($req->email);

        $otp = rand(100000, 999999);

        $user = User::create([
            'firstName' => $name,
            'lastName' => $req->lastName,
            'email' => $req->email,
            'phone' => $req->phone,
            'ageGroup' => $req->dateOfBirth,
            'gender' => $req->gender,
            'password' => Hash::make($req->password),
            'userType' => 'user',
            'status' => 'pending',
            'otp' => $otp, // add this line
        ]);

        // Send OTP
            $subject = "OTP Verification";
                
            $mailController = new MailController();
            $mailController->sendOtp($req->email, $otp, $subject, $name);
            
            $req->session()->put('type', 'otp');
            $req->session()->put('email', $email);

            return redirect()->route("verificationPending", compact('email')); 
            

        //return redirect()->route('login');
    }

    function showLoginForm() {
        return view("login");   
    }

    function postLogin(Request $req){
        // input validate
        $req->validate([
            'email' => 'required | email',
            'password' => 'required|string'
        ]);

        // find user from db
        $user = User::where('email', $req->email)->first();

        if($user && Hash::check($req->password, $user->password)){
           if($user->status == 'pending'){
                $email = $req->email;
                $otp = rand(100000, 999999);

                // update otp in DB
                $user->update([
                    'otp' => $otp           //  OTP  verification
                ]);

                // Send OTP
                $subject = "OTP Verification";
                $name = $user->name;
                    
                $mailController = new MailController();
                $mailController->sendOtp($req->email, $otp, $subject, $name);
                
                $req->session()->put('type', 'otp');
                $req->session()->put('email', $email);
                return redirect()->route("verificationPending", compact('email')); 
           }
            // Auth::login($user);
           $id = $user->id;
           $name = $user->firstName;

           $req->session()->put('user', $id);
           $req->session()->put('login_user', $name); // login_user
           
           $qty = Cart::where('user_id', $id)->sum('quantity');
            $req->session()->put('cartQty', $qty);
           
            return redirect()->route("dashboard");
        }
        
        return redirect()->back()->with('error', "Email/Password Did not match");
    }

    function pendingStatus($email){
        $email = urldecode($email);
        return view("verificationPending", compact('email'));
    }

    function verifyOtp(Request $req){
        $email = $req->session()->get('email');
        $otp = $req->otp;

        // get user from db
        $user = User::where('email',  $email)->first();
        
        if($user && $user->otp == $otp){
            $timeFromDb = $user->otp_time;

            if ((Carbon::now()->subMinutes(10))->greaterThanOrEqualTo(Carbon::parse($timeFromDb))) {
                return redirect()->back()->with('error', 'OTP Expired');
            }    

            $id = $user->id;
            $req->session()->put('user', $id);
            
            $user->update([
                'status' => 'verified', // example field
                'otp' => null           // clear OTP after verification
            ]);
           return redirect()->route("login")->with('success', 'OTP Verified Successfully'); // success
        }else{
            return redirect()->route("login")->with('error', 'OTP Expired');
        }
        
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect()->route("login")->with('success', 'Logout Successfully');
    }
}
