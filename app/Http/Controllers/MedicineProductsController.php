<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Cart;
use App\Models\UserAddress;

class MedicineProductsController extends Controller
{
    function products(Request $request){
		$oldSearch = '';
		$userId = session('user');
		$qty = Cart::where('user_id', $userId)->sum('quantity');
		$types = Medicine::selectRaw('medicineType, COUNT(*) as total')
				->groupBy('medicineType')
				->get();
		
		$manufacturers = Medicine::where('manufacturer', '!=', 'other')->distinct()->pluck('manufacturer');

		if($request->has('search')){ // AND !empty($request->query('search'))
			$search = $request->query('search');
			$oldSearch = $search;
			$products = Medicine::where('medicineName', 'LIKE', '%'.$search.'%')->where('status', 'active')->orderBy('medicineName', 'asc')->paginate(5);
		}elseif($request->has('category')){
			$category = $request->query('category');
			$products = Medicine::where('category', $category)->where('status', 'active')->orderBy('medicineName', 'asc')->paginate(5);
		}else{
			$products = Medicine::where('status', 'active')->orderBy('medicineName', 'asc')->paginate(5);
		}

		if ($request->ajax()) {
			return response()->json($products); // send JSON
		}

		return view("medicineproducts", compact('products', 'oldSearch', 'qty', 'types', 'manufacturers'));
	}

	function productsNewMethod(Request $request){ // same function but this is more easy to filter and sorting
		$oldSearch = '';
		$userId = session('user');
		$qty = Cart::where('user_id', $userId)->sum('quantity');
		$typesdb = Medicine::selectRaw('medicineType, COUNT(*) as total')
				->groupBy('medicineType')
				->get();
		
		$manufacturers = Medicine::where('manufacturer', '!=', 'other')->distinct()->pluck('manufacturer');

		$products = Medicine::query(); // initialise empty query

		if($request->has('search')){ // AND !empty($request->query('search'))
			$search = $request->input('search');
			$oldSearch = $search;
			$products->where('medicineName', 'LIKE', '%'.$search.'%');//->where('status', 'active')->orderBy('medicineName', 'asc')->paginate(8);
		}

		if($request->has('category')){
			$category = $request->input('category');
			$products->where('category', $category);//->where('status', 'active')->orderBy('medicineName', 'asc')->paginate(8);
		}

		if($request->has('types') && !empty($request->input('types'))){ // here types is in array
			$types = (array)$request->input('types', []);
			$products->whereIn('medicineType', $types);
		}

		if($request->has('brands') && !empty($request->input('brands'))){ // here brands are also in array
			$brands = (array)$request->input('brands', []	);
			$products->whereIn('manufacturer', $brands);
		}

		if($request->has('availability') && $request->input('availability') == 'IncludeOutofStock'){
			$products->whereIn('status', ['active', 'Out Of Stock']);
		}else{
			$products->where('status', 'active');
		}

		if($request->has('sortby') && !empty($request->input('sortby'))){
			switch($request->input('sortby')){
				case "nameAsc":
					$products->orderBy('medicineName', 'asc');
					break;
				case "nameDsc":
					$products->orderBy('medicineName', 'desc');
					break;
				case "priceAsc":
					$products->orderBy('mrp', 'asc');
					break;
				case "priceDsc":
					$products->orderBy('mrp', 'desc');
					break;
				default:
					$products->orderBy('medicineName', 'asc');
				break;
			}
		}else{
			$products->orderBy('medicineName', 'asc');
		}

		$products = $products->paginate(8);

		if ($request->ajax()) {
			return response()->json($products); // send JSON
		}

		return view("medicineproducts", compact('products', 'oldSearch', 'qty', 'typesdb', 'manufacturers'));
	}
	

	function addCart(Request $request, $id){
		$userId = session('user');
		$productId = $id;
		$cart = Cart::where('product_id', $productId)->where('user_id', $userId)->first();
		if($cart){
			$cart->quantity += 1;
      		
			if($cart->save()){
				$qty = Cart::where('user_id', $userId)->sum('quantity');
				return response()->json(['status' =>'success', 'qty' => $qty]);
			}else{
				return response()->json(['status' =>'error']);
			}
		}else{
			$add_cart = new Cart();
			$add_cart->user_id = $userId;
			$add_cart->product_id = $productId;
			
			if($add_cart->save()){
				$qty = Cart::where('user_id', $userId)->sum('quantity');
				return response()->json(['status' =>'success', 'qty' => $qty]);
			}else{
				return response()->json(['status' =>'error']);
			}
		}
		
	}

