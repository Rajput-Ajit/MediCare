<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use  App\Models\User;
use  App\Models\Order;
use  App\Models\UserAddress;

class ProfileController extends Controller
{
    //
    function userProfile(){
        $oldSearch = '';
        $qty = 0;
        $userId = session('user');
        $user = User::where('id', $userId)->first();
        
        $name = $user->firstName;
        $lastName = $user->lastName;
        $email = $user->email;
        $phone = $user->phone;
        
        $addresses = $user->addresses;
        $addressCount = $addresses->count();

        $orders = $user->orders;
        $orderCount = $orders->count();

        return view('profile', compact('oldSearch', 'qty', 'name', 'lastName', 'email', 'phone', 'addresses', 'addressCount', 'orderCount', 'orders')); //
    }

    public function personalInfo(){
        $userId = session('user');
        $user = User::where('id', $userId)->first();
        return view('personalInformation', compact("user"));
    }

    public function myOrders(){
        $userId = session('user');
        $orders= Order::where('user_id', $userId);
        $orderCount = $orders->count();
        return view('myOrders', compact('orderCount'));
    }

    public function myAddress(){
        $userId = session('user');
        $addresses = UserAddress::where('user_id', $userId)->get();
        $addressCount = $addresses->count();
        return view('myAddress', compact('addressCount', 'addresses'));
    }

    public function myPrescription(){
        return view('myPrescription');
    }

    public function updateProfileInfo(Request $request){
        
        $validator = \Validator::make($request->all(), [
            'firstName'          => 'required|string|min:2|max:50',
            'lastName'           => 'required|string|max:50',

            'date_of_birth'      => 'nullable|date|before:today',

            'phone'              => 'required|digits:10',

            'alternate_phone'    => 'nullable|digits:10',
            'emergency_contact'  => 'nullable|digits:10',

            'allergies'          => 'nullable|string',
            'medications'        => 'nullable|string',
            'medical_conditions' => 'nullable|string',

            'height_cm'          => 'nullable|numeric|min:50|max:300',
            'weight_kg'          => 'nullable|numeric|min:20|max:300',

            'gender'             => 'required|in:male,female,other',

            'blood_group'        => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',

            'marital_status'     => 'nullable|in:single,married,divorced,widowed',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        // update user 
        $id = session('user');
        
        //$user = User::find($id);

        //$user->update($request->all());

        /*
        $user = User::find($id);
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        //want to update only allowed fields recommended
        $user->update($request->only(['name', 'email', 'phone']));

        */
        
        $user = User::where('id', $id)->update([
                                                    'firstName' => $request->firstName,
                                                    'lastName' => $request->lastName,
                                                    'date_of_birth' => $request->date_of_birth,
                                                    'phone' => $request->phone,
                                                    'alternate_phone' => $request->alternate_phone,
                                                    'emergency_contact' => $request->emergency_contact,
                                                    'allergies' => $request->allergies,
                                                    'medications' => $request->medications,
                                                    'medical_conditions' => $request->medical_conditions,
                                                    'height_cm' => $request->height_cm,
                                                    'weight_kg' => $request->weight_kg,
                                                    'gender' => $request->gender,
                                                    'blood_group' => $request->blood_group,
                                                    'marital_status' => $request->marital_status
                                                ]);
        

        return response()->json([
                'status' => 200,
                'message' => 'User Profile Updated Successfully',
                'userName' => $request->firstName." ".$request->lastName
        ], 200);
        //return response()->json($request->all());
    }

    public function updateProfilePic(Request $request){
        // validate
        
        $request->validate([
            'profile' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);
        
        if ($request->hasFile('profile')) {

            $file = $request->file('profile');
            $filename = time().'.'.$file->getClientOriginalExtension();

           // $upload = $file->storeAs('public/profile', $filename);
            $upload = $file->storeAs('profile', $filename, 'public');
                if($upload){
                    $id = session('user');
                    $user = User::find($id);
                    
                    if ($user->profile_image) {
                        $oldPath = storage_path('app/public/' . $user->profile_image);

                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }

                    $user->profile_image = 'profile/' . $filename;
                    $user->save();

                    return back()->with('success', 'Profile Photo Updated Successfully');
                }else{
                    return back()->with('error', 'Failed To Update Profile Photo');
                }

        }else {
            return back()->with('error', 'File not found');
        }
    }

    public function addAddress(Request $request){
        
        $validator = \Validator::make($request->all(), [
            "addressType" => 'required|in:home,office,other',
            "fullName" => 'required|min:2|max:50',
            'phone'    => 'required|digits:10',
            "flat"  => 'required',
            "street" => 'required|string|max:50',
            "city" => 'required|string|min:2|max:40',
            "state" => 'required|string|min:2|max:30',
            "pincode" => 'required|digits:6',
            'alternate_phone'    => 'nullable|digits:10',
            "defaultAddress" => 'nullable|max:2'
         ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $id = session('user');

        $data = [
                    'user_id' => $id,
                    'address_type' => $request->addressType,
                    'full_name' => $request->fullName,
                    'flat_no' => $request->flat,
                    'street_address' => $request->street,
                    'city' => $request->city,
                    'state' => $request->state,
                    'pincode' => $request->pincode,
                    'phone_number' => $request->phone,
                    'alternate_phone' => $request->alternate_phone,
                    'isDefault' => $request->defaultAddress
                ];

        if($request->defaultAddress == "on"){
            $user = UserAddress::where('user_id', $id)->update([
                'isDefault' => null
            ]);

            $data['isDefault'] = 1;
        }
        
        try{
            $insert = UserAddress::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Address added successfully',
                'data' => $insert
            ]);

        } catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
