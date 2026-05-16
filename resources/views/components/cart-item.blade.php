<div class="cart-item border-bottom">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-sm-3 col-lg-2">
                                <div class="product-icon" @if($medicine['stockQuantity'] == "0") style="pointer-events: none; opacity: 0.6;" @endif>
                                    <img src="{{ url('storage/'.$img) }}" 
                                    alt="Medicine" 
                                    class="img-fluid" 
                                    style="max-width: 80px; height: auto;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-lg-4 product-details" @if($medicine['stockQuantity'] == "0") style="pointer-events: none; opacity: 0.6;" @endif>
                                <h6 class="fw-bold mb-2">{{$medicine['medicineName']}}</h6>
                                <p class="text-muted mb-2 small">By {{$medicine['manufacturer']}} • {{$medicine['packSize']}}</p>
                                <div class="d-flex flex-wrap gap-2">
                                    @if($medicine['stockQuantity'] > "0")
                                    <span class="badge bg-success">In Stock</span>
                                    @else
                                    <span class="badge bg-danger">Out Of Stock</span>
                                    @endif

                                    @if($medicine['prescriptionRequired'] == "yes")
                                        @php
                                            $uploadPrescription = true;
                                        @endphp
                                        <span class="badge bg-warning text-dark">Prescription Required</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 mobile-center" @if($medicine['stockQuantity'] == "0") style="pointer-events: none; opacity: 0.6;" @endif>
                                <div class="d-flex justify-content-center">
                                    <div class="input-group quantity-control" style="width: 120px;">
                                        <button class="btn btn-outline-secondary updateCart" type="button" data-id="{{$medicine['id']}}" data-type="decrement">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control" value="{{$quantity}}" readonly>
                                        <button class="btn btn-outline-secondary updateCart" type="button" data-id="{{$medicine['id']}}" data-type="increment">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-2 mobile-center" @if($medicine['stockQuantity'] == "0") style="pointer-events: none; opacity: 0.6;" @endif>
                                <div class="d-flex flex-column align-items-center">
                                    <span class="price-current">₹{{$discountedPrice}}</span>
                                    <span class="price-original">₹{{$mrp}}</span>
                                    <span class="badge bg-success">{{round($percentOff)}}% OFF</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 cart-actions">
                                <div class="d-flex flex-row flex-lg-column align-items-center justify-content-center gap-2">
                                    <button class="btn btn-outline-danger btn-sm updateCart" data-id="{{$medicine['id']}}" data-type="trash">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>