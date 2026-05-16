<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - MediCare+ Online Pharmacy</title>
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

        /* =================== ORDER SPECIFIC STYLES =================== */
        .order-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 2px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .order-card:hover {
            border-color: var(--pharmeasy-primary);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 1rem;
        }

        .order-id {
            font-weight: 700;
            color: var(--pharmeasy-dark);
            font-size: 1.1rem;
        }

        .order-date {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-delivered {
            background: #d1fae5;
            color: #065f46;
        }

        .status-processing {
            background: #fef3c7;
            color: #92400e;
        }

        .status-shipped {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .product-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            color: var(--pharmeasy-dark);
            margin-bottom: 0.25rem;
        }

        .product-meta {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .order-summary {
            background: #f8fffe;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
        }

        .summary-total {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--pharmeasy-primary);
            border-top: 2px solid #e5e7eb;
            padding-top: 0.75rem;
            margin-top: 0.5rem;
        }

        .filter-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            border: 2px solid #e5e7eb;
            background: white;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tab:hover {
            border-color: var(--pharmeasy-primary);
            color: var(--pharmeasy-primary);
        }

        .filter-tab.active {
            background: var(--pharmeasy-gradient);
            color: white;
            border-color: var(--pharmeasy-primary);
        }

        .tracking-timeline {
            position: relative;
            padding-left: 2rem;
            margin-top: 1rem;
        }

        .tracking-step {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .tracking-step::before {
            content: '';
            position: absolute;
            left: -1.5rem;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e5e7eb;
        }

        .tracking-step.completed::before {
            background: var(--pharmeasy-primary);
        }

        .tracking-step::after {
            content: '';
            position: absolute;
            left: -1.44rem;
            top: 1.2rem;
            width: 2px;
            height: calc(100% - 0.7rem);
            background: #e5e7eb;
        }

        .tracking-step:last-child::after {
            display: none;
        }

        .tracking-step.completed::after {
            background: var(--pharmeasy-primary);
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

        @media (max-width: 768px) {
            .order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .product-item {
                flex-direction: column;
            }

            .product-image {
                width: 100%;
                height: 150px;
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
     @include("component.navbar", ['page' => "profile", 'oldSearch' => '', 'qty' => '0'])
    {{-- @include("component.navbar", ['page'=> 'profile', 'oldSearch' => $oldSearch, 'qty' => $qty]) --}}


    <!-- Breadcrumb -->
    <div class="py-3" style="background: rgba(248, 255, 254, 0.8);">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/profile" class="text-decoration-none fw-semibold" style="color: var(--pharmeasy-primary);">My Profile</a></li>
                    <li class="breadcrumb-item active text-muted fw-semibold">My Orders</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Orders Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
            @if($orderCount > 0)
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold" style="color: var(--pharmeasy-primary);">
                        <i class="fas fa-box me-2"></i>My Orders
                    </h4>
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Search orders...">
                        <button class="btn btn-primary text-white">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">All Orders</button>
                    <button class="filter-tab" data-filter="processing">Processing</button>
                    <button class="filter-tab" data-filter="shipped">Shipped</button>
                    <button class="filter-tab" data-filter="delivered">Delivered</button>
                    <button class="filter-tab" data-filter="cancelled">Cancelled</button>
                </div>

                <!-- Order Cards -->
                <div id="orders-container">
                    <!-- Order 1 - Delivered -->
                    <div class="order-card" data-status="delivered">
                        <div class="order-header">
                            <div>
                                <div class="order-id">Order #ORD-2024-8521</div>
                                <div class="order-date">Placed on Nov 10, 2024</div>
                            </div>
                            <span class="status-badge status-delivered">
                                <i class="fas fa-check-circle"></i> Delivered
                            </span>
                        </div>

                        <div class="product-item">
                            <img src="https://via.placeholder.com/80" alt="Product" class="product-image">
                            <div class="product-details">
                                <div class="product-name">Paracetamol 500mg Tablets</div>
                                <div class="product-meta">Qty: 2 × ₹45.00</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold" style="color: var(--pharmeasy-primary);">₹90.00</div>
                            </div>
                        </div>

                        <div class="product-item">
                            <img src="https://via.placeholder.com/80" alt="Product" class="product-image">
                            <div class="product-details">
                                <div class="product-name">Vitamin D3 Capsules</div>
                                <div class="product-meta">Qty: 1 × ₹250.00</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold" style="color: var(--pharmeasy-primary);">₹250.00</div>
                            </div>
                        </div>

                        <div class="order-summary">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span>₹340.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Delivery:</span>
                                <span class="text-success">FREE</span>
                            </div>
                            <div class="summary-row summary-total">
                                <span>Total:</span>
                                <span>₹340.00</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3 flex-wrap">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-receipt me-1"></i> View Invoice
                            </button>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-redo me-1"></i> Reorder
                            </button>
                            <button class="btn btn-primary text-white btn-sm">
                                <i class="fas fa-star me-1"></i> Rate Order
                            </button>
                        </div>
                    </div>

                    <!-- Order 2 - Shipped -->
                    <div class="order-card" data-status="shipped">
                        <div class="order-header">
                            <div>
                                <div class="order-id">Order #ORD-2024-8520</div>
                                <div class="order-date">Placed on Nov 12, 2024</div>
                            </div>
                            <span class="status-badge status-shipped">
                                <i class="fas fa-shipping-fast"></i> Shipped
                            </span>
                        </div>

                        <div class="product-item">
                            <img src="https://via.placeholder.com/80" alt="Product" class="product-image">
                            <div class="product-details">
                                <div class="product-name">Blood Pressure Monitor</div>
                                <div class="product-meta">Qty: 1 × ₹1,499.00</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold" style="color: var(--pharmeasy-primary);">₹1,499.00</div>
                            </div>
                        </div>

                        <div class="tracking-timeline">
                            <div class="tracking-step completed">
                                <div class="fw-semibold">Order Placed</div>
                                <div class="text-muted small">Nov 12, 10:30 AM</div>
                            </div>
                            <div class="tracking-step completed">
                                <div class="fw-semibold">Order Confirmed</div>
                                <div class="text-muted small">Nov 12, 11:15 AM</div>
                            </div>
                            <div class="tracking-step completed">
                                <div class="fw-semibold">Shipped</div>
                                <div class="text-muted small">Nov 13, 09:00 AM</div>
                            </div>
                            <div class="tracking-step">
                                <div class="fw-semibold">Out for Delivery</div>
                                <div class="text-muted small">Expected Nov 14</div>
                            </div>
                            <div class="tracking-step">
                                <div class="fw-semibold">Delivered</div>
                            </div>
                        </div>

                        <div class="order-summary">
                            <div class="summary-row summary-total">
                                <span>Total:</span>
                                <span>₹1,499.00</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3 flex-wrap">
                            <button class="btn btn-primary text-white btn-sm">
                                <i class="fas fa-map-marker-alt me-1"></i> Track Order
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-times me-1"></i> Cancel Order
                            </button>
                        </div>
                    </div>

                    <!-- Order 3 - Processing -->
                    <div class="order-card" data-status="processing">
                        <div class="order-header">
                            <div>
                                <div class="order-id">Order #ORD-2024-8522</div>
                                <div class="order-date">Placed on Nov 14, 2024</div>
                            </div>
                            <span class="status-badge status-processing">
                                <i class="fas fa-clock"></i> Processing
                            </span>
                        </div>

                        <div class="product-item">
                            <img src="https://via.placeholder.com/80" alt="Product" class="product-image">
                            <div class="product-details">
                                <div class="product-name">Omega-3 Fish Oil Capsules</div>
                                <div class="product-meta">Qty: 3 × ₹450.00</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold" style="color: var(--pharmeasy-primary);">₹1,350.00</div>
                            </div>
                        </div>

                        <div class="alert alert-info mt-3 mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Your order is being prepared and will be shipped soon.
                        </div>

                        <div class="order-summary">
                            <div class="summary-row summary-total">
                                <span>Total:</span>
                                <span>₹1,350.00</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3 flex-wrap">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-receipt me-1"></i> View Details
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-times me-1"></i> Cancel Order
                            </button>
                        </div>
                    </div>

                    <!-- Order 4 - Cancelled -->
                    <div class="order-card" data-status="cancelled">
                        <div class="order-header">
                            <div>
                                <div class="order-id">Order #ORD-2024-8515</div>
                                <div class="order-date">Placed on Nov 5, 2024</div>
                            </div>
                            <span class="status-badge status-cancelled">
                                <i class="fas fa-times-circle"></i> Cancelled
                            </span>
                        </div>

                        <div class="product-item">
                            <img src="https://via.placeholder.com/80" alt="Product" class="product-image">
                            <div class="product-details">
                                <div class="product-name">Digital Thermometer</div>
                                <div class="product-meta">Qty: 1 × ₹350.00</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold text-muted">₹350.00</div>
                            </div>
                        </div>

                        <div class="alert alert-secondary mt-3 mb-0">
                            <i class="fas fa-ban me-2"></i>
                            This order was cancelled on Nov 6, 2024. Refund processed to your account.
                        </div>

                        <div class="d-flex gap-2 mt-3 flex-wrap">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-redo me-1"></i> Reorder
                            </button>
                        </div>
                    </div>
                </div>

            @else
                <!-- Empty State (hidden by default) -->
                <div class="empty-state " id="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h5 class="fw-bold mb-2">No Orders Found</h5>
                    <p class="text-muted mb-4">You haven't placed any orders yet or no orders match your filter.</p>
                    <a href="/" class="btn btn-primary text-white">
                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>
            @endif
            </div>
        </div>
    </div>

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
    });

    </script>

</body>
</html>