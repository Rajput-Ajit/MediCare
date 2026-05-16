<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;


class AdminController extends Controller
{   

    function dashboard(){
        return view("admin.dashboard");
    }

    function addMedicines(){
        return view("admin.add-medicines");
    }

    function userManagement(){
        return view("admin.user-management");
    }

    function pharmacyManagement(){
        return view("admin.pharmacy-management");
    }

    function medicineManagement(){
        $name = "Ajit Rajput";
        $totalMedicine = Medicine::count();
        $inStock = Medicine::where('stockQuantity', '>', '0')->count();
        $lowStock = Medicine::whereColumn('stockQuantity', '<=', 'minStock')->where('stockQuantity', '>', 0)->count();
        $outOfStock = Medicine::where('stockQuantity', 0)->count();

        $medicines = Medicine::orderBy('medicineName', 'asc')->paginate(10);

        return view("admin.medicine-management", compact('name', 'totalMedicine', 'inStock', 'lowStock', 'outOfStock', 'medicines'));
    }

    function orderManagement(){
        return view("admin.order-management");
    }

    // now functions for post methods
    function addMedicinesPost(Request $request){
        $request->validate([
            'medicineName' => 'required|string|max:50',
            'manufacturer' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'medicineType' => 'required|string|max:50',
            'packSize' => 'required|string|max:50',
            'unitQuantity' => 'required|string|max:4',
            'prescriptionRequired' => 'required|string|max:3',
            'description' => 'required|string|max:500',
            'mrp' => 'required|numeric|min:0',
            'sellingPrice' => 'required|string|max:5',
            
            'gst' => 'required|integer|min:0|max:100',
            'stockQuantity' => 'required|string|max:4',
            'minStock' => 'required|string|max:4',
            'batchNumber' => 'required|string|max:50',
            'expiryDate' => 'required|date|after:today',
            'productImages' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'uses' => 'required|string|max:500',
            'dosageInstructions' => 'required|string|max:500',
            'sideEffects' => 'required|string|max:500',
            'precautions' => 'required|string|max:500',
            'composition' => 'required|string|max:500',
            'storageConditions' => 'required|string|max:500',
            'status' => 'required|string|max:10'
        ]);
       
       // $upload = $request->file('productImages')->store("uploads"); // not wokrs
        $filename = time() . $request->file('productImages')->getClientOriginalName();
        $upload = $request->file('productImages')->storeAs('uploads', $filename, 'public');
       
        $medicine = new Medicine();
        
        $medicine->medicineName = $request->medicineName;
        $medicine->manufacturer = $request->manufacturer;
        $medicine->category = $request->category;
        $medicine->medicineType = $request->medicineType;
        $medicine->packSize = $request->packSize;
        $medicine->unitQuantity = $request->unitQuantity;
        $medicine->prescriptionRequired = $request->prescriptionRequired;
        $medicine->description = $request->description;
        $medicine->mrp = $request->mrp;
        $medicine->sellingPrice = $request->sellingPrice;
        $medicine->gst = $request->gst;
        $medicine->stockQuantity = $request->stockQuantity;
        $medicine->minStock = $request->minStock;
        $medicine->batchNumber = $request->batchNumber;
        $medicine->expiryDate = $request->expiryDate;
        $medicine->productImages = $upload; // uploaded image path
        $medicine->uses = $request->uses;
        $medicine->dosageInstructions = $request->dosageInstructions;
        $medicine->sideEffects = $request->sideEffects;
        $medicine->precautions = $request->precautions;
        $medicine->composition = $request->composition;
        $medicine->storageConditions = $request->storageConditions;
        $medicine->status = $request->status;

        /*
        if ($request->hasFile('productImages')) {
            $imageName = time().'_'.$request->file('productImages')->getClientOriginalName();
            $path = $request->file('productImages')->storeAs('public/uploads', $imageName);

            if (!$path) {
                return back()->with('error', 'Failed to upload image.');
            }

            $medicine->image = $imageName;
        }
            */

        if($medicine->save()){
            return back()->with('success', 'Medicine Added Successfully');
        }else{
            return back()->with('error', 'Failed to add medicine.');
        }

        
    }

}
