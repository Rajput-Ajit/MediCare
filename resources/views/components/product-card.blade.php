<div class="col-lg-3 col-md-6">
            <div class="card product-card h-100 border-0 shadow-sm position-relative text-center">
            <img src="{{url('storage/'.$product->productImages)}}" class="card-img-top product-img fixed-img" alt="Medicine">
            <div class="card-body">
                <h6 class="card-title">
                    {{$product->medicineName}}
                </h6>
                <p class="text-muted small mb-2">
                    {{$product->manufacturer}}
                </p>
                <p class="text-muted small mb-2">
                    {{$product->packSize}}
                </p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <span class="h5 text-primary-custom">₹{{$product->sellingPrice}}</span>
                    <small class="text-decoration-line-through text-muted">₹{{$product->mrp}}</small>
                </div>
                <span class="badge bg-success">{{ number_format((($product->mrp - $product->sellingPrice) / $product->mrp) * 100, 2) }}% OFF</span>
                </div>
                <button class="btn btn-primary-custom w-100 mt-2 add-cart-btn" data-product="{{$product->id}}">
                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
            <div class="added-popup">
                <i class="fas fa-check-circle"></i>
                <span class="popup-text">Added <strong class="product-name">{{$product->medicineName}}</strong> to Cart!</span>
                </div>
            </div>
      </div>