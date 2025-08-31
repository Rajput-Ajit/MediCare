<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Products | MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
       
		
		.fixed-img {
		  width: 100%;          /* full card width */
		  height: 200px;        /* fix same height for all */
		  object-fit: contain;    /* crop & keep ratio */
		  border-radius: 8px;   /* optional: smooth corners */
		}
		
		
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
        
        .bg-primary-custom {
            background-color: var(--primary-color) !important;
        }
        
        .bg-light-green {
            background-color: var(--light-green);
        }
        
        .bg-light-orange {
            background-color: var(--light-orange);
        }
        
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
                        <i class="fas fa-shield-alt me-1"></i> 100% Genuine Products
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
	@include("component.navbar", ["page" => "Health_Products"]);

	<style>
	/* Sticky Navbar Background Transition */
	.modern-navbar {
		transition: background 0.4s ease, box-shadow 0.4s ease;
	}

	/* Brand Shimmer */
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

	/* Cart Badge Pop */
	.cart-link {
		transition: all 0.3s ease;
	}
	.cart-link:hover .cart-badge {
		transform: scale(1.3);
		transition: transform 0.3s ease;
	}

	/* Search - Keep your existing style */
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

	/* Scroll Background */
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
	</style>

	<script>
	// Search Input Toggle
	const searchWrapper = document.querySelector('.nav-search-wrapper');
	const searchInput = document.querySelector('.search-input');
	searchWrapper.querySelector('.search-icon').addEventListener('click', () => {
		searchWrapper.classList.toggle('active');
		if(searchWrapper.classList.contains('active')) searchInput.focus();
	});

	// Navbar Scroll Effect
	window.addEventListener('scroll', () => {
		if(window.scrollY > 50){
			document.body.classList.add('scrolled');
		} else {
			document.body.classList.remove('scrolled');
		}
	});
	</script>

    <!-- Breadcrumb -->
    <div class="py-3" style="background-color: var(--pharmeasy-light);">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none" style="color: var(--pharmeasy-primary);">Home</a></li>
                    <li class="breadcrumb-item active text-muted">Health Products</li>
                </ol>
            </nav>
        </div>
    </div>
	
	
	<!-- Filter Button  -->
		<div class="filter-sort-sidebar shadow-lg p-3">
		<!-- Filter Button -->
		<button class="btn btn-filter-modern w-100 mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterSidebar">
			<i class="fas fa-filter me-2"></i> Filters
		</button>

		<!-- Sort Dropdown -->
		<label class="form-label small text-muted mb-1">Sort by</label>
		<select class="form-select form-select-sm sort-select">
			<option>Popularity</option>
			<option>Price: Low to High</option>
			<option>Price: High to Low</option>
			<option>Customer Rating</option>
			<option>Newest First</option>
		</select>
	</div>
	<style>
		.filter-sort-sidebar {
		position: fixed;
		top: 100px; /* adjust as per your header height */
		right: 20px;
		width: 220px;
		background: #fff;
		border-radius: 16px;
		z-index: 1050;
		transition: all 0.3s ease-in-out;
		z-index:1;
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
	
	/* 📱 Mobile View (Top, Normal Flow, Full Width) */
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

	</style>
<!-- Offcanvas Filter Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="filterSidebar">
    <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" style="color: var(--pharmeasy-primary);">Filters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Filter Content -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-sm btn-outline-secondary">Clear All</button>
            </div>
            
            <!-- Categories -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Categories</h6>
                <div class="list-group list-group-flush">
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" checked>
                            Supplements
                        </div>
                        <span class="badge bg-light text-dark">68</span>
                    </label>
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input me-2" type="checkbox">
                            Fitness & Sports
                        </div>
                        <span class="badge bg-light text-dark">42</span>
                    </label>
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input me-2" type="checkbox">
                            Personal Care
                        </div>
                        <span class="badge bg-light text-dark">35</span>
                    </label>
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input me-2" type="checkbox">
                            Medical Devices
                        </div>
                        <span class="badge bg-light text-dark">28</span>
                    </label>
                    <label class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input me-2" type="checkbox">
                            Baby & Mom Care
                        </div>
                        <span class="badge bg-light text-dark">31</span>
                    </label>
                </div>
            </div>

            <!-- Price Range -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Price Range</h6>
                <div class="row g-2">
                    <div class="col">
                        <input type="number" class="form-control form-control-sm" placeholder="Min" value="0">
                    </div>
                    <div class="col-auto align-self-center">-</div>
                    <div class="col">
                        <input type="number" class="form-control form-control-sm" placeholder="Max" value="2000">
                    </div>
                </div>
            </div>

            <!-- Brands -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Popular Brands</h6>
                <div class="list-group list-group-flush">
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Himalaya
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        MuscleBlaze
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Patanjali
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Dabur
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Omron
                    </label>
                </div>
            </div>

            <!-- Discount -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Discount</h6>
                <div class="list-group list-group-flush">
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        10% & above
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        20% & above
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        30% & above
                    </label>
                </div>
            </div>

            <!-- Availability -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-3">Availability</h6>
                <div class="list-group list-group-flush">
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox" checked>
                        In Stock
                    </label>
                    <label class="list-group-item border-0 px-0 py-1">
                        <input class="form-check-input me-2" type="checkbox">
                        Include Out of Stock
                    </label>
                </div>
            </div>
        </div>
		</div>
	
    <!-- Main Content -->
    <div class="container my-5">
		<div class="row g-4 justify-content-center">
            <!-- Product Grid -->
            <div class="col-lg-9">
               <!-- Featured Banner -->
		<div class="rounded-3 p-4 mb-4 text-white position-relative overflow-hidden banner-modern">
			<div class="row align-items-center">
				<div class="col-md-8 banner-text">
					<h4 class="fw-bold mb-2 animate-slide-left">Health & Wellness Sale</h4>
					<p class="mb-3 opacity-90 animate-fade-in">Get up to 35% off on top health products & supplements</p>
					<button class="btn btn-light fw-semibold btn-shop animate-pop">Shop Now</button>
				</div>
				<div class="col-md-4 text-end">
					<i class="fas fa-heartbeat display-1 opacity-25 pill-icon"></i>
				</div>
			</div>
		</div>

		<style>
		/* Banner background gradient animation */
		.banner-modern {
			background: linear-gradient(135deg, #10847e 0%, #0a6b66 100%);
			background-size: 400% 400%;
			animation: gradientShift 10s ease infinite;
		}

		@keyframes gradientShift {
			0% {background-position: 0% 50%;}
			50% {background-position: 100% 50%;}
			100% {background-position: 0% 50%;}
		}

		/* Text Animations */
		.animate-slide-left {
			opacity: 0;
			transform: translateX(-30px);
			animation: slideLeft 1s forwards;
		}

		.animate-fade-in {
			opacity: 0;
			animation: fadeIn 1s 0.5s forwards;
		}

		@keyframes slideLeft {
			to { opacity: 1; transform: translateX(0);}
		}

		@keyframes fadeIn {
			to { opacity: 1;}
		}

		/* Button animation on hover */
		.btn-shop {
			transition: all 0.3s ease;
		}
		.btn-shop:hover {
			transform: translateY(-3px) scale(1.05);
			box-shadow: 0 6px 15px rgba(0,0,0,0.2);
		}

		/* Floating Icon */
		.pill-icon {
			position: relative;
			animation: floatIcon 4s ease-in-out infinite;
		}

		@keyframes floatIcon {
			0%, 100% { transform: translateY(0);}
			50% { transform: translateY(-15px);}
		}
		</style>

				

				<!-- Health Products -->
				<section class="py-5 bg-light">
  <div class="container">
    
    
    <div class="row g-4">
      <!-- Product 1 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://images.apollo247.in/pub/media/catalog/product/cache/47b947ac1d5ba8bc2edf1f20ef4c8d4b/N/E/NEU0228.jpg" class="card-img-top product-img fixed-img" alt="Supplement">
          <div class="card-body">
            <h6 class="card-title">Omega-3 Fish Oil</h6>
			<p class="text-muted small mb-2">HealthVit</p>
			<p class="text-muted small mb-2">60 Softgel Capsules</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹450</span>
                <small class="text-decoration-line-through text-muted">₹550</small>
              </div>
              <span class="badge bg-success">18% OFF</span>
            </div>
            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
              <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </button>
          </div>
          <div class="added-popup">
			  <i class="fas fa-check-circle"></i>
			  <span class="popup-text">Added <strong class="product-name">Omega-3 Fish Oil</strong> to Cart!</span>
			</div>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://5.imimg.com/data5/SELLER/Default/2022/7/BN/LP/FS/156765137/whey-protein-powder-500x500.JPG" class="card-img-top product-img fixed-img" alt="Protein">
          <div class="card-body">
            <h6 class="card-title">Whey Protein Powder</h6>
            <p class="text-muted small">MuscleBlaze - 1kg</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹1,599</span>
                <small class="text-decoration-line-through text-muted">₹1,999</small>
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

      <!-- Product 3 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://m.media-amazon.com/images/I/61fT6Ln6ZgL._AC_UF1000,1000_QL80_.jpg" class="card-img-top product-img fixed-img" alt="Blood Pressure Monitor">
          <div class="card-body">
            <h6 class="card-title">Digital BP Monitor</h6>
            <p class="text-muted small">Omron HEM-7120</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹1,850</span>
                <small class="text-decoration-line-through text-muted">₹2,200</small>
              </div>
              <span class="badge bg-success">16% OFF</span>
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
          <img src="https://5.imimg.com/data5/SELLER/Default/2021/2/SH/EK/ME/46905073/patanjali-honey-500x500.jpg" class="card-img-top product-img fixed-img" alt="Honey">
          <div class="card-body">
            <h6 class="card-title">Pure Honey</h6>
            <p class="text-muted small">Patanjali - 500g</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹185</span>
                <small class="text-decoration-line-through text-muted">₹220</small>
              </div>
              <span class="badge bg-success">16% OFF</span>
            </div>
            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
              <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </button>
          </div>
          <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
        </div>
      </div>

      <!-- Product 5 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://5.imimg.com/data5/SELLER/Default/2022/9/BL/OW/QH/159418072/multivitamin-tablet-500x500.jpg" class="card-img-top product-img fixed-img" alt="Multivitamin">
          <div class="card-body">
            <h6 class="card-title">Multivitamin Tablets</h6>
			<p class="text-muted small mb-2">Revital H</p>
			<p class="text-muted small mb-2">30 Tablets</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹285</span>
                <small class="text-decoration-line-through text-muted">₹350</small>
              </div>
              <span class="badge bg-success">19% OFF</span>
            </div>
            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
              <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </button>
          </div>
          <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
        </div>
      </div>

      <!-- Product 6 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://5.imimg.com/data5/SELLER/Default/2023/7/323697804/HG/AD/YR/190881908/thermometer-500x500.jpg" class="card-img-top product-img fixed-img" alt="Thermometer">
          <div class="card-body">
            <h6 class="card-title">Digital Thermometer</h6>
            <p class="text-muted small">Dr. Morepen MT-101</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹149</span>
                <small class="text-decoration-line-through text-muted">₹199</small>
              </div>
              <span class="badge bg-success">25% OFF</span>
            </div>
            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
              <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </button>
          </div>
          <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
        </div>
      </div>

      <!-- Product 7 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://5.imimg.com/data5/SELLER/Default/2023/1/GM/GS/TN/179895623/aloe-vera-gel-500x500.jpg" class="card-img-top product-img fixed-img" alt="Aloe Vera Gel">
          <div class="card-body">
            <h6 class="card-title">Aloe Vera Gel</h6>
            <p class="text-muted small">Himalaya - 150ml</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹125</span>
                <small class="text-decoration-line-through text-muted">₹155</small>
              </div>
              <span class="badge bg-success">19% OFF</span>
            </div>
            <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn">
              <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </button>
          </div>
          <div class="added-popup"><i class="fas fa-check-circle me-2"></i>Added Successfully</div>
        </div>
      </div>

      <!-- Product 8 -->
      <div class="col-lg-3 col-md-6">
        <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
          <img src="https://5.imimg.com/data5/SELLER/Default/2022/11/LT/KF/KY/160278141/glucometer-500x500.jpg" class="card-img-top product-img fixed-img" alt="Glucometer">
          <div class="card-body">
            <h6 class="card-title">Blood Glucose Monitor</h6>
            <p class="text-muted small">Accu-Chek Active</p>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <span class="h5 text-primary-custom">₹899</span>
                <small class="text-decoration-line-through text-muted">₹1,100</small>
              </div>
              <span class="badge bg-success">18% OFF</span>
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

<style>
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
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $('.add-cart-btn').on('click', function(){
    const $card = $(this).closest('.product-card');
    const $img = $card.find('.product-img');
    const $popup = $card.find('.added-popup');

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
    }, 1700);
  });
});
</script>

