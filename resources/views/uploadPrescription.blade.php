<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Prescription | MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #10847e;
            --secondary-color: #ff6b35;
            --light-green: #e8f5f4;
            --dark-green: #0a6b66;
            --orange: #ff6b35;
            --light-orange: #fff2ef;
        }
        
        body {
            background: linear-gradient(135deg, #f8fdfc 0%, #e8f5f4 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .bg-primary-custom {
            background-color: var(--primary-color) !important;
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
        
        /* Upload Zone Styles */
        .upload-zone {
            border: 3px dashed #10847e;
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fdfc 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 300px;
            position: relative;
            overflow: hidden;
        }
        
        .upload-zone:hover {
            border-color: #0a6b66;
            background: linear-gradient(135deg, #f8fdfc 0%, #e8f5f4 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(16, 132, 126, 0.15);
        }
        
        .upload-zone.dragover {
            border-color: #ff6b35;
            background: linear-gradient(135deg, #fff2ef 0%, #ffe6dc 100%);
            transform: scale(1.02);
        }
        
        .upload-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* File Preview Styles */
        .file-preview {
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .file-preview:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .file-preview img {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        
        .file-preview:hover img {
            transform: scale(1.05);
        }
        
        /* Progress Bar */
        .upload-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        
        .upload-progress.complete {
            transform: scaleX(1);
        }
        
        /* Form Styles */
        .form-floating > .form-control {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 1rem 0.75rem;
            transition: all 0.3s ease;
        }
        
        .form-floating > .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(16, 132, 126, 0.1);
        }
        
        /* Modern Button */
        .btn-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0a6b66 100%);
            border: none;
            border-radius: 15px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-modern:hover::before {
            left: 100%;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 132, 126, 0.3);
        }
        
        /* Feature Cards */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), #0a6b66);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .upload-zone {
                min-height: 250px;
            }
            
            .upload-icon {
                font-size: 3rem;
            }
            
            .feature-card {
                padding: 1.5rem;
                margin-bottom: 1rem;
            }
        }
        
        /* Success Animation */
        .success-checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 3;
            stroke: #4CAF50;
            stroke-miterlimit: 10;
            margin: 0 auto;
            box-shadow: inset 0px 0px 0px #4CAF50;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }
        
        .success-checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 3;
            stroke-miterlimit: 10;
            stroke: #4CAF50;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        
        .success-checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4CAF50;
            }
        }
    </style>
