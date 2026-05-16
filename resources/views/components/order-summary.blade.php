           
                <div class="order-summary">
                    <!-- Order Summary Card -->
                    <div class="p-4 mb-4">
                        <h5 class="fw-bold mb-4" style="color: var(--pharmeasy-primary);">Order Summary</h5>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Item Total ({{$cartCount}} items)</span>
                            <span class="fw-semibold">₹{{$grandTotal}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Delivery Charges</span>
                            <div class="text-end">
                                @if($grandTotal > "199")
                                    @php
                                        $deliveryCharges = 0;
                                    @endphp

                                    <span class="price-original me-2">₹50</span>
                                    <span class="fw-semibold text-success">FREE</span>
                                @else
                                    <span class="fw-semibold text-success">₹50</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Total Discount</span>
                            <span class="fw-semibold text-success">-₹{{$grandTotal - $totalDiscounted}}</span>
                        </div>
                        
                        <hr class="my-4">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="h6 fw-bold">Amount to Pay</span>
                            <span class="h5 fw-bold price-current">₹{{$grandTotal + $deliveryCharges}}</span>
                        </div>
                        
                        <div class="alert alert-success mb-4">
                            <i class="fas fa-check-circle me-2"></i>
                            <small class="fw-semibold">You saved ₹{{$grandTotal - $totalDiscounted}} on this order!</small>
                        </div>
                        
                        @if($addressesCount)
                            <button class="btn btn-primary w-100 text-white fw-semibold mb-3 py-3" id="proceedCheckout">
                                <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                            </button>
                        @else
                            <button class="btn btn-primary w-100 text-white fw-semibold mb-3 py-3" disabled>
                                <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                            </button>
                        @endif
                        <div class="text-center">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                100% Safe & Secure Payments
                            </small>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Accepted Payment Methods</h6>
                        <div class="row g-3">
                            <div class="col-6 col-sm-3 col-lg-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <i class="fab fa-cc-visa fa-2x text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <i class="fab fa-cc-mastercard fa-2x text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <i class="fas fa-mobile-alt fa-2x text-success"></i>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-6">
                                <div class="border rounded-3 p-3 text-center">
                                    <i class="fas fa-university fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Delivery Info -->
                    <div class="bg-white rounded-4 shadow-sm p-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">Delivery Information</h6>
                        
                        @if(!$deliveryCharges)
                        <div class="d-flex align-items-center mb-3 p-3 bg-light rounded-3">
                            <div class="bg-white rounded-circle p-2 me-3 shadow-sm">
                                <i class="fas fa-truck text-success"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small">Free Delivery</div>
                                <div class="text-muted small">Your order qualifies for free delivery</div>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex align-items-center mb-3 p-3 bg-light rounded-3">
                            <div class="bg-white rounded-circle p-2 me-3 shadow-sm">
                                <i class="fas fa-clock text-info"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small">Same Day Delivery</div>
                                <div class="text-muted small">Order before 6 PM</div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center p-3 bg-light rounded-3">
                            <div class="bg-white rounded-circle p-2 me-3 shadow-sm">
                                <i class="fas fa-undo-alt text-warning"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small">Easy Returns</div>
                                <div class="text-muted small">7 days return policy</div>
                            </div>
                        </div>
                    </div>
                </div>
            