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
                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                    <div>
                        <h4 class="fw-bold text-success mb-1">
                            <i class="fas fa-file-prescription me-2"></i>My Prescriptions
                        </h4>
                        <p class="text-muted mb-0">Upload and manage your prescriptions</p>
                    </div>
                    <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#uploadPrescriptionModal">
                        <i class="fas fa-upload me-2"></i>Upload Prescription
                    </button>
                </div>

                <!-- Info Alert -->
                <div class="alert alert-info rounded-4 mb-4">
                    <div class="d-flex">
                        <i class="fas fa-info-circle fs-4 me-3"></i>
                        <div>
                            <p class="fw-semibold mb-1">How to upload prescription?</p>
                            <p class="mb-0 small">Take a clear photo of your prescription or scan it. Make sure doctor's name, signature, and medicines are clearly visible. Supported formats: JPG, PNG, PDF (Max 5MB)</p>
                        </div>
                    </div>
                </div>

                <!-- No  Presciption -->
                <!-- Empty State (hidden by default) -->
                <div class="empty-state my-5" id="empty-state">
                    <div class="empty-state-icon">
                        <i class="fa-solid fa-file-prescription"></i>
                    </div>

                    <h5 class="fw-bold mb-2">No Prescription Found</h5>
                    <p class="text-muted mb-4">You haven't uploaded any prescription yet.</p>
                    <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#uploadPrescriptionModal">
                        <i class="fas fa-upload me-2"></i>Upload Now
                    </button>
                </div>

                <!-- Prescription Cards -->
                <div class="row g-4">
                    <!-- Prescription 1 - Verified -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Prescription #RX001</h6>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-calendar me-1"></i>Uploaded on: March 15, 2024
                                        </p>
                                    </div>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>Verified
                                    </span>
                                </div>
                                
                                <div class="bg-light rounded-3 p-3 mb-3 text-center">
                                    <i class="fas fa-file-medical fs-1 text-success mb-2"></i>
                                    <p class="mb-0 small text-muted">prescription_march_2024.pdf</p>
                                </div>
                                
                                <div class="mb-3">
                                    <p class="mb-2"><span class="text-muted small">Doctor:</span> <span class="fw-semibold">Dr. Rajesh Kumar</span></p>
                                    <p class="mb-2"><span class="text-muted small">Valid Until:</span> <span class="fw-semibold">June 15, 2024</span></p>
                                    <p class="mb-0"><span class="text-muted small">Medicines:</span> <span class="fw-semibold">3 items prescribed</span></p>
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-download me-1"></i>Download
                                    </button>
                                    <button class="btn btn-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-shopping-cart me-1"></i>Order Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prescription 2 - Under Review -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Prescription #RX002</h6>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-calendar me-1"></i>Uploaded on: March 22, 2024
                                        </p>
                                    </div>
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i>Under Review
                                    </span>
                                </div>
                                
                                <div class="bg-light rounded-3 p-3 mb-3 text-center">
                                    <i class="fas fa-file-image fs-1 text-warning mb-2"></i>
                                    <p class="mb-0 small text-muted">prescription_scan.jpg</p>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="alert alert-warning py-2 mb-0">
                                        <small>
                                            <i class="fas fa-hourglass-half me-1"></i>
                                            Our pharmacist is reviewing your prescription. This usually takes 2-4 hours.
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prescription 3 - Expired -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Prescription #RX003</h6>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-calendar me-1"></i>Uploaded on: January 10, 2024
                                        </p>
                                    </div>
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-calendar-times me-1"></i>Expired
                                    </span>
                                </div>
                                
                                <div class="bg-light rounded-3 p-3 mb-3 text-center">
                                    <i class="fas fa-file-pdf fs-1 text-secondary mb-2"></i>
                                    <p class="mb-0 small text-muted">prescription_jan_2024.pdf</p>
                                </div>
                                
                                <div class="mb-3">
                                    <p class="mb-2"><span class="text-muted small">Doctor:</span> <span class="fw-semibold">Dr. Priya Sharma</span></p>
                                    <p class="mb-2"><span class="text-muted small">Expired On:</span> <span class="fw-semibold text-danger">March 10, 2024</span></p>
                                    <p class="mb-0"><span class="text-muted small">Medicines:</span> <span class="fw-semibold">2 items prescribed</span></p>
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-redo me-1"></i>Renew
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prescription 4 - Rejected -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Prescription #RX004</h6>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-calendar me-1"></i>Uploaded on: March 20, 2024
                                        </p>
                                    </div>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times-circle me-1"></i>Rejected
                                    </span>
                                </div>
                                
                                <div class="bg-light rounded-3 p-3 mb-3 text-center">
                                    <i class="fas fa-file-image fs-1 text-danger mb-2"></i>
                                    <p class="mb-0 small text-muted">blurry_prescription.jpg</p>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="alert alert-danger py-2 mb-0">
                                        <small>
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            Prescription rejected: Image quality is poor. Doctor's signature not clearly visible. Please upload a clearer image.
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </button>
                                    <button class="btn btn-success btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-upload me-1"></i>Re-upload
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm rounded-3 flex-fill">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload New Card -->
                    <div class="col-lg-4">
                        <div class="card border-2 border-dashed border-success rounded-4 h-100" style="min-height: 300px;">
                            <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-upload fs-1 text-success"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Upload New Prescription</h5>
                                <p class="text-muted mb-3">Upload your doctor's prescription to order medicines</p>
                                <button class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#uploadPrescriptionModal">
                                    <i class="fas fa-upload me-2"></i>Upload Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Prescription Modal -->
    <div class="modal fade" id="uploadPrescriptionModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-success">
                        <i class="fas fa-upload me-2"></i>Upload Prescription
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <!-- Upload Info -->
                        <div class="alert alert-info rounded-3 mb-4">
                            <h6 class="fw-semibold mb-2">Important Guidelines:</h6>
                            <ul class="mb-0 small ps-3">
                                <li>Ensure the prescription image is clear and readable</li>
                                <li>Doctor's name, signature, and date should be visible</li>
                                <li>Supported formats: JPG, PNG, PDF (Maximum 5MB)</li>
                                <li>Prescription should be valid and not expired</li>
                            </ul>
                        </div>

                        <!-- File Upload Area -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload File <span class="text-danger">*</span></label>
                            <div class="border-2 border-dashed border-success rounded-3 p-5 text-center bg-light">
                                <i class="fas fa-cloud-upload-alt fs-1 text-success mb-3"></i>
                                <p class="fw-semibold mb-2">Drag & Drop your prescription here</p>
                                <p class="text-muted small mb-3">or</p>
                                <input type="file" class="d-none" id="prescriptionFile" accept=".jpg,.jpeg,.png,.pdf">
                                <label for="prescriptionFile" class="btn btn-success rounded-3">
                                    <i class="fas fa-folder-open me-2"></i>Browse Files
                                </label>
                                <p class="text-muted small mt-3 mb-0">Supported: JPG, PNG, PDF (Max 5MB)</p>
                            </div>
                        </div>

                        <!-- Patient Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Patient Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg rounded-3" placeholder="Enter patient name">
                        </div>

                        <!-- Doctor Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Doctor Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg rounded-3" placeholder="Enter doctor name">
                        </div>

                        <!-- Date of Prescription -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Prescription Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-lg rounded-3">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Valid Until</label>
                                <input type="date" class="form-control form-control-lg rounded-3">
                            </div>
                        </div>

                        <!-- Additional Notes -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Additional Notes (Optional)</label>
                            <textarea class="form-control rounded-3" rows="3" placeholder="Any special instructions or notes"></textarea>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck">
                                <label class="form-check-label small" for="termsCheck">
                                    I certify that this prescription is genuine and issued by a registered medical practitioner. I understand that providing false information is a legal offense.
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <button type="button" class="btn btn-outline-secondary btn-lg rounded-3 flex-fill" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-success btn-lg rounded-3 flex-fill">
                                <i class="fas fa-upload me-2"></i>Upload Prescription
                            </button>
                        </div>
                    </form>
                </div>
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