</head>
<body>
     <!-- ================================
         NAVIGATION BAR
         ================================ -->
    @include("component.navbar", ["page" => "Upload_Prescription", 'oldSearch' => '', 'qty' => '']);

    <!-- Breadcrumb -->
    <div class="py-3 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none" style="color: var(--primary-color);">Home</a></li>
                    <li class="breadcrumb-item active text-muted">Upload Prescription</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-5">
        <!-- Header Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-color);">
                    <i class="fas fa-file-medical me-3"></i>Upload Your Prescription
                </h1>
                <p class="lead text-muted">Simply upload a photo of your prescription and we'll prepare your medicines. Easy, fast, and convenient!</p>
            </div>
        </div>

        <div class="row">
            <!-- Upload Section -->
            <div class="col-lg-8">
                <div class="bg-white rounded-4 shadow-lg p-4 mb-4">
                    <h3 class="fw-bold mb-4" style="color: var(--primary-color);">
                        <i class="fas fa-cloud-upload-alt me-2"></i>Upload Prescription Images
                    </h3>
                    
                    <!-- Upload Zone -->
                    <div class="upload-zone d-flex flex-column justify-content-center align-items-center p-4 mb-4" id="uploadZone">
                        <i class="fas fa-camera upload-icon"></i>
                        <h4 class="fw-bold mb-2" style="color: var(--primary-color);">Drop your prescription here</h4>
                        <p class="text-muted mb-3">or click to browse from your device</p>
                        <input type="file" id="fileInput" class="d-none" multiple accept="image/*,application/pdf">
                        <button class="btn btn-modern" onclick="document.getElementById('fileInput').click();">
                            <i class="fas fa-plus me-2"></i>Choose Files
                        </button>
                        <small class="text-muted mt-2">Supports: JPG, PNG, PDF (Max 10MB each)</small>
                    </div>
                    
                    <!-- File Previews -->
                    <div id="filePreviews" class="row g-3 mb-4"></div>
                    
                    <!-- Patient Information Form -->
                    <div class="bg-light rounded-3 p-4">
                        <h5 class="fw-bold mb-3" style="color: var(--primary-color);">Patient Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="patientName" placeholder="Patient Name" required>
                                    <label for="patientName">Patient Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone Number" required>
                                    <label for="phoneNumber">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label for="gender">Gender *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="age" placeholder="Age" min="1" max="120" required>
                                    <label for="age">Age *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="deliveryAddress" placeholder="Delivery Address" style="height: 100px" required></textarea>
                                    <label for="deliveryAddress">Delivery Address *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="additionalNotes" placeholder="Additional Notes" style="height: 80px"></textarea>
                                    <label for="additionalNotes">Additional Notes (Optional)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button class="btn btn-modern btn-lg px-5" id="submitPrescription">
                            <i class="fas fa-paper-plane me-2"></i>Submit Prescription
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- How it Works -->
                <div class="bg-white rounded-4 shadow-lg p-4 mb-4">
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">
                        <i class="fas fa-question-circle me-2"></i>How it Works
                    </h5>
                    <div class="d-flex align-items-start mb-3">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; min-width: 40px; font-size: 1rem;">1</div>
                        <div>
                            <h6 class="fw-semibold">Upload Prescription</h6>
                            <small class="text-muted">Take a clear photo of your prescription and upload it</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; min-width: 40px; font-size: 1rem;">2</div>
                        <div>
                            <h6 class="fw-semibold">We Review</h6>
                            <small class="text-muted">Our pharmacists verify and prepare your medicines</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="feature-icon me-3" style="width: 40px; height: 40px; min-width: 40px; font-size: 1rem;">3</div>
                        <div>
                            <h6 class="fw-semibold">Fast Delivery</h6>
                            <small class="text-muted">Get your medicines delivered to your doorstep</small>
                        </div>
                    </div>
                </div>
                
                <!-- Features -->
                <div class="bg-white rounded-4 shadow-lg p-4 mb-4">
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">
                        <i class="fas fa-star me-2"></i>Why Choose Us?
                    </h5>
                    <div class="feature-item mb-3">
                        <i class="fas fa-shield-alt text-success me-2"></i>
                        <strong>100% Genuine Medicines</strong>
                    </div>
                    <div class="feature-item mb-3">
                        <i class="fas fa-truck text-primary me-2"></i>
                        <strong>Free Home Delivery</strong>
                    </div>
                    <div class="feature-item mb-3">
                        <i class="fas fa-clock text-warning me-2"></i>
                        <strong>24/7 Customer Support</strong>
                    </div>
                    <div class="feature-item mb-3">
                        <i class="fas fa-user-md text-info me-2"></i>
                        <strong>Expert Pharmacist Review</strong>
                    </div>
                </div>
                
                <!-- Contact -->
                <div class="bg-white rounded-4 shadow-lg p-4">
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">
                        <i class="fas fa-headset me-2"></i>Need Help?
                    </h5>
                    <p class="mb-3">Our customer care team is available 24/7 to assist you</p>
                    <div class="d-grid gap-2">
                        <a href="tel:1800-102-3456" class="btn btn-outline-primary">
                            <i class="fas fa-phone me-2"></i>Call: 1800-102-3456
                        </a>
                        <a href="#" class="btn btn-outline-success">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp Chat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-body text-center p-5">
                    <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="success-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="success-checkmark__check" fill="none" d="m14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                    <h3 class="fw-bold mt-4 mb-3" style="color: var(--primary-color);">Prescription Uploaded Successfully!</h3>
                    <p class="text-muted mb-4">We've received your prescription and our pharmacists are reviewing it. You'll receive a call within 30 minutes.</p>
                    <div class="bg-light rounded-3 p-3 mb-4">
                        <small class="text-muted">Order ID: <strong>#MP2024001234</strong></small>
                    </div>
                    <button type="button" class="btn btn-modern" data-bs-dismiss="modal">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
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
        

        // File upload functionality
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');
        const filePreviews = document.getElementById('filePreviews');
        let uploadedFiles = [];

        // Drag and drop functionality
        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.classList.remove('dragover');
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            const files = Array.from(e.dataTransfer.files);
            handleFiles(files);
        });

        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });

        function handleFiles(files) {
            files.forEach(file => {
                if (file.size > 10 * 1024 * 1024) {
                    alert(`File ${file.name} is too large. Maximum size is 10MB.`);
                    return;
                }

                if (!file.type.match(/image.*/) && file.type !== 'application/pdf') {
                    alert(`File ${file.name} is not supported. Please upload images or PDF files.`);
                    return;
                }

                uploadedFiles.push(file);
                createFilePreview(file);
            });
        }

        function createFilePreview(file) {
            const previewCol = document.createElement('div');
            previewCol.className = 'col-md-4 col-6';

            const previewCard = document.createElement('div');
            previewCard.className = 'file-preview p-3 position-relative';

            const fileIcon = file.type.match(/image.*/) ? 'fa-image' : 'fa-file-pdf';
            const fileName = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;

            previewCard.innerHTML = `
                <div class="text-center">
                    <i class="fas ${fileIcon} fa-3x mb-2" style="color: var(--primary-color);"></i>
                    <h6 class="fw-semibold">${fileName}</h6>
                    <small class="text-muted">${(file.size / 1024).toFixed(1)} KB</small>
                    <button class="btn btn-sm btn-outline-danger mt-2 w-100" onclick="removeFile(this, '${file.name}')">
                        <i class="fas fa-trash me-1"></i>Remove
                    </button>
                </div>
                <div class="upload-progress"></div>
            `;

            previewCol.appendChild(previewCard);
            filePreviews.appendChild(previewCol);

            // Simulate upload progress
            setTimeout(() => {
                previewCard.querySelector('.upload-progress').classList.add('complete');
            }, 1000);
        }

        function removeFile(button, fileName) {
            uploadedFiles = uploadedFiles.filter(file => file.name !== fileName);
            button.closest('.col-md-4').remove();
        }

        // Form submission
        document.getElementById('submitPrescription').addEventListener('click', () => {
            const form = {
                patientName: document.getElementById('patientName').value,
                phoneNumber: document.getElementById('phoneNumber').value,
                gender: document.getElementById('gender').value,
                age: document.getElementById('age').value,
                deliveryAddress: document.getElementById('deliveryAddress').value,
                additionalNotes: document.getElementById('additionalNotes').value
            };

            // Basic validation
            if (!form.patientName || !form.phoneNumber || !form.gender || !form.age || !form.deliveryAddress) {
                alert('Please fill in all required fields.');
                return;
            }

            if (uploadedFiles.length === 0) {
                alert('Please upload at least one prescription image.');
                return;
            }

            // Show success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // Reset form (optional)
            setTimeout(() => {
                // Reset form fields and uploaded files if needed
            }, 2000);
        });

        // Click to upload
        uploadZone.addEventListener('click', () => {
            fileInput.click();
        });
    </script>
</body>
</html>