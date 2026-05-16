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

    <!-- Cart Container -->
    <x-empty-cart />

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

    </script>
</body>
</html>