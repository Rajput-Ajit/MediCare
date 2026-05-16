<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .card {
            box-shadow: 0 4px 20px rgba(16, 132, 126, 0.08);
            transition: all 0.3s ease;
            border: none;
            border-radius: 12px;
        }

        .card:hover {
            box-shadow: 0 6px 30px rgba(16, 132, 126, 0.12);
            transform: translateY(-2px);
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: var(--pharmeasy-gradient);
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

        @keyframes shimmer {
            0% { background-position: -200px; }
            100% { background-position: 200px; }
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #d1d5db;
            margin-bottom: 1rem;
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
     @include("component.navbar", ['page' => "profile", 'oldSearch' => '', 'qty' => '0'])
    {{-- @include("component.navbar", ['page'=> 'profile', 'oldSearch' => $oldSearch, 'qty' => $qty]) --}}


    <!-- Breadcrumb -->
    <div class="py-3" style="background: rgba(248, 255, 254, 0.8);">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/profile" class="text-decoration-none fw-semibold" style="color: var(--pharmeasy-primary);">My Profile</a></li>
                    <li class="breadcrumb-item active text-muted fw-semibold">My Address</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--  Manage Address  -->
    <!-- Main Content -->
    <div class="container my-4">
        <div class="row g-4">
            <!-- Main Content Area -->
            <div class="col-lg-12">
            @if($addressCount > 0)  
                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                    <h4 class="fw-bold text-success mb-0">
                        <i class="fas fa-map-marked-alt me-2"></i>Manage Addresses
                    </h4>
                    <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                        <i class="fas fa-plus me-2"></i>Add New Address
                    </button>
                </div>

                <!-- Address Cards -->
                <div class="row g-4 justify-content-center">
                    <!-- Address 1 - Default -->
                    @foreach($addresses AS $address)
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        @if($address->address_type == 'home')
                                            <span class="badge bg-success mb-2">
                                                <i class="fas fa-home me-1"></i>Home
                                            </span>
                                        @elseif($address->address_type == 'office')
                                            <span class="badge bg-info mb-2">
                                                <i class="fas fa-briefcase me-1"></i>Office
                                            </span>
                                        @elseif($address->address_type == 'other')
                                            <span class="badge bg-warning mb-2">
                                                <i class="fas fa-map-marker-alt me-1"></i>Other
                                            </span>
                                        @endif

                                        @if($address->isDefault)
                                        <span class="badge bg-danger mb-2">
                                            Default
                                        </span>
                                        @endif
                                        <h5 class="fw-bold mb-0" style="text-transform: capitalize;">{{$address->address_type}}</h5>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v fs-5"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-success"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-trash me-2 text-danger"></i>Delete</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-star me-2 text-warning"></i>Set as Default</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <p class="fw-bold mb-2 text-dark">{{ $address->full_name }}</p>
                                    <p class="text-muted mb-1">{{ $address->flat_no }}</p>
                                    <p class="text-muted mb-1">{{ $address->street_address }}</p>
                                    <p class="text-muted mb-1">{{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}</p>
                                    <p class="text-muted my-3">
                                        <i class="fas fa-phone me-2 text-success"></i>{{ $address->phone_number }}
                                    </p>
                                    @if($address->alternate_phone)
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-phone me-2 text-success"></i>{{ $address->alternate_phone }}
                                    </p>
                                    @endif
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm rounded-3 flex-fill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Add New Address Card -->
                    <div class="col-lg-4">
                        <div class="card border-2 border-dashed border-success rounded-4 h-100" style="min-height: 300px;">
                            <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-plus fs-1 text-success"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Add New Address</h5>
                                <p class="text-muted mb-3">Add a new delivery address for your orders</p>
                                <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                    <i class="fas fa-plus me-2"></i>Add Address
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <!-- No  Address -->
                <!-- Empty State (hidden by default) -->
                <div class="empty-state my-5" id="empty-state">
                    <div class="empty-state-icon">
                        <i class="fa-solid fa-house"></i>
                    </div>

                    <h5 class="fw-bold mb-2">No Address Found</h5>
                    <p class="text-muted mb-4">You haven't added any address yet.</p>
                    <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                        <i class="fas fa-plus me-2"></i>Add Address
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Add/Edit Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-success">
                        <i class="fas fa-map-marker-alt me-2"></i>Add New Address
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="addressForm" method="POST">
                        <!-- Address Type -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Address Type <span class="text-danger">*</span></label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="home" name="addressType" id="typeHome" checked>
                                    <label class="form-check-label fw-semibold" for="typeHome">
                                        <i class="fas fa-home me-1 text-success"></i>Home
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="office" name="addressType" id="typeOffice">
                                    <label class="form-check-label fw-semibold" for="typeOffice">
                                        <i class="fas fa-briefcase me-1 text-info"></i>Office
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="other" name="addressType" id="typeOther">
                                    <label class="form-check-label fw-semibold" for="typeOther">
                                        <i class="fas fa-map-marker-alt me-1 text-warning"></i>Other
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Name and Phone -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" placeholder="Enter full name" name="fullName">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-lg rounded-3" placeholder="Enter phone number" name="phone">
                            </div>
                        </div>

                        <!-- Address Line 1 & 2 -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address Line 1 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg rounded-3" placeholder="Street, Area, Landmark" name="street">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address Line 2 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg rounded-3" placeholder="Flat no., Building name" name="flat">
                        </div>

                        <!-- City, State, Pincode -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" placeholder="City" name="city">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                                <select class="form-select form-select-lg rounded-3" name="state">
                                    <option selected>Select State</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Gujarat">Gujarat</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Pincode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg rounded-3" placeholder="Pincode" name="pincode">
                            </div>
                        </div>

                        <!-- Alternative Phone (Optional) -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alternative Phone (Optional)</label>
                            <input type="tel" class="form-control form-control-lg rounded-3" placeholder="Alternative phone number" name="alternate_phone">
                        </div>

                        <!-- Default Address Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultAddress" name="defaultAddress">
                                <label class="form-check-label fw-semibold" for="defaultAddress">
                                    Set as default address
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <button type="button" class="btn btn-outline-secondary btn-lg rounded-3 flex-fill" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-success btn-lg rounded-3 flex-fill">
                                <i class="fas fa-save me-2"></i>Save Address
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--     Delete Modal  -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger" style="color:white;">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Remove Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger" style="font-size:20px;font-weight:bold;">
                    Are You Sure To Remove Address?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // =================== DOCUMENT READY ===================
        // =================== NAVBAR SEARCH & SCROLL EFFECT ===================

    document.addEventListener('DOMContentLoaded', () => {
        const searchWrapper = document.querySelector('.nav-search-wrapper');
        const searchInput = document.querySelector('.search-input');
        const searchIcon = document.querySelector('.search-icon');

        // Search input expand animation
        if (searchWrapper && searchIcon) {
            searchIcon.addEventListener('click', () => {
                searchWrapper.classList.toggle('active');
                if (searchWrapper.classList.contains('active')) {
                    searchInput.focus();
                }
            });
        }

        // Navbar scroll shadow effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                document.body.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled');
            }
        });

        // addressForm
        $("#addressForm").on('submit', function(e){
            e.preventDefault();
            let data = $(this).serialize();
            
            $.ajax({
                url: "{{route("addAddress")}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(res){
                    let message = res;
                    console.log(message);
                },
                error: function(errors){
                    let validationErrors = errors.responseJSON.errors;
                   // console.log(validationErrors);
                    $.each(validationErrors, function(key, messages){
                        console.log(messages[0]);
                    });
                }
            });
        });

    });

    </script>

</body>
</html>