<style>
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
</style>

                <!-- Load More Button -->
                <div class="text-center mt-5">
                    <button class="btn btn-outline-primary btn-lg fw-semibold px-5" style="color: var(--pharmeasy-primary); border-color: var(--pharmeasy-primary);">
                        <i class="fas fa-plus me-2"></i>Load More Products
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed Section -->
    <div class="py-5" style="background-color: var(--pharmeasy-light);">
        <div class="container">
            <h3 class="fw-bold mb-4" style="color: var(--pharmeasy-primary);">Recently Viewed</h3>
            <div class="row g-3">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-dumbbell fa-2x" style="color: var(--pharmeasy-primary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">Whey Protein</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-thermometer-half fa-2x" style="color: var(--pharmeasy-secondary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">Digital Thermometer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-heartbeat fa-2x" style="color: var(--pharmeasy-primary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">BP Monitor</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-leaf fa-2x" style="color: var(--pharmeasy-secondary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">Aloe Vera Gel</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-tablets fa-2x" style="color: var(--pharmeasy-primary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">Multivitamins</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-white" style="height: 120px;">
                            <i class="fas fa-tint fa-2x" style="color: var(--pharmeasy-secondary);"></i>
                        </div>
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">Glucometer</small>
                        </div>
                    </div>
                </div>
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
                    <p>India's most trusted online pharmacy. Get medicines and health products delivered to your doorstep with just a few clicks.</p>
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
                        <li><a href="#" class="text-white text-decoration-none">Supplements</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Fitness & Sports</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Personal Care</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Medical Devices</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h6 class="mb-3">Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Upload Prescription</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Order on Call</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Health Consultation</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Home Health Tests</a></li>
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
<!-- Bootstrap Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
