<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --pharmeasy-primary: #10847e;
            --pharmeasy-secondary: #ff6900;
            --pharmeasy-light: #f8fffe;
            --pharmeasy-dark: #0a5c59;
            --pharmeasy-gradient: linear-gradient(135deg, #10847e 0%, #0a5c59 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fffe 0%, #e8f7f6 100%);
            min-height: 100vh;
        }

        /* Enhanced shadows and hover effects */
        .card, .bg-white {
            box-shadow: 0 4px 20px rgba(16, 132, 126, 0.08);
            transition: all 0.3s ease;
            border: none;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(16, 132, 126, 0.15);
        }

        /* Improved buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-primary {
            background: var(--pharmeasy-gradient);
            border: none;
        }

        .btn-outline-primary {
            border: 2px solid var(--pharmeasy-primary);
            color: var(--pharmeasy-primary);
        }

        .btn-outline-primary:hover {
            background: var(--pharmeasy-primary);
            border-color: var(--pharmeasy-primary);
        }

        /* =================== NAVBAR STYLES =================== */
        .modern-navbar {
            transition: background 0.4s ease, box-shadow 0.4s ease;
        }

        .brand-shimmer {
            font-weight: 700;
            background: linear-gradient(90deg, #10847e, #ff6b35, #10847e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }

        .cart-link {
            transition: all 0.3s ease;
        }

        .cart-link:hover .cart-badge {
            transform: scale(1.3);
            transition: transform 0.3s ease;
        }

        .nav-search-wrapper {
            width: 40px;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-radius: 50px;
            transition: all 0.5s cubic-bezier(0.65,0,0.35,1);
        }

        .search-icon {
            color: #666;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .search-input {
            width: 0;
            opacity: 0;
            border: none;
            outline: none;
            transition: all 0.5s cubic-bezier(0.65,0,0.35,1);
            padding: 6px 8px;
            border-radius: 25px;
            background: #f1f1f1;
            margin-right: 5px;
        }

        .search-btn {
            opacity: 0;
            transform: translateX(20px);
            border-radius: 25px;
            border: none;
            padding: 6px 14px;
            background: linear-gradient(135deg,#10847e,#0a6b66);
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .nav-search-wrapper.active {
            width: 280px;
        }

        .nav-search-wrapper.active .search-input {
            width: 100%;
            opacity: 1;
        }

        .nav-search-wrapper.active .search-btn {
            opacity: 1;
            transform: translateX(0);
        }

        .nav-search-wrapper.active .search-icon {
            color: #10847e;
            transform: rotate(-15deg);
        }

        body.scrolled .modern-navbar {
            background: rgba(255,255,255,0.95);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .navbar-nav .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #10847e;
            transition: width 0.4s ease;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        /* Improved cart item styling */
        .cart-item {
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: white;
            box-shadow: 0 2px 15px rgba(16, 132, 126, 0.08);
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            box-shadow: 0 4px 25px rgba(16, 132, 126, 0.12);
            transform: translateY(-1px);
        }

        .product-icon {
            background: linear-gradient(135deg, var(--pharmeasy-light) 0%, #e8f7f6 100%);
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80px;
        }

        /* Quantity controls */
        .quantity-control {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .quantity-control .btn {
            border-radius: 0;
            padding: 0.5rem 0.75rem;
        }

        .quantity-control input {
            border-left: none;
            border-right: none;
            text-align: center;
            font-weight: 600;
        }

        /* Enhanced badges */
        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Order summary styling */
        .order-summary {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(16, 132, 126, 0.12);
            position: sticky;
            top: 120px;
        }

        /* Price styling */
        .price-current {
            color: var(--pharmeasy-primary);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .price-original {
            color: #9ca3af;
            text-decoration: line-through;
            font-size: 0.9rem;
        }

        /* Alert styling */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        /* Footer improvements */
        .footer {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        /* Newsletter section */
        .newsletter {
            background: var(--pharmeasy-gradient);
            border-radius: 16px;
            margin: 2rem 0;
            padding: 2rem;
        }

        /* Prescription upload area */
        .upload-area {
            background: linear-gradient(135deg, var(--pharmeasy-light) 0%, #e8f7f6 100%);
            border: 2px dashed var(--pharmeasy-primary);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            background: rgba(16, 132, 126, 0.05);
            border-color: var(--pharmeasy-dark);
        }

        /* Mobile responsiveness improvements */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .cart-item {
                padding: 1rem;
            }
            
            .product-details {
                margin-top: 1rem;
            }
            
            .quantity-price-controls {
                margin-top: 1rem;
                text-align: center;
            }
            
            .order-summary {
                position: relative;
                top: 0;
                margin-top: 2rem;
            }
            
            .cart-actions {
                text-align: center;
                margin-top: 1rem;
            }

            .mobile-stack {
                margin-top: 1rem;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 10px;
            }
            
            .cart-item {
                margin: 0 -5px 1rem -5px;
                border-radius: 8px;
            }
            
            .product-icon {
                min-height: 60px;
                padding: 1rem;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--pharmeasy-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--pharmeasy-dark);
        }

        /* Empty Cart Styles */
        .empty-cart {
            background: white;
            border-radius: 10px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin: 2rem auto;
            max-width: 600px;
        }

        .empty-cart-icon {
            width: 200px;
            height: 200px;
            margin: 0 auto 2rem;
            background-color: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .empty-cart-icon i {
            font-size: 5rem;
            color: #6c757d;
            opacity: 0.3;
        }

        .empty-cart h2 {
            color: #212529;
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .empty-cart p {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .empty-cart-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .empty-cart {
                padding: 2rem 1rem;
                margin: 1rem;
            }

            .empty-cart-icon {
                width: 150px;
                height: 150px;
            }

            .empty-cart-icon i {
                font-size: 3.5rem;
            }

            .empty-cart h2 {
                font-size: 1.5rem;
            }

            .empty-cart p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Top Info Bar -->
    <div class="bg-dark text-white py-2 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <small>
                        <i class="fas fa-phone me-2"></i> 24/7 Helpline: 1800-102-3456
                        <span class="mx-3">|</span>
                        <i class="fas fa-truck me-2"></i> Free delivery on orders above ₹199
                    </small>
                </div>
                <div class="col-md-4 text-end">
                    <small>
                        <i class="fas fa-shield-alt me-2"></i> 100% Genuine Medicines
                    </small>
                </div>
            </div>
        </div>
    </div>

     <!-- Navigation -->
    @include("component.navbar", ['page' => "Cart", 'oldSearch' => $oldSearch, 'qty' => $qty])

    <!-- Cart Section -->
    <div class="container my-4" id="emptyCart">
        <div class="row g-4">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="bg-white rounded-4 shadow-sm">
                    <!-- Cart Header -->
                    <div class="border-bottom p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">
                            <h4 class="mb-0 fw-bold" style="color: var(--pharmeasy-primary);">
                                <i class="fas fa-shopping-cart me-2"></i>My Cart <span class="text-muted fs-6">({{$qty}} items)</span>
                            </h4>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash me-1"></i>Clear Cart
                            </button>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="border-bottom p-4">
                        @if($addressesCount > 0)
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-map-marker-alt me-2"></i>Delivery Address
                                    </h6>
                                    @foreach($addresses as $address)
                                        <input type="radio" name="address_id" value="{{$address->id}}" style="display:none;" checked>
                                        <div class="bg-light rounded-3 p-3">
                                            <p class="mb-1 fw-bold">{{ $address->name }}</p>
                                            <p class="text-muted mb-1">{{ $address->flat_no }}, {{ $address->street_address }}</p>
                                            <p class="text-muted mb-1">{{ $address->city }}, {{$address->state}} - {{$address->pincode}}</p>
                                            <p class="text-muted mb-0"><i class="fas fa-phone me-1"></i>{{ $address->phone_number }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i>Change
                                </button>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt fa-3x text-muted opacity-50"></i>
                                </div>
                                <h6 class="fw-bold mb-2">No Delivery Address Added</h6>
                                <p class="text-muted mb-3">Please add a delivery address to proceed with your order</p>
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Add Delivery Address
                                </button>
                            </div>
                        @endif    
                    </div>
                    
                    <!-- Cart Item  -->
                    @php
                        $grandTotal = 0;
                        $totalDiscounted = 0;
                        $cartCount = 0;
                        $uploadPrescription = false;
                        $requiredCount = 0;
                    @endphp

                    <div id="myCarts">
                        @php
                            $deliveryCharges = 50;
                        @endphp
                        @foreach($cartItems as $cartItem)
                        
                        @php
                            $medicine = ($cartItem['medicine']);
                            $quantity = $cartItem['quantity'];
                            // above price is multipled by quantity
                            $discountedPrice = $quantity * $medicine['sellingPrice']; // with quantity
                            $mrp = $quantity * $medicine['mrp']; // with quantity
                            $img = $medicine['productImages'];

                            $percentOff = 0;
                            if($mrp > 0){
                                $percentOff = (($mrp - $discountedPrice) / $mrp) * 100;
                            }
                        @endphp
                        
                        <x-cart-item :cart-item="$cartItem"/>
                        
                        @continue($medicine['stockQuantity'] == 0) {{-- skip this iteration if out of stock --}}

                        @php
                            // calculation for summary
                            $grandTotal += $mrp;
                            $totalDiscounted += $discountedPrice;
                            $cartCount++;
                        @endphp
                            
                        @if($medicine['prescriptionRequired'] == 'yes')
                            @php
                                $uploadPrescription = true;
                                $requiredCount++;
                            @endphp
                        @endif

                        @endforeach
                    </div>
                </div>
                <input type="hidden" id="prescriptionRequired"  value="{{ $uploadPrescription ? 1 : 0 }}">
                @if($uploadPrescription)
                    <!-- Enhanced Prescription Upload -->
                    <div class="bg-white rounded-4 shadow-sm mt-4 p-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                            <i class="fas fa-upload me-2"></i>Upload Prescription
                        </h6>
                        <div class="upload-area">
                            <i class="fas fa-cloud-upload-alt display-4 mb-3" style="color: var(--pharmeasy-primary);"></i>
                            <h6 class="fw-bold mb-2">Prescription required for {{ $requiredCount }} products in your cart.</h6>
                            <p class="text-muted mb-3">Drag and drop or click to select files</p>
                            <button class="btn btn-outline-primary mb-3" id="selectFile">
                                <i class="fas fa-paperclip me-2"></i>Choose Files
                            </button>
                            <div style="color:green;">
                                <small class="text-muted" ></small>
                            </div>
                            <form id="prescriptionForm" enctype="multipart/form-data">
                                @csrf

                                <input 
                                    type="file" 
                                    id="fileInput" 
                                    name="prescription"
                                    style="display:none;" 
                                    accept=".jpg,.jpeg,.png,.pdf"
                                >
                            </form>

                            <div>
                                <small class="text-muted" id="myfileName">Accepted formats: JPG, PNG, PDF (Max 5MB)</small>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Continue Shopping -->
                <div class="mt-4 d-flex flex-column flex-sm-row gap-3">
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Enhanced Order Summary -->
            <div class="col-lg-4" id="orderSummary">
                @if($cartCount > 0)
                <x-order-summary :cartCount="$cartCount" :grandTotal="$grandTotal" :deliveryCharges="$deliveryCharges" :totalDiscounted="$totalDiscounted" :addressesCount="$addressesCount"/>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        // =================== SEARCH FUNCTIONALITY ===================
        // Search Input Toggle
        const searchWrapper = document.querySelector('.nav-search-wrapper');
        const searchInput = document.querySelector('.search-input');
        
        if(searchWrapper && searchInput) {
            searchWrapper.querySelector('.search-icon').addEventListener('click', () => {
                searchWrapper.classList.toggle('active');
                if(searchWrapper.classList.contains('active')) searchInput.focus();
            });
        }
    
    $(document).ready(function () {
        $(document).on("click",  ".updateCart", async function(){
            try{
                const id = $(this).data("id");
                const action = $(this).data("type");

                const response = await fetch(`/cartIncrementDecrement/${id}`, {
                    method : "post",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    body: JSON.stringify({
                        action : action
                    }),
                });
                
                if(!response.ok){
                   throw new Error('Request failed with status ' + response.status);
                }

                const result = await response.json();
                if(result.status == "success"){
                    $("#myCarts").html(result.html);
                    $("#orderSummary").html(result.summary);
                }else{
                    $("#emptyCart").html(result.html);
                }
                

            }
            catch(error){
                console.error('Error:', error.message);
            }
        });

        $("#selectFile").on("click", function () {
               $("#fileInput").trigger("click");
        });

        $("#fileInput").on("change", function () {
            if (this.files.length > 0) {
               //let fileName = this.files[0].name;
               let fileName = this.files[0].name;
               $("#myfileName").text(fileName);
               
            }
        });

        // proceed to check out
        $("#proceedCheckout").on("click", function () {

            let isRequired = $("#prescriptionRequired").val() == 1;
            let hasFile   = $("#fileInput").length && $("#fileInput")[0].files.length > 0;

            // ✅ Case 1: prescription required but not uploaded
            if (isRequired && !hasFile) {
                 
                alert("Prescription is required for some medicines");
                return;
            }

            // ✅ Case 2: prescription required & uploaded
            if (isRequired && hasFile) {
               // uploadPrescriptionAndContinue();
               alert("All Good Ready To Submit"); 
               return;
            }

            // one function if no prescription required
        });

        // final submit and proceed
        function uploadPrescriptionAndContinue() {

            let formData = new FormData($("#prescriptionForm")[0]);
            let addressId = $("input[name='address_id']:checked").val();
                formData.append("address_id", addressId);

            $.ajax({
                url: "/checkout/upload-prescription",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val()
                },
                success: function (res) {
                    if (res.status === "success") {
                        window.location.href = "/checkout";
                    }
                },
                error: function () {
                    alert("Prescription upload failed");
                }
            });
        }



    });
    </script>
</body>
</html>