<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - MediCare+ Online Pharmacy</title>
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

        .card {
            box-shadow: 0 4px 20px rgba(16, 132, 126, 0.08);
            transition: all 0.3s ease;
            border: none;
            border-radius: 12px;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(16, 132, 126, 0.15);
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

       

        .profile-header {
            background: var(--pharmeasy-gradient);
            border-radius: 16px;
            padding: 2rem;
            color: white;
            margin-bottom: 2rem;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--pharmeasy-primary);
        }

        .profile-menu-item {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .profile-menu-item:hover {
            border-color: var(--pharmeasy-primary);
            transform: translateX(5px);
            box-shadow: 0 4px 20px rgba(16, 132, 126, 0.15);
            color: inherit;
        }

        .menu-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--pharmeasy-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pharmeasy-primary);
        }

        .badge-custom {
            background: var(--pharmeasy-secondary);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        .footer {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        @media (max-width: 768px) {
           
            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .profile-header {
                padding: 1.5rem;
            }
        }

        /* =================== NAVBAR STYLES =================== */
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

/* ============ SEARCH BAR IN NAV ============ */
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

/* Navbar scroll effect */
body.scrolled .modern-navbar {
    background: rgba(255,255,255,0.95);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Navbar link underline animation */
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

/* Shimmer animation */
@keyframes shimmer {
    0% { background-position: -200px; }
    100% { background-position: 200px; }
}

.disableClick{
    pointer-events: none;
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
    @include("component.navbar", ['page' => "profile", 'oldSearch' => $oldSearch, 'qty' => $qty])

    <!-- Profile Section -->
    <div class="container my-5">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-auto text-center text-md-start mb-3 mb-md-0">
                    <div class="profile-avatar mx-auto mx-md-0">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="col-md text-center text-md-start">
                    <h3 class="fw-bold mb-2">{{$name . " " . $lastName}}</h3>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>{{$email}}</p>
                    <p class="mb-0"><i class="fas fa-phone me-2"></i>{{$phone}}</p>
                </div>
                <a href="{{route('personalInfo')}}" class="col-md-auto text-center text-md-end mt-3 mt-md-0">
                    <button class="btn btn-light">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </button>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile Menu -->
            <div class="col-lg-4">
                <div class="card p-3">
                    <h5 class="fw-bold mb-3 px-2" style="color: var(--pharmeasy-primary);">
                        <i class="fas fa-bars me-2"></i>Account Menu
                    </h5>
                    
                    <a href="{{route('personalInfo')}}" class="profile-menu-item">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold">Personal Information</h6>
                                <small class="text-muted">Manage your personal details</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>

                    <a href="{{ route('myOrders') }}" class="profile-menu-item">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold">My Orders</h6>
                                <small class="text-muted">Track and manage orders</small>
                            </div>
                            <span class="badge-custom me-2">{{ $orderCount }}</span>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>

                    <a href="{{ route('myAddress') }}" class="profile-menu-item">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold">Manage Addresses</h6>
                                <small class="text-muted">Edit or add new addresses</small>
                            </div>
                            <span class="badge-custom me-2">{{ $addressCount }}</span>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>
                    
                    <!--
                    <a href="{{ route('myPrescription') }}" class="profile-menu-item disableClick">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-file-prescription"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold">My Prescriptions</h6>
                                <small class="text-muted">View uploaded prescriptions</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>

                    <a href="#" class="profile-menu-item disableClick">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold">Wishlist</h6>
                                <small class="text-muted">Saved items</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>
                    -->

                    <a href="{{ route('logout') }}" class="profile-menu-item">
                        <div class="d-flex align-items-center">
                            <div class="menu-icon me-3">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-semibold text-danger">Logout</h6>
                                <small class="text-muted">Sign out from account</small>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="col-lg-8">
                @if($orderCount > 0)
                    <!-- Quick Stats -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card text-center p-4">
                                <div class="menu-icon mx-auto mb-3">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <h4 class="fw-bold mb-1" style="color: var(--pharmeasy-primary);">12</h4>
                                <p class="text-muted mb-0">Total Orders</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center p-4">
                                <div class="menu-icon mx-auto mb-3">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 class="fw-bold mb-1" style="color: var(--pharmeasy-secondary);">3</h4>
                                <p class="text-muted mb-0">Pending Orders</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center p-4">
                                <div class="menu-icon mx-auto mb-3">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h4 class="fw-bold mb-1 text-danger">8</h4>
                                <p class="text-muted mb-0">Wishlist Items</p>
                            </div>
                        </div>
                    </div>
                @endif  

                <!-- Recent Orders -->
                <div class="card p-4 mb-4">
                    @if($orderCount > 0)
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">
                                <i class="fas fa-clock-rotate-left me-2"></i>Recent Orders
                            </h5>
                            <a href="my-orders.html" class="btn btn-outline-primary btn-sm">View All</a>
                        </div>

                        <div class="border rounded-3 p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h6 class="fw-bold mb-1">Order #ORD-2024-001</h6>
                                    <small class="text-muted">Placed on Oct 5, 2024</small>
                                </div>
                                <span class="badge bg-warning text-dark">In Transit</span>
                            </div>
                            <p class="text-muted mb-2 small">3 items • ₹265</p>
                            <a href="my-orders.html" class="btn btn-outline-primary btn-sm">Track Order</a>
                        </div>

                        <div class="border rounded-3 p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h6 class="fw-bold mb-1">Order #ORD-2024-002</h6>
                                    <small class="text-muted">Placed on Oct 3, 2024</small>
                                </div>
                                <span class="badge bg-success">Delivered</span>
                            </div>
                            <p class="text-muted mb-2 small">2 items • ₹450</p>
                            <button class="btn btn-outline-primary btn-sm">Reorder</button>
                        </div>
                    @else
                        <!-- No Orders State -->
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-shopping-bag" style="font-size: 4rem; color: #e0e0e0;"></i>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #333;">No Orders Yet</h5>
                            <p class="text-muted mb-4">You haven't placed any orders yet.<br>Start shopping to see your orders here.</p>
                            <a href="{{route('medicine')}}" class="btn btn-primary">
                                <i class="fas fa-store me-2"></i>Start Shopping
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Saved Addresses -->
                <div class="card p-4">
                    @if($addressCount > 0)
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">
                                <i class="fas fa-map-marker-alt me-2"></i>Saved Addresses
                            </h5>
                            <a href="manage-addresses.html" class="btn btn-outline-primary btn-sm">Manage</a>
                        </div>

                        <div class="border rounded-3 p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-success mb-2">Home</span>
                                    <h6 class="fw-bold mb-1">John Doe</h6>
                                    <p class="text-muted mb-0 small">Flat 101, Sunrise Apartments, MG Road<br>Mumbai, Maharashtra - 400001<br>Phone: +91 9876543210</p>
                                </div>
                            </div>
                        </div>

                        @foreach($addresses as $address)

                        @endforeach
                     @else
                        <!-- No Address State -->
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-map-marker-alt" style="font-size: 4rem; color: #e0e0e0;"></i>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #333;">No Saved Addresses</h5>
                            <p class="text-muted mb-4">You haven't added any delivery addresses yet.<br>Add an address to get started with your orders.</p>
                            <a href="{{route('myAddress')}}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add New Address
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
});

    </script>
</body>
</html>