<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Medicine - MediCare+ Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --pharmeasy-primary: #10847e;
            --pharmeasy-secondary: #ff6900;
            --pharmeasy-light: #f8fffe;
            --pharmeasy-dark: #0a5c59;
        }

        .admin-sidebar {
            background: linear-gradient(135deg, var(--pharmeasy-primary), var(--pharmeasy-dark));
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .admin-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--pharmeasy-primary);
            box-shadow: 0 0 0 0.2rem rgba(16, 132, 126, 0.25);
        }

        .btn-primary {
            background-color: var(--pharmeasy-primary);
            border-color: var(--pharmeasy-primary);
        }

        .btn-primary:hover {
            background-color: var(--pharmeasy-dark);
            border-color: var(--pharmeasy-dark);
        }

        .btn-secondary {
            background-color: var(--pharmeasy-secondary);
            border-color: var(--pharmeasy-secondary);
        }

        .sidebar-toggle {
            display: none;
        }

        .image-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-upload-area:hover {
            border-color: var(--pharmeasy-primary);
            background-color: var(--pharmeasy-light);
        }

        .image-upload-area.dragover {
            border-color: var(--pharmeasy-primary);
            background-color: var(--pharmeasy-light);
        }

        .preview-image {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                width: 250px;
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .section-divider {
            border-top: 2px solid #e9ecef;
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include("admin.component.sidebar", ['page' => "add"]);

    <!-- Top-right alert container -->
        <div style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="toast align-items-center text-bg-danger border-0 show mb-2" 
                        role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ $error }}
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" 
                                    data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            @endif

            @if(session('success'))
                    <div class="toast align-items-center text-bg-success border-0 show mb-2" 
                        role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{session('success')}}
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" 
                                    data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
            @endif

            @if(session('error'))
                    <div class="toast align-items-center text-bg-danger border-0 show mb-2" 
                        role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{session('error')}}
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" 
                                    data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
            @endif
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll('.toast').forEach(function (toastEl) {
                    let toast = new bootstrap.Toast(toastEl);
                    toast.show(); // this will respect data-bs-autohide + data-bs-delay
                });
            });
        </script>

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Top Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-primary sidebar-toggle me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--pharmeasy-primary);">Add New Medicine</h2>
                    <p class="text-muted mb-0">Fill in the details to add a new medicine to your inventory</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i>Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <form id="addMedicineForm" method="POST" action="{{ route('admin.add-medicines-post') }}" enctype="multipart/form-data">
                            @csrf  
                        <!-- Basic Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-info-circle me-2"></i>Basic Information
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="medicineName" class="form-label fw-semibold">Medicine Name *</label>
                                    <input type="text" class="form-control" id="medicineName" name="medicineName" value="{{old('medicineName')}}" required placeholder="e.g., Paracetamol 500mg">
                                    @error('medicineName')
                                    <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="genericName" class="form-label fw-semibold">Generic Name</label>
                                    <input type="text" class="form-control" id="genericName" name="genericName" placeholder="e.g., Acetaminophen" value="{{old('genericName')}}">
                                    @error('genericName')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="manufacturer" class="form-label fw-semibold">Manufacturer *</label>
                                    <select class="form-select" id="manufacturer" name="manufacturer" required>
                                        <option value="">Select Manufacturer</option>
                                        <option value="cipla" {{old('manufacturer') == 'cipla' ? 'selected' : ''}}>Cipla Ltd</option>
                                        <option value="sun" {{old('manufacturer') == 'sun' ? 'selected' : ''}}>Sun Pharmaceutical</option>
                                        <option value="lupin" {{old('manufacturer') == 'lupin' ? 'selected' : ''}}>Lupin Pharmaceuticals</option>
                                        <option value="drl" {{old('manufacturer') == 'drl' ? 'selected' : ''}}>Dr. Reddy's Laboratories</option>
                                        <option value="aurobindo" {{old('manufacturer') == 'aurobindo' ? 'selected' : ''}}>Aurobindo Pharma</option>
                                        <option value="other" {{old('manufacturer') == 'other' ? 'selected' : ''}}>Other</option>
                                    </select>
                                    @error('manufacturer')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="category" class="form-label fw-semibold">Category *</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="pain-relief" {{old('category') == 'pain-relief' ? 'selected' : ''}}>Pain Relief</option>
                                        <option value="antibiotics" {{old('category') == 'antibiotics' ? 'selected' : ''}}>Antibiotics</option>
                                        <option value="vitamins" {{old('category') == 'vitamins' ? 'selected' : ''}}>Vitamins & Supplements</option>
                                        <option value="cardiac" {{old('category') == 'cardiac' ? 'selected' : ''}}>Cardiac Care</option>
                                        <option value="diabetes" {{old('category') == 'diabetes' ? 'selected' : ''}}>Diabetes Care</option>
                                        <option value="respiratory" {{old('category') == 'respiratory' ? 'selected' : ''}}>Respiratory</option>
                                        <option value="gastro" {{old('category') == 'gastro' ? 'selected' : ''}}>Gastroenterology</option>
                                        <option value="other" {{old('category') == 'other' ? 'selected' : ''}}>Other</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="medicineType" class="form-label fw-semibold">Medicine Type *</label>
                                    <select class="form-select" id="medicineType" name="medicineType" required>
                                        <option value="">Select Type</option>
                                        <option value="tablet" {{old('medicineType') == 'tablet' ? 'selected' : ''}}>Tablet</option>
                                        <option value="capsule" {{old('medicineType') == 'capsule' ? 'selected' : ''}}>Capsule</option>
                                        <option value="syrup" {{old('medicineType') == 'syrup' ? 'selected' : ''}}>Syrup</option>
                                        <option value="injection" {{old('medicineType') == 'injection' ? 'selected' : ''}}>Injection</option>
                                        <option value="cream" {{old('medicineType') == 'cream' ? 'selected' : ''}}>Cream/Ointment</option>
                                        <option value="drops" {{old('medicineType') == 'drops' ? 'selected' : ''}}>Drops</option>
                                        <option value="inhaler" {{old('medicineType') == 'inhaler' ? 'selected' : ''}}>Inhaler</option>
                                    </select>
                                    @error('medicineType')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Details Section -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-box me-2"></i>Product Details
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label for="packSize" class="form-label fw-semibold">Pack Size *</label>
                                    <input type="text" class="form-control" id="packSize" name="packSize" required placeholder="e.g., Strip of 10" value="{{old('packSize')}}">
                                    @error('packSize')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                                <div class="col-md-3">
                                    <label for="unitQuantity" class="form-label fw-semibold">Unit Quantity *</label>
                                    <input type="number" class="form-control" id="unitQuantity" name="unitQuantity" required placeholder="10" value="{{old('unitQuantity')}}">
                                    @error('unitQuantity')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="prescriptionRequired" class="form-label fw-semibold">Prescription Required</label>
                                    <select class="form-select" id="prescriptionRequired" name="prescriptionRequired">
                                        <option value="yes" {{old('prescriptionRequired') == 'yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="no" {{old('prescriptionRequired') == 'no' ? 'selected' : ''}}>No</option>
                                    </select>
                                    @error('prescriptionRequired')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-12">
                                    <label for="description" class="form-label fw-semibold">Product Description</label>
                                    <textarea class="form-control" id="description" rows="4" placeholder="Enter detailed product description..." name="description">{{old('description')}}</textarea>
                                    @error('description')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Pricing Section -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-rupee-sign me-2"></i>Pricing Information
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label for="mrp" class="form-label fw-semibold">MRP (₹) *</label>
                                    <input type="number" class="form-control" id="mrp" step="0.01" name="mrp" required placeholder="33.00" value="{{old('mrp')}}">
                                    @error('mrp')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="sellingPrice" class="form-label fw-semibold">Selling Price (₹) *</label>
                                    <input type="number" class="form-control" id="sellingPrice" step="0.01" name="sellingPrice" required placeholder="25.00" value="{{old('sellingPrice')}}">
                                    @error('sellingPrice')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="discount" class="form-label fw-semibold">Discount (%)</label>
                                    <input type="number" class="form-control" id="discount" name="discount" readonly placeholder="25%" value="{{old('discount')}}">
                                    @error('discount')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="gst" class="form-label fw-semibold">GST Rate (%)</label>
                                    <select class="form-select" id="gst" name="gst">
                                        <option value="0" {{old('gst') == '0' ? 'selected' : ''}}>0%</option>
                                        <option value="5" {{old('gst') == '5' ? 'selected' : ''}}>5%</option>
                                        <option value="18" {{old('gst') == '18' ? 'selected' : ''}}>18%</option>
                                    </select>
                                    @error('gst')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Inventory Section -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-warehouse me-2"></i>Inventory Management
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label for="stockQuantity" class="form-label fw-semibold">Stock Quantity *</label>
                                    <input type="number" class="form-control" id="stockQuantity" name="stockQuantity" required placeholder="100" value="{{old('stockQuantity')}}">
                                    @error('stockQuantity')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="minStock" class="form-label fw-semibold">Minimum Stock Alert</label>
                                    <input type="number" class="form-control" id="minStock" name="minStock" placeholder="10" value="{{old('minStock')}}">
                                    @error('minStock')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="batchNumber" class="form-label fw-semibold">Batch Number</label>
                                    <input type="text" class="form-control" id="batchNumber" name="batchNumber" placeholder="BATCH001" value="{{old('batchNumber')}}">
                                    @error('batchNumber')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="expiryDate" class="form-label fw-semibold">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiryDate" name="expiryDate" value="{{old('expiryDate')}}" min="{{ date('Y-m-d') }}">
                                    @error('expiryDate')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Images Section -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-camera me-2"></i>Product Images
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-12">
                                    <div class="image-upload-area" id="imageUploadArea">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                        <h6 class="text-muted">Drag & Drop images here or click to browse</h6>
                                        <p class="text-muted small mb-0">Supported formats: JPG, PNG, WEBP (Max 5MB)</p>
                                        <input type="file" class="d-none" id="productImages" name="productImages"  accept="image/*">
                                        @error('productImages')
                                            <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div id="imagePreview" class="d-flex flex-wrap gap-3 mt-3"></div>
                                </div>
                            </div>

                            <!-- Usage Instructions Section -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-book-medical me-2"></i>Medical Information
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="uses" class="form-label fw-semibold">Uses/Indications</label>
                                    <textarea class="form-control" id="uses" rows="4" placeholder="List the medical uses and indications..." name="uses">{{old('uses')}}</textarea>
                                    @error('uses')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="dosageInstructions" class="form-label fw-semibold">Dosage Instructions</label>
                                    <textarea class="form-control" id="dosageInstructions" rows="4" placeholder="Enter dosage instructions for adults and children..." name="dosageInstructions">{{old('dosageInstructions')}}</textarea>
                                    @error('dosageInstructions')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                <div class="col-md-6">
                                    <label for="sideEffects" class="form-label fw-semibold">Side Effects</label>
                                    <textarea class="form-control" id="sideEffects" rows="4" placeholder="List possible side effects..." name="sideEffects">{{old('sideEffects')}}</textarea>
                                    @error('sideEffects')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="precautions" class="form-label fw-semibold">Precautions & Contraindications</label>
                                    <textarea class="form-control" id="precautions" rows="4" placeholder="Enter precautions and contraindications..." name="precautions">{{old('precautions')}}</textarea>
                                    @error('precautions')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="composition" class="form-label fw-semibold">Composition</label>
                                    <textarea class="form-control" id="composition" rows="2" placeholder="List active and inactive ingredients..." name="composition">{{old('composition')}}</textarea>
                                    @error('composition')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Storage & Other Information -->
                            <div class="section-divider"></div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="fw-bold mb-3" style="color: var(--pharmeasy-primary);">
                                        <i class="fas fa-thermometer-half me-2"></i>Storage & Additional Information
                                    </h5>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label for="storageConditions" class="form-label fw-semibold">Storage Conditions</label>
                                    <textarea class="form-control" id="storageConditions" rows="3" placeholder="Store in cool, dry place..." name="storageConditions">{{old('storageConditions')}}</textarea>
                                    @error('storageConditions')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="drugSchedule" class="form-label fw-semibold">Drug Schedule</label>
                                    <select class="form-select" id="drugSchedule" name="drugSchedule">
                                        <option value="">Select Schedule</option>
                                        <option value="h" {{old('drugSchedule') == 'h' ? 'selected' : ''}}>Schedule H</option>
                                        <option value="h1" {{old('drugSchedule') == 'h1' ? 'selected' : ''}}>Schedule H1</option>
                                        <option value="x" {{old('drugSchedule') == 'x' ? 'selected' : ''}}>Schedule X</option>
                                        <option value="otc" {{old('drugSchedule') == 'otc' ? 'selected' : ''}}>OTC (Over The Counter)</option>
                                    </select>
                                    @error('drugSchedule')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label fw-semibold">Product Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                        <!--
                                        <option value="discontinued" >Discontinued</option>
                                        -->
                                    </select>
                                    @error('status')
                                        <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="section-divider"></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg px-4" id="AddMedicine">
                                            <i class="fas fa-plus-circle me-2"></i>Add Medicine
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });

        // Calculate discount percentage automatically
        function calculateDiscount() {
            const mrp = parseFloat(document.getElementById('mrp').value) || 0;
            const sellingPrice = parseFloat(document.getElementById('sellingPrice').value) || 0;
            
            if (mrp > 0 && sellingPrice > 0) {
                const discount = ((mrp - sellingPrice) / mrp) * 100;
                document.getElementById('discount').value = Math.round(discount);
            } else {
                document.getElementById('discount').value = '';
            }
        }

        // Add event listeners for price calculation
        document.getElementById('mrp').addEventListener('input', calculateDiscount);
        document.getElementById('sellingPrice').addEventListener('input', calculateDiscount);

        // Image upload functionality
        const imageUploadArea = document.getElementById('imageUploadArea');
        const productImages = document.getElementById('productImages');
        const imagePreview = document.getElementById('imagePreview');

        // Click to upload
        imageUploadArea.addEventListener('click', () => {
            productImages.click();
        });

        // Drag and drop functionality
        imageUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageUploadArea.classList.add('dragover');
        });

        imageUploadArea.addEventListener('dragleave', () => {
            imageUploadArea.classList.remove('dragover');
        });

        imageUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            imageUploadArea.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        // File input change
        productImages.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            imagePreview.innerHTML = '';
            
            Array.from(files).forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const imageContainer = document.createElement('div');
                        imageContainer.className = 'position-relative';
                        imageContainer.innerHTML = `
                            <img src="${e.target.result}" alt="Preview ${index + 1}" class="preview-image">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                    style="width: 25px; height: 25px; margin: 5px;" onclick="removeImage(this)">
                                <i class="fas fa-times" style="font-size: 10px;"></i>
                            </button>
                        `;
                        imagePreview.appendChild(imageContainer);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function removeImage(button) {
            button.parentElement.remove();
        }

        // Form submission
        /*
        document.getElementById('addMedicineForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Here you would normally send the data to your backend
            // For demo purposes, we'll just show a success message
            alert('Medicine added successfully!');
            
            // You can collect all form data like this:
            const formData = new FormData();
            
            // Add all form fields
            const fields = [
                'medicineName', 'genericName', 'manufacturer', 'category', 'medicineType',
                'strength', 'packSize', 'unitQuantity', 'prescriptionRequired', 'description',
                'mrp', 'sellingPrice', 'discount', 'gst', 'stockQuantity', 'minStock',
                'batchNumber', 'expiryDate', 'uses', 'dosageInstructions', 'sideEffects',
                'precautions', 'composition', 'storageConditions', 'drugSchedule', 'status'
            ];
            
            fields.forEach(field => {
                formData.append(field, document.getElementById(field).value);
            });
            
            // Add images
            const images = document.getElementById('productImages').files;
            for (let i = 0; i < images.length; i++) {
                formData.append('images[]', images[i]);
            }
            
            console.log('Form data prepared for submission:', Object.fromEntries(formData));
        });
        */

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('show') && 
                !sidebar.contains(event.target) && 
                !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });

        let AddMedicine = document.getElementById('AddMedicine');
        
        document.getElementById('addMedicineForm').addEventListener('submit', function(e) {
            AddMedicine.innerHTML = `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Adding...`;
        });
    </script>
    
</body>
</html>