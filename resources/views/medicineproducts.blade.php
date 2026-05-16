<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Medicines | MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* =================== CSS VARIABLES =================== */
        :root {
            --primary-color: #10847e;
            --secondary-color: #ff6b35;
            --light-green: #e8f5f4;
            --dark-green: #0a6b66;
            --orange: #ff6b35;
            --light-orange: #fff2ef;
            --light-orange: #ffd9b3;
            --light-white: #f7f7f7;
            --light-green: #b3e6b3;
        }

        /* =================== UTILITY CLASSES =================== */
        .bg-primary-custom {
            background-color: var(--primary-color) !important;
        }
        
        .bg-light-green {
            background-color: var(--light-green);
        }
        
        .bg-light-orange {
            background-color: var(--light-orange);
        }

        .fixed-img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border-radius: 8px;
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

        /* =================== FILTER SIDEBAR STYLES =================== */
        .filter-sort-sidebar {
            position: fixed;
            top: 100px;
            right: 20px;
            width: 220px;
            background: #fff;
            border-radius: 16px;
            z-index: 1050;
            transition: all 0.3s ease-in-out;
            z-index: 1;
        }

        .btn-filter-modern {
            background: linear-gradient(135deg, #10847e, #0a6b66);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 8px 12px;
            transition: 0.3s;
        }

        .btn-filter-modern:hover {
            background: linear-gradient(135deg, #0a6b66, #10847e);
            transform: translateY(-2px);
        }

        /* Mobile View */
        @media (max-width: 768px) {
            .filter-sort-sidebar {
                position: relative;
                top: auto;
                right: auto;
                width: 100%;
                margin: 15px 0;
                border-radius: 12px;
            }
        }

        /* =================== BANNER STYLES =================== */
        .banner-modern {
            background: linear-gradient(135deg, #10847e 0%, #0a6b66 100%);
            background-size: 400% 400%;
            animation: gradientShift 10s ease infinite;
        }

        .animate-slide-left {
            opacity: 0;
            transform: translateX(-30px);
            animation: slideLeft 1s forwards;
        }

        .animate-fade-in {
            opacity: 0;
            animation: fadeIn 1s 0.5s forwards;
        }

        .btn-shop {
            transition: all 0.3s ease;
        }

        .btn-shop:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .pill-icon {
            position: relative;
            animation: floatIcon 4s ease-in-out infinite;
        }

        /* =================== PRODUCT CARD STYLES =================== */
        .product-card {
            border-radius: 20px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            position: relative;
        }

        .product-img {
            width: 100%;
            transition: transform 0.6s ease, opacity 0.6s ease;
        }

        .btn-primary-custom {
            background: linear-gradient(90deg,#10847e,#6dd5ed);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:active {
            transform: scale(0.97);
        }

        .added-popup {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(135deg, #10847e, #6dd5ed);
            color: #fff;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 500;
            opacity: 0;
            pointer-events: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.5s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .added-popup i {
            font-size: 1.3rem;
            animation: bounceIcon 0.6s ease;
        }

        .added-popup.show {
            opacity: 1;
            transform: translate(-50%, -70%);
            animation: popupBounce 0.6s ease;
        }

        .popup-text .product-name {
            font-weight: 700;
            text-decoration: underline;
        }

        /* =================== KEYFRAME ANIMATIONS =================== */
        @keyframes shimmer {
            0% { background-position: -200px; }
            100% { background-position: 200px; }
        }

        @keyframes gradientShift {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        @keyframes slideLeft {
            to { opacity: 1; transform: translateX(0);}
        }

        @keyframes fadeIn {
            to { opacity: 1;}
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0);}
            50% { transform: translateY(-15px);}
        }

        @keyframes popupBounce {
            0% { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
            50% { transform: translate(-50%, -75%) scale(1.1); opacity: 1; }
            100% { transform: translate(-50%, -70%) scale(1); opacity: 1; }
        }

        @keyframes bounceIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        /* HTML: <div class="loader"></div> */
        .loader {
        width: 50px;
        padding: 8px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #25b09b;
        --_m: 
            conic-gradient(#0000 10%,#000),
            linear-gradient(#000 0 0) content-box;
        -webkit-mask: var(--_m);
                mask: var(--_m);
        -webkit-mask-composite: source-out;
                mask-composite: subtract;
        animation: l3 1s infinite linear;
        }
        @keyframes l3 {to{transform: rotate(1turn)}}
    </style>
</head>

<body class="bg-light">
    <!-- Top Info Bar -->
    <div class="bg-dark text-white py-2 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <small>
                        <i class="fas fa-phone me-1"></i> 24/7 Helpline: 1800-102-3456
                        <span class="mx-3">|</span>
                        <i class="fas fa-truck me-1"></i> Free delivery on orders above ₹199
                    </small>
                </div>
                <div class="col-md-4 text-end">
                    <small>
                        <i class="fas fa-shield-alt me-1"></i> 100% Genuine Medicines
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    @include("component.navbar", ['page' => "Medicines", 'oldSearch' => $oldSearch, 'qty' => $qty])

    <!-- Filter Button -->
    <div class="filter-sort-sidebar shadow-lg p-3">
        <!-- Filter Button -->
        <button class="btn btn-filter-modern w-100 mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterSidebar">
            <i class="fas fa-filter me-2"></i> Filters
        </button>

        <!-- Sort Dropdown -->
        <label class="form-label small text-muted mb-1">Sort by</label>
        <select class="form-select form-select-sm sort-select" id="sortBy">
            <option value="" selected>Popularity</option> <!-- default -->
            <option value="nameAsc">Name: A to Z</option>
            <option value="nameDsc">Name: Z to A</option>
            <option value="priceAsc">Price: Low to High</option>
            <option value="priceDsc">Price: High to Low</option>
        </select>
    </div>

    <!-- Offcanvas Filter Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" style="color: var(--pharmeasy-primary);">Filters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Filter Content -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-sm btn-outline-danger" id="clearFilters" data-bs-dismiss="offcanvas">Clear All Filters</button>
            </div>
            
            <!-- Categories -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Categories</h6>
                <div class="list-group list-group-flush">
                    @foreach($typesdb as $type)
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div class="text-capitalize">
                            <input class="form-check-input me-2" type="checkbox" value="{{$type->medicineType}}" name="type[]">
                            {{$type->medicineType}}
                        </div>
                        <span class="badge bg-light text-dark">{{$type->total}}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Brands -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Popular Brands</h6>
                <div class="list-group list-group-flush">
                    @foreach($manufacturers as $manufacturer)
                    <label class="list-group-item border-0 px-0 py-1 text-capitalize">
                        <input class="form-check-input me-2" type="checkbox" value="{{$manufacturer}}" name="brands[]">
                        {{$manufacturer}}
                    </label>
                    @endforeach
                    <!--
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Sun Pharma
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Dr. Reddy's
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        GSK
                    </label>
                    -->
                </div>
            </div>

            <!-- Availability -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Availability</h6>
                <div class="list-group list-group-flush">
                    <label class="list-group-item border-0 px-0 py-1 text-capitalize">
                        <input class="form-check-input me-2" type="radio" name="availability" value="InStock" checked>
                        In Stock
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="radio" value="IncludeOutofStock" name="availability">
                        Include Out of Stock
                    </label>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" id="applyFilter" data-bs-dismiss="offcanvas">
            Apply
        </button>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <!-- Product Grid -->
            <div class="col-lg-9">
                
                <!-- Featured Banner -->
                <!--
                <div class="rounded-3 p-4 mb-4 text-white position-relative overflow-hidden banner-modern">
                    <div class="row align-items-center">
                        <div class="col-md-8 banner-text">
                            <h4 class="fw-bold mb-2 animate-slide-left">Pain Relief Medicine Sale</h4>
                            <p class="mb-3 opacity-90 animate-fade-in">Get up to 25% off on top pain relief medicines</p>
                            <button class="btn btn-light fw-semibold btn-shop animate-pop">Shop Now</button>
                        </div>
                        <div class="col-md-4 text-end">
                            <i class="fas fa-pills display-1 opacity-25 pill-icon"></i>
                        </div>
                    </div>
                </div>
                -->
                <!-- Products Section -->
                <section class="bg-light">
                    <div class="container">
                        <div class="row g-4" id="productCards">
                            @if($products->isEmpty())
                                <h1 style="color:silver;">
                                    No Products Available
                                </h1>
                            @endif
                            <!-- Products -->
                            @foreach($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Load More Button -->
                @if($products->count() > 4)
                <div class="text-center mt-5 loadMore d-flex justify-content-center" id="loadMore">
                    <div class="loader"></div>
                </div>
                @else
                <div class="text-center mt-5 loadMore d-flex justify-content-center" id="loadMore">
                    <div class="loader" style="display:none;"></div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary-custom text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="mb-3">
                        <i class="fas fa-pills me-2"></i>MediCare+
                    </h4>
                    <p>India's most trusted online pharmacy. Get medicines delivered to your doorstep with just a few clicks.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Terms & Conditions</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Pain Relief</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Diabetes</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Skincare</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Baby Care</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="mb-3">Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Upload Prescription</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Order on Call</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Monthly Subscription</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Health Checkups</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i>1800-123-4567</li>
                        <li><i class="fas fa-envelope me-2"></i>support@medicare.com</li>
                        <li><i class="fas fa-clock me-2"></i>24/7 Available</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 MediCare+. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">🏥 Licensed & Regulated Pharmacy</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // =================== GLOBAL VARIABLES ===================
        let page = 1;
        let types = "";
        let brands = "";
        let availability = "";
        let sortby = "";

        
        // =================== DOCUMENT READY ===================
        $(document).ready(function(){
            // Add to cart functionality
           
            $(document).on('click', '.add-cart-btn' ,function (){
                const $card = $(this).closest('.product-card');
                const $img = $card.find('.product-img');
                const $popup = $card.find('.added-popup');
                
                const productId = $(this).data('product');
                addCart(productId);
                // Image disappears with rotation & scale
                $img.css({transform: 'scale(0) rotate(15deg)', opacity: '0'});

                // Show success popup after image disappears
                setTimeout(()=>{
                    $popup.addClass('show');
                }, 500);

                // Reappear image smoothly after message
                setTimeout(()=>{
                    $popup.removeClass('show');
                    $img.css({transform: 'scale(1) rotate(0deg)', opacity: '1'});
                }, 1500);
            });

            function addCart(id){
                $.ajax({
                    url : `/addCart/${id}`,
                    type: "post",
                    data:{
                        _token: $('meta[name="csrf-token"]').attr('content') // csrf protection
                    },
                    success: function(data) {
                        if(data.status == 'success'){
                            $('#cartQty').html(data.qty);
                            console.log(data);
                        }else{
                            alert("Something Went Wrong To Add Product");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            }

            let loadyToLoad = true;
            let path = window.location.pathname;
            let query = window.location.search;
            let queryPara = query ? `${query}&page=` : "?page=";
            // Load more functionality
            //$(document).on('click', '.loadMore', function() {
            function fetchData(){
                page++; // next page
                loadyToLoad = false;
                $.ajax({
                    url: "{{ route('medicine') }}" + queryPara + page ,
                    type: "GET",
                    data : {
                        types : types,
                        brands : brands,
                        availability : availability,
                        sortby : sortby
                    },
                    success: function(data) {
                        if(data.data.length === 0){ // no more data returned
                           $('.loader').css({ 'display': 'none' });
                            return;
                        }else if(data.data.length > 4){
                            $('.loader').css({ 'display': 'block' });
                        }

                        // Append new products to your container
                        
                        let products = data.data;
                        let html = "";
                        Object.values(products).forEach(value => {
                            const mrp = value.mrp;
                            const sellingPrice = value.sellingPrice;

                            const discount = ((mrp - sellingPrice) / mrp) * 100;

                            // To keep 2 decimal places
                            const discountFixed = discount.toFixed(2);

                            html += `<div class="col-lg-3 col-md-6">
                                        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                                        <img src="storage/${value.productImages}" class="card-img-top product-img fixed-img" alt="Medicine">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                ${value.medicineName}
                                            </h6>
                                            <p class="text-muted small mb-2">
                                                ${value.manufacturer}
                                            </p>
                                            <p class="text-muted small mb-2">
                                                ${value.packSize}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <span class="h5 text-primary-custom">₹${sellingPrice}</span>
                                                <small class="text-decoration-line-through text-muted">₹${mrp}</small>
                                            </div>
                                            <span class="badge bg-success">${discountFixed}% OFF</span>
                                            </div>
                                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn" data-product="${value.id}">
                                            <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                            </button>
                                        </div>
                                        <div class="added-popup">
                                            <i class="fas fa-check-circle"></i>
                                            <span class="popup-text">Added <strong class="product-name">${value.medicineName}</strong> to Cart!</span>
                                            </div>
                                        </div>
                                </div>`;
                        });
                        $('#productCards').append(html).hide().fadeIn(400);;
                        loadyToLoad = true;
                        
                    },
                    error: function(error) {
                        console.log('Error fetching data', error);
                        $('.loadMore').hide(); // hide button on error
                    }
                });
            }
            //});

            // window screen 
            // Check if the button is visible in the viewport
            function isVisible(el) {
                const top = el.offset().top;
                const bottom = top + el.outerHeight();
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                return bottom > scrollTop && top < (scrollTop + windowHeight);
            }

            // On scroll, check if button is visible
            $(window).on('scroll', function() {
                const $loadMore = $('.loadMore');
                if ($loadMore.length && isVisible($loadMore) && loadyToLoad) {
                    fetchData();
                }
            });

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

        // =================== NAVBAR SCROLL EFFECT ===================
        window.addEventListener('scroll', () => {
            if(window.scrollY > 50){
                document.body.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled');
            }
        });

        $(document).on("click", "#applyFilter", function(){
            applyFilter();
        });
        $(document).on("change", "#sortBy", function() {
            applyFilter();
        });

        $('#clearFilters').on('click', function() {
            $('input[name="type[]"]').prop('checked', false);
            $('input[name="brands[]"]').prop('checked', false);
            $('input[name="availability"]').prop('checked', false);
            applyFilter();
        });

        function applyFilter(){
            loadyToLoad = true;
            types = $('input[name="type[]"]:checked').map(function(){return $(this).val();}).get();
            brands = $('input[name="brands[]"]:checked').map(function(){return $(this).val();}).get();
            availability = $('input[name="availability"]:checked').val();
            sortby = $('#sortBy').val(); // get the value from sort dropdown
            
            page = 1;
            $.ajax({
                url: "/medicines",
                type : "post",
                data : {
                    _token: $('meta[name="csrf-token"]').attr('content'), // csrf protection
                    types : types,
                    brands : brands,
                    availability : availability,
                    sortby : sortby
                },
                success: function(data) {
                    let html = "";
                    if(data.data.length === 0){ // no more data returned
                        html = `<h1 style="No Products Available"></h1>`;
                        return;
                    }else if(data.data.length > 4){
                        $('.loader').css({ 'display': 'block' });
                    }else{
                        $('.loader').css({ 'display': 'none' });
                    }
                    // load data and serve
                    let products = data.data;
                        Object.values(products).forEach(value => {
                            const mrp = value.mrp;
                            const sellingPrice = value.sellingPrice;

                            const discount = ((mrp - sellingPrice) / mrp) * 100;

                            // To keep 2 decimal places
                            const discountFixed = discount.toFixed(2);

                            html += `<div class="col-lg-3 col-md-6">
                                        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                                        <img src="storage/${value.productImages}" class="card-img-top product-img fixed-img" alt="Medicine">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                ${value.medicineName}
                                            </h6>
                                            <p class="text-muted small mb-2">
                                                ${value.manufacturer}
                                            </p>
                                            <p class="text-muted small mb-2">
                                                ${value.packSize}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <span class="h5 text-primary-custom">₹${sellingPrice}</span>
                                                <small class="text-decoration-line-through text-muted">₹${mrp}</small>
                                            </div>
                                            <span class="badge bg-success">${discountFixed}% OFF</span>
                                            </div>
                                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn" data-product="${value.id}">
                                            <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                            </button>
                                        </div>
                                        <div class="added-popup">
                                            <i class="fas fa-check-circle"></i>
                                            <span class="popup-text">Added <strong class="product-name">${value.medicineName}</strong> to Cart!</span>
                                            </div>
                                        </div>
                                </div>`;
                        });
                        $('#productCards').html(html).hide().fadeIn(400);;
                    // loaded data
                },
                error: function(error) {
                    console.log(error);
                    loadyToLoad = true;
                }

            });
        }

        });

    </script>
</body>
</html>