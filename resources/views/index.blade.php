<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare+ | Online Pharmacy</title>
    
    <!-- External CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* ================================
           CSS VARIABLES & ROOT STYLES
           ================================ */
        :root {
            --primary-color: #10847e;
            --secondary-color: #ff6b35;
            --light-green: #e8f5f4;
            --dark-green: #0a6b66;
            --orange: #ff6b35;
            --light-orange: #fff2ef;
            --light-orange: #ffd9b3;  /* soft saffron */
            --light-white: #f7f7f7;   /* off-white */
            --light-green: #b3e6b3;   /* soft green */
        }
        
        /* ================================
           UTILITY CLASSES
           ================================ */
        .bg-primary-custom {
            background-color: var(--primary-color) !important;
        }
        
        .bg-light-green {
            background-color: var(--light-green);
        }
        
        .bg-light-orange {
            background-color: var(--light-orange);
        }
        
        .text-primary-custom {
            color: var(--primary-color) !important;
        }
        
        .text-orange {
            color: var(--orange) !important;
        }
        
        /* ================================
           BUTTON STYLES
           ================================ */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary-custom:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
        }
        
        .btn-orange {
            background-color: var(--orange);
            border-color: var(--orange);
            color: white;
        }
        
        .btn-orange:hover {
            background-color: #e55a2b;
            border-color: #e55a2b;
            color: white;
        }
        
        /* ================================
           NAVBAR STYLES
           ================================ */
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        /* Sticky Navbar Background Transition */
        .modern-navbar {
            transition: background 0.4s ease, box-shadow 0.4s ease;
        }

        /* Brand Shimmer Effect */
        .brand-shimmer {
            font-weight: 700;
            background: linear-gradient(90deg, #10847e, #ff6b35, #10847e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }
        @keyframes shimmer {
            0% { background-position: -200px; }
            100% { background-position: 200px; }
        }

        /* Cart Badge Pop Animation */
        .cart-link {
            transition: all 0.3s ease;
        }
        .cart-link:hover .cart-badge {
            transform: scale(1.3);
            transition: transform 0.3s ease;
        }

        /* Search Bar Styles */
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

        /* Scroll Background Effect */
        body.scrolled .modern-navbar {
            background: rgba(255,255,255,0.95);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Nav Links Hover Effect */
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
        
        /* ================================
           HERO SECTION STYLES
           ================================ */
        .hero-section {
            background: linear-gradient(135deg, var(--light-green) 0%, var(--light-orange) 100%);
            padding: 60px 0;
        }
        
        .indian-flag-gradient {
            background: linear-gradient(
                135deg,
                var(--light-orange) 0%,
                var(--light-orange) 33%,
                var(--light-white) 50%,
                var(--light-green) 67%,
                var(--light-green) 100%
            );
        }
        
        /* Hero Section Gradient (Indian Flag) with subtle wave animation */
        .hero-section {
            position: relative;
            overflow: hidden;
            padding: 120px 0;
            color: #fff;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(270deg, #FF9933, #FFFFFF, #138808);
            background-size: 600% 600%;
            animation: flagWave 20s ease infinite;
            z-index: 0;
        }
        @keyframes flagWave {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Text Entrance Animation */
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            opacity: 0;
            transform: translateY(30px);
            animation: slideFadeIn 1s forwards;
        }
        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255,255,255,0.95);
            margin-top: 1rem;
            min-height: 60px; /* keep space for typing */
            opacity: 0;
            transform: translateY(20px);
            animation: slideFadeIn 1s 0.3s forwards;
        }
        @keyframes slideFadeIn {
            to {opacity: 1; transform: translateY(0);}
        }

        /* Typing Effect */
        .typed-text {
            font-weight: 500;
        }
        .typed-cursor {
            display: inline-block;
            color: #fff;
            font-weight: 700;
            animation: blink 0.7s infinite;
        }
        @keyframes blink {
            0%, 50%, 100% { opacity: 1; }
            25%, 75% { opacity: 0; }
        }

        /* Button Hover Shine */
        .btn-hero {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: rgba(255,255,255,0.3);
            transform: skewX(-20deg);
            transition: all 0.7s ease;
        }
        .btn-hero:hover::after {
            left: 125%;
        }
        .btn-orange {
            background: #FF9933;
            color: #fff;
            border: none;
        }
        .btn-orange:hover {
            background: #FFB366;
        }

        /* Hero Image Floating */
        .hero-img {
            max-height: 320px;
            animation: floatImg 4s ease-in-out infinite;
        }
        @keyframes floatImg {
            0%,100% { transform: translateY(0);}
            50% { transform: translateY(-20px);}
        }

        /* Decorative Floating Circles */
        .hero-section::before, .hero-section::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: floatDeco 6s ease-in-out infinite;
        }
        .hero-section::before { top: 15%; left: 5%; }
        .hero-section::after { bottom: 10%; right: 10%; }
        @keyframes floatDeco {
            0%,100% { transform: translateY(0);}
            50% { transform: translateY(-25px);}
        }
        
        /* ================================
           SEARCH BOX STYLES
           ================================ */
        .search-box {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        
        /* ================================
           CATEGORY CARD STYLES
           ================================ */
        .category-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
        }
        
        .category-card {
            position: relative;
            border-radius: 20px;
            padding: 30px 15px;
            text-align: center;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transform: translateY(50px) scale(0.95);
            opacity: 0;
            transition: transform 0.5s ease, opacity 0.5s ease, box-shadow 0.4s ease;
            perspective: 1000px;
            overflow: hidden;
        }

        .category-card.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .category-card:hover {
            transform: translateY(-10px) scale(1.05) rotateX(3deg) rotateY(3deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#10847e,#6dd5ed);
            transition: transform 0.5s ease, background 0.5s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.2) rotate(-10deg);
        }

        .card-title {
            font-weight: 600;
            margin-top: 5px;
            position: relative;
            z-index: 1;
        }

        .gradient-glow {
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.4;
            pointer-events: none;
            transition: background 0.3s ease;
            z-index: 0;
        }

        /* Small floating particles inside card */
        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,0.8);
            pointer-events: none;
            z-index: 0;
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% { transform: translate(0,0) scale(1); opacity:0.7; }
            50% { transform: translate(5px,-15px) scale(1.2); opacity:1; }
            100% { transform: translate(0,0) scale(1); opacity:0.7; }
        }
        
        /* ================================
           PRODUCT CARD STYLES
           ================================ */
        .product-card {
            transition: box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
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
            background: #10847e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 0.95rem;
            opacity: 0;
            pointer-events: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.5s ease;
        }
        .added-popup.show {
            opacity: 1;
            transform: translate(-50%, -70%);
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

        /* Animations */
        @keyframes popupBounce {
            0% { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
            50% { transform: translate(-50%, -75%) scale(1.1); opacity: 1; }
            100% { transform: translate(-50%, -70%) scale(1); opacity: 1; }
        }

        @keyframes bounceIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* ================================
           IMAGE STYLES
           ================================ */
        .brand-logo {
            height: 80px;
            object-fit: contain;
        }
        
        .fixed-img {
            width: 100%;          /* full card width */
            height: 200px;        /* fix same height for all */
            object-fit: contain;    /* crop & keep ratio */
            border-radius: 8px;   /* optional: smooth corners */
        }
        
        /* ================================
           OFFER BANNER STYLES
           ================================ */
        .offer-banner {
            background: linear-gradient(45deg, var(--primary-color), var(--orange));
            background: linear-gradient(45deg, #FF9933, #FFFFFF, #138808);
            background: linear-gradient(
                45deg,
                #FF9933 0%,          /* saffron */
                #FF9933 30%,         /* extend saffron */
                #f5f5f5 50%,         /* softer white/gray */
                #138808 70%,         /* extend green */
                #138808 100%         /* green */
            );
        }

        .offer-banner {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            background: #10847e;
        }

        /* Floating animated lines */
        .animated-line {
            position: absolute;
            width: 200%;
            height: 2px;
            background: rgba(255,255,255,0.2);
            top: 0;
            left: -100%;
            animation: moveLine 10s linear infinite;
        }
        .line-1 { top: 20%; animation-duration: 12s; }
        .line-2 { top: 40%; animation-duration: 15s; background: rgba(255,255,255,0.15); }
        .line-3 { top: 60%; animation-duration: 10s; }
        .line-4 { top: 80%; animation-duration: 18s; background: rgba(255,255,255,0.1); }

        @keyframes moveLine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Subtle floating circles */
        .offer-banner::before, .offer-banner::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            animation: floatCircle 8s ease-in-out infinite;
        }
        .offer-banner::before { top: 10%; left: 5%; animation-delay: 0s; }
        .offer-banner::after { bottom: 15%; right: 10%; animation-delay: 3s; }

        @keyframes floatCircle {
            0%,100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-25px) translateX(15px); }
        }

        /* Text animation */
        .offer-title, .offer-subtitle {
            position: relative;
            z-index: 1;
            animation: slideFadeIn 1s ease forwards;
        }
        .offer-title { animation-delay: 0.2s; }
        .offer-subtitle { animation-delay: 0.5s; }

        @keyframes slideFadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Button shine on hover */
        .offer-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }
        .offer-btn::after {
            content: '';
            position: absolute;
            top: 0; left: -75%;
            width: 50%; height: 100%;
            background: rgba(255,255,255,0.3);
            transform: skewX(-20deg);
            transition: all 0.7s ease;
        }
        .offer-btn:hover::after { left: 125%; }
        
        /* ================================
           BRAND SLIDER STYLES
           ================================ */
        /* Slider wrapper */
        .brand-slider {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        /* Track container */
        .brand-track {
            display: flex;
            width: max-content;
            animation: slide 20s linear infinite;
        }

        .brand-slider:hover .brand-track {
            animation-play-state: paused; /* Pause on hover */
        }

        /* Each brand */
        .brand-item {
            flex: 0 0 auto;
            width: 120px;
            margin-right: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s;
        }

        .brand-item img {
            max-width: 100%;
            transition: transform 0.3s;
        }

        .brand-item:hover img {
            transform: scale(1.1); /* Hover effect */
        }

        /* Sliding animation */
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* ================================
           RESPONSIVE STYLES
           ================================ */
        @media(max-width: 992px){
            .hero-title { font-size: 2.25rem; }
            .hero-subtitle { font-size: 1rem; }
        }
    </style>
</head>
<body>
    <!-- ================================
         NAVIGATION BAR
         ================================ -->
    @include("component.navbar", ["page" => "Home"]);

    <!-- ================================
         HERO SECTION
         ================================ -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center">
                    <h1 class="hero-title">
                        India's Trusted Online Pharmacy
                    </h1>
                    <p class="hero-subtitle">
                        <span class="typed-text"></span><span class="typed-cursor">|</span>
                    </p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start mt-4">
                        <button class="btn btn-hero btn-orange">
                            <i class="fas fa-file-medical me-2"></i>Upload Prescription
                        </button>
                        <button class="btn btn-hero btn-outline-primary">
                            <i class="fas fa-phone me-2"></i>Order on Call
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="https://img.freepik.com/premium-vector/boy-is-working-laptop_118167-14399.jpg" 
                         class="hero-img" alt="Pharmacy Hero">
                </div>
            </div>
        </div>
    </section>

    <!-- ================================
         CATEGORIES SECTION
         ================================ -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-primary-custom">Shop by Category</h2>
            <div class="row g-4 category-row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#10847e">
                        <div class="category-icon"><i class="fas fa-tablets fa-2x text-white"></i></div>
                        <h6 class="card-title">Pain Relief</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#ff6b35">
                        <div class="category-icon"><i class="fas fa-heartbeat fa-2x text-white"></i></div>
                        <h6 class="card-title">Diabetes Care</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#10847e">
                        <div class="category-icon"><i class="fas fa-eye fa-2x text-white"></i></div>
                        <h6 class="card-title">Eye Care</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#ff6b35">
                        <div class="category-icon"><i class="fas fa-child fa-2x text-white"></i></div>
                        <h6 class="card-title">Baby Care</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#10847e">
                        <div class="category-icon"><i class="fas fa-spa fa-2x text-white"></i></div>
                        <h6 class="card-title">Skincare</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card" data-color="#ff6b35">
                        <div class="category-icon"><i class="fas fa-dumbbell fa-2x text-white"></i></div>
                        <h6 class="card-title">Fitness</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================
         FEATURED MEDICINES SECTION
         ================================ -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h2 class="text-primary-custom">Featured Medicines</h2>
                    <p class="text-muted">Top selling medicines and health products</p>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-outline-primary">View All</a>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                        <img src="https://ayushcare.in/cdn/shop/products/Calpol500.jpg?v=1747141376" class="card-img-top product-img fixed-img" alt="Medicine">
                        <div class="card-body">
                            <h6 class="card-title">Paracetamol 500mg</h6>
                            <p class="text-muted small">Fever & Pain Relief</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span class="h5 text-primary-custom">₹25</span>
                                    <small class="text-decoration-line-through text-muted">₹30</small>
                                </div>
                                <span class="badge bg-success">17% OFF</span>
                            </div>
                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                        <div class="added-popup">
                            <i class="fas fa-check-circle"></i>
                            <span class="popup-text">Added <strong class="product-name">Paracetamol 500mg</strong> to Cart!</span>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                        <img src="https://images.apollo247.in/pub/media/catalog/product/C/R/CRO0091_1.jpg" class="card-img-top product-img fixed-img" alt="Medicine">
                        <div class="card-body">
                            <h6 class="card-title">Crocin Advance</h6>
                            <p class="text-muted small">Fast Pain Relief</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span class="h5 text-primary-custom">₹45</span>
                                    <small class="text-decoration-line-through text-muted">₹50</small>
                                </div>
                                <span class="badge bg-success">10% OFF</span>
                            </div>
                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                        <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                        <img src="https://almscare.com/wp-content/uploads/2024/06/Screenshot-2024-06-29-130029.png" class="card-img-top product-img fixed-img" alt="Medicine">
                        <div class="card-body">
                            <h6 class="card-title">Vitamin D3</h6>
                            <p class="text-muted small">Bone Health Supplement</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span class="h5 text-primary-custom">₹120</span>
                                    <small class="text-decoration-line-through text-muted">₹150</small>
                                </div>
                                <span class="badge bg-success">20% OFF</span>
                            </div>
                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                        <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
                        <img src="https://www.adegenpharma.com/wp-content/uploads/2023/02/OMILESS-20-CAPSULE.jpg" class="card-img-top product-img fixed-img" alt="Medicine">
                        <div class="card-body">
                            <h6 class="card-title">Omeprazole 20mg</h6>
                            <p class="text-muted small">Acidity Relief</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span class="h5 text-primary-custom">₹85</span>
                                    <small class="text-decoration-line-through text-muted">₹100</small>
                                </div>
                                <span class="badge bg-success">15% OFF</span>
                            </div>
                            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                        <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!-- ================================
         OFFER BANNER SECTION
         ================================ -->
    <section class="py-5 offer-banner text-white position-relative overflow-hidden">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-2 offer-title">Get Flat 20% OFF on Your First Order</h2>
                    <p class="mb-3 offer-subtitle">Use code: <strong>WELCOME20</strong> | Valid on medicines above ₹500</p>
                </div>
                <div class="col-lg-4 text-lg-end text-center mt-3 mt-lg-0">
                    <button class="btn btn-light btn-lg text-primary-custom fw-bold offer-btn">
                        Shop Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Animated Lines -->
        <div class="animated-line line-1"></div>
        <div class="animated-line line-2"></div>
        <div class="animated-line line-3"></div>
        <div class="animated-line line-4"></div>
    </section>
    
    <!-- ================================
         POPULAR BRANDS SECTION
         ================================ -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-primary-custom">Popular Brands</h2>

            <div class="brand-slider">
                <div class="brand-track">
                    <div class="brand-item"><img src="https://competition.adesignaward.com/award-winner-brand-900.php?ID=117150" class="img-fluid" alt="Himalaya"></div>
                    <div class="brand-item"><img src="https://download.logo.wine/logo/Dabur/Dabur-Logo.wine.png" class="img-fluid" alt="Dabur"></div>
                    <div class="brand-item"><img src="https://beehiiv-images-production.s3.amazonaws.com/uploads/asset/file/6ca4342f-319c-47d5-a729-3c1dee0b693b/Patanjali-Yogpeeth.jpg?t=1724662133" class="img-fluid" alt="Patanjali"></div>
                    <div class="brand-item"><img src="https://yt3.googleusercontent.com/g4a0IbVJmpT8nG3Mwqw4qqgqFLq69zFek4UtEIcmKqFkTkxRveLu-sKXWhVVq2zZI5hQXtWFLw8=s900-c-k-c0x00ffffff-no-rj" class="img-fluid" alt="Apollo"></div>
                    <div class="brand-item"><img src="https://images.seeklogo.com/logo-png/30/2/cipla-logo-png_seeklogo-305328.png" class="img-fluid" alt="Cipla"></div>
                    <div class="brand-item"><img src="https://www.shutterstock.com/image-vector/dr-reddys-laboratories-logo-vector-600nw-2323174353.jpg" class="img-fluid" alt="Dr Reddy"></div>

                    <!-- Duplicate for seamless loop -->
                    <div class="brand-item"><img src="https://competition.adesignaward.com/award-winner-brand-900.php?ID=117150" class="img-fluid" alt="Himalaya"></div>
                    <div class="brand-item"><img src="https://download.logo.wine/logo/Dabur/Dabur-Logo.wine.png" class="img-fluid" alt="Dabur"></div>
                    <div class="brand-item"><img src="https://beehiiv-images-production.s3.amazonaws.com/uploads/asset/file/6ca4342f-319c-47d5-a729-3c1dee0b693b/Patanjali-Yogpeeth.jpg?t=1724662133" class="img-fluid" alt="Patanjali"></div>
                    <div class="brand-item"><img src="https://yt3.googleusercontent.com/g4a0IbVJmpT8nG3Mwqw4qqgqFLq69zFek4UtEIcmKqFkTkxRveLu-sKXWhVVq2zZI5hQXtWFLw8=s900-c-k-c0x00ffffff-no-rj" class="img-fluid" alt="Apollo"></div>
                    <div class="brand-item"><img src="https://images.seeklogo.com/logo-png/30/2/cipla-logo-png_seeklogo-305328.png" class="img-fluid" alt="Cipla"></div>
                    <div class="brand-item"><img src="https://www.shutterstock.com/image-vector/dr-reddys-laboratories-logo-vector-600nw-2323174353.jpg" class="img-fluid" alt="Dr Reddy"></div>

                    <!-- Duplicate for seamless loop -->
                </div>
            </div>
        </div>
    </section>

    <!-- ================================
         HEALTH TIPS SECTION
         ================================ -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 text-primary-custom">Health Tips & Articles</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <img src="https://via.placeholder.com/350x200/e8f5f4/10847e?text=Health+Tip+1" class="card-img-top" alt="Health Tip">
                        <div class="card-body">
                            <h5 class="card-title">5 Ways to Boost Your Immunity</h5>
                            <p class="card-text text-muted">Simple lifestyle changes that can help strengthen your immune system naturally.</p>
                            <a href="#" class="text-primary-custom text-decoration-none">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <img src="https://via.placeholder.com/350x200/fff2ef/ff6b35?text=Health+Tip+2" class="card-img-top" alt="Health Tip">
                        <div class="card-body">
                            <h5 class="card-title">Managing Diabetes at Home</h5>
                            <p class="card-text text-muted">Essential tips for diabetes patients to maintain healthy blood sugar levels.</p>
                            <a href="#" class="text-primary-custom text-decoration-none">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm">
                        <img src="https://via.placeholder.com/350x200/e8f5f4/10847e?text=Health+Tip+3" class="card-img-top" alt="Health Tip">
                        <div class="card-body">
                            <h5 class="card-title">Importance of Regular Checkups</h5>
                            <p class="card-text text-muted">Why preventive healthcare is crucial for maintaining good health.</p>
                            <a href="#" class="text-primary-custom text-decoration-none">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================
         FOOTER SECTION
         ================================ -->
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

    <!-- ================================
         EXTERNAL JAVASCRIPT LIBRARIES
         ================================ -->
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // ================================
        // NAVBAR FUNCTIONALITY
        // ================================
        
        // Search Input Toggle Animation
        const searchWrapper = document.querySelector('.nav-search-wrapper');
        const searchInput = document.querySelector('.search-input');
        searchWrapper.querySelector('.search-icon').addEventListener('click', () => {
            searchWrapper.classList.toggle('active');
            if(searchWrapper.classList.contains('active')) searchInput.focus();
        });
		
		
		// Navbar Scroll Background Effect
        window.addEventListener('scroll', () => {
            if(window.scrollY > 50){
                document.body.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled');
            }
        });
        
        // ================================
        // HERO SECTION TYPING ANIMATION
        // ================================
        
        // Typed Text Setup
        const typedSpan = document.querySelector(".typed-text");
        const phrases = [
            "Get medicines delivered to your doorstep safely and quickly.",
            "Upload your prescription and order medicines online hassle-free.",
            "Explore Pain Relief, Vitamins, Eye Care, Baby Care, Skincare and more.",
            "Trusted by millions across India for fast and secure delivery.",
            "Your one-stop online pharmacy for all health needs."
        ];

        const typingSpeed = 60;    // speed of typing
        const erasingSpeed = 40;   // speed of erasing
        const delayBetween = 2500; // delay between phrases
        let phraseIndex = 0, charIndex = 0;

        function typeText() {
            if(charIndex < phrases[phraseIndex].length){
                typedSpan.textContent += phrases[phraseIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeText, typingSpeed);
            } else {
                setTimeout(eraseText, delayBetween);
            }
        }

        function eraseText() {
            if(charIndex > 0){
                typedSpan.textContent = phrases[phraseIndex].substring(0, charIndex-1);
                charIndex--;
                setTimeout(eraseText, erasingSpeed);
            } else {
                phraseIndex = (phraseIndex + 1) % phrases.length;
                setTimeout(typeText, typingSpeed + 300);
            }
        }

        // Initialize typing animation on page load
        document.addEventListener("DOMContentLoaded", () => {
            if(phrases.length) setTimeout(typeText, 1000);
        });
        
        // ================================
        // CATEGORY CARDS ANIMATION
        // ================================
        
        $(document).ready(function(){
            // Initialize each category card with special effects
            $('.category-card').each(function(){
                const $card = $(this);
                const color = $card.data('color');
                
                // Add gradient glow effect
                const glow = $('<div class="gradient-glow"></div>');
                $card.append(glow);
                
                // Add 3 floating particles for visual appeal
                for(let i=0;i<3;i++){
                    const p = $('<div class="particle"></div>');
                    p.css({
                        top: Math.random()*80+'%',
                        left: Math.random()*80+'%',
                        animationDuration: (2+Math.random()*2)+'s'
                    });
                    $card.append(p);
                }

                // Mouse move effect - glow follows cursor
                $card.on('mousemove', function(e){
                    const offset = $card.offset();
                    const x = e.pageX - offset.left;
                    const y = e.pageY - offset.top;
                    glow.css('background', `radial-gradient(circle at ${x}px ${y}px, ${color}, transparent 60%)`);
                }).on('mouseleave', function(){
                    glow.css('background','none');
                });
            });

            // Scroll animation - trigger when cards come into view
            function animateCards(){
                const scroll = $(window).scrollTop();
                const windowH = $(window).height();
                $('.category-card').each(function(){
                    const $card = $(this);
                    if(!$card.hasClass('visible')){
                        const top = $card.offset().top;
                        if(scroll + windowH > top + 50){
                            $card.addClass('visible');
                        }
                    }
                });
            }

            $(window).on('scroll load', animateCards);
        });
        
        // ================================
        // PRODUCT CARDS ANIMATION
        // ================================
        
        $(document).ready(function(){
            // Add to Cart Animation
            $('.add-cart-btn').on('click', function(){
                const $card = $(this).closest('.product-card');
                const $img = $card.find('.product-img');
                const $popup = $card.find('.added-popup');

                // Image disappears with rotation & scale animation
                $img.css({transform: 'scale(0) rotate(15deg)', opacity: '0'});

                // Show success popup after image disappears
                setTimeout(()=>{
                    $popup.addClass('show');
                }, 500);

                // Reappear image smoothly after success message
                setTimeout(()=>{
                    $popup.removeClass('show');
                    $img.css({transform: 'scale(1) rotate(0deg)', opacity: '1'});
                }, 1700);
            });
        });
	</script>
</body>
</html>