	function userCart(){
		$oldSearch = "";
		$userId = session('user');
      	$qty = Cart::where('user_id', $userId)->sum('quantity');
		$cartItems = Cart::with('medicine')
					->where('user_id', $userId)
					->get()
					->toArray();
		if (empty($cartItems)) {
			return view("emptyCart", compact("oldSearch", "qty", "cartItems"));
		}

		$addresses = UserAddress::where('user_id', $userId)->where('isDefault', 1)->get(); 
		$addressesCount = $addresses->count();
		
		return view("cart", compact("oldSearch", "qty", "cartItems", "addressesCount", "addresses"));
	}

	// this cart is only for practice purpose copied from some where
	function userCartCopied()
		{
			try {
				$oldSearch = "";
				$userId = session('user');

				// If user not logged in
				if (!$userId) {
					return redirect('/login')->with('error', 'Please login first.');
				}

				// Fetch cart items with medicine
				$cartItems = Cart::with('medicine')
					->where('user_id', $userId)
					->get();

				// If cart is empty, no need for more queries
				if ($cartItems->isEmpty()) {
					$qty = 0;
					return view("emptyCart", compact("oldSearch", "qty", "cartItems"));
				}

				// Count quantity from already loaded items (no extra DB call)
				$qty = $cartItems->sum('quantity');

				// Load user addresses
				$addresses = Address::where('user_id', $userId)->get();
				$addressesCount = $addresses->count();

				return view("cart", compact(
					'oldSearch',
					'qty',
					'cartItems',
					'addresses',
					'addressesCount'
				));

			} catch (\Exception $e) {

				// Log error for debugging
				\Log::error("Cart load error: " . $e->getMessage());

				return redirect()->back()->with(
					'error',
					'Something went wrong while loading your cart.'
				);
			}
		}

	/////////////////

	// increment or decrement from cart page updated
	public function updateCart(Request $request, $id)
	{
		$userId = session('user');
		$productId = $id;
		$action = $request->input('action', 'increment'); // default increment

		// Get or create cart item
		$cart = Cart::firstOrCreate(
			['user_id' => $userId, 'product_id' => $productId],
			['quantity' => 0]
		);

		if ($action === 'increment') {
			$cart->increment('quantity');
		} elseif ($action === 'decrement' && $cart->quantity > 0) {
			$cart->decrement('quantity');
		}elseif($action === 'trash'){
			$cart->delete();
		}

		// Remove item if quantity becomes 0
		if ($cart->quantity == 0) {
			$cart->delete();
		}

		try {
			// Get updated cart for the user with product details
			$cartItems = Cart::with('medicine')->where('user_id', $userId)->get();

			$grandTotal = 0;
			$totalDiscounted = 0;
			$deliveryCharges = 50; // example fixed delivery
			// also useful for empty cart
			$html = "";
			$message = "success";
			// variable for order summary 
			$summary = "";
			$cartCount = 0;

			
			foreach ($cartItems as $item) {
				$medicine = $item->medicine;
				$mrp = $item->quantity * $medicine->mrp;
				$discountedPrice = $item->quantity * $medicine->sellingPrice;

				$html .= view('components.cart-item', [
							'medicine' => $item['medicine'],
							'quantity' => $item['quantity'],
							'img' => $item['medicine']['productImages'],
							'discountedPrice' => $item['quantity'] * $item['medicine']['sellingPrice'],
							'mrp' => $item['quantity'] * $item['medicine']['mrp'],
							'percentOff' => (($item['medicine']['mrp'] - $item['medicine']['sellingPrice']) / $item['medicine']['mrp']) * 100,
						])->render();
				
				if ($item['medicine']['stockQuantity'] == 0) continue; // skip if no medicine or zero quantity
					$cartCount++;
					$grandTotal += $mrp;
					$totalDiscounted += $discountedPrice;
				
			}
			
			if($cartCount > 0){
				$summary = view('components.order-summary', ['cartCount' => $cartCount, 'grandTotal' => $grandTotal, 'deliveryCharges' => $deliveryCharges, 'totalDiscounted' => $totalDiscounted])->render();
			}

			$hasItems = Cart::where('user_id', $userId)->exists(); // check cart is empty or not
			if(!$hasItems){
				$html = view("components.empty-cart")->render();
				$message = "empty";
			}

			return response()->json([
				'status' => $message,
				'html' => $html,
				'summary' => $summary,
			]);
		}catch (\Throwable $e) {
			return response()->json([
				'error' => $e->getMessage(),
				'file' => $e->getFile(),
				'line' => $e->getLine(),
			], 500);
		}
	}


}
