<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information - MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* ============ SEARCH BAR IN NAV ============ */
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

/* Navbar scroll effect */
body.scrolled .modern-navbar {
    background: rgba(255,255,255,0.95);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Navbar link underline animation */
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

/* Shimmer animation */
@keyframes shimmer {
    0% { background-position: -200px; }
    100% { background-position: 200px; }
}


        .form-label {
            font-weight: 600;
            color: var(--pharmeasy-dark);
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            padding: 0.75rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--pharmeasy-primary);
            box-shadow: 0 0 0 0.2rem rgba(16, 132, 126, 0.15);
        }

        .profile-avatar-large {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid var(--pharmeasy-primary);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--pharmeasy-primary);
            position: relative;
        }

        .avatar-upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--pharmeasy-secondary);
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
        }

        .info-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 15px rgba(16, 132, 126, 0.08);
        }

        .section-title {
            color: var(--pharmeasy-primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--pharmeasy-light);
        }

        .footer {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .profile-avatar-large {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
        }

        
        .profile-avatar-large {
    width: 120px;
    height: 120px;
    background: #eee;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    overflow: hidden;
}

.profile-avatar-large i {
    font-size: 50px;
    color: #888;
}

.avatar-upload-btn {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background: #00000080;
    color: #fff;
    padding: 6px;
    border-radius: 50%;
    font-size: 14px;
}

#avatarPreview {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
                    <li class="breadcrumb-item active text-muted fw-semibold">Personal Information</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Personal Information Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card p-4 mb-4">
                    <h4 class="fw-bold mb-4" style="color: var(--pharmeasy-primary);">
                        <i class="fas fa-user me-2"></i>Personal Information
                    </h4>

                    <!-- Profile Picture Section -->
                    <div class="info-section text-center">
                        <div class="profile-avatar-large mx-auto mb-3" id="avatarBox">
                            <img id="avatarPreview" src="" alt="" style="display:none;" />
                            @if($user['profile_image'])
                                <img class="profile" id="myProfile" src="{{ asset('storage/' . $user['profile_image']) }}" alt="" />
                                <div id="avatarIcon">
                                </div>
                            @else
                                <i class="fas fa-user" id="avatarIcon"></i>
                                <div id="myProfile">
                                </div>
                            @endif
                            <div class="avatar-upload-btn">
                               <i class="fas fa-camera"></i>
                            </div>
                        </div>
                        
                        <form method="POST" action="{{route('updateProfilePic')}}" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-primary px-4 py-2 mb-2" id="uploadButton"
                                    style="border-radius: 30px; background:#4b7bec; border:none; box-shadow:0 4px 10px rgba(0,0,0,0.1);display:none;">
                                Update
                            </button>
                            <input type="file" id="avatarInput" accept="image/*" style="display:none;" name="profile">
                        </form>
                        <button class="btn btn-danger px-4 py-2 mb-2" id="cancelButton"
                                    style="border-radius: 30px;  border:none; box-shadow:0 4px 10px rgba(0,0,0,0.1);display:none;">
                                Cancel
                        </button>  
                        <!--
                        <div class="profile-avatar-large mx-auto mb-3">
                            <i class="fas fa-user"></i>
                            <div class="avatar-upload-btn">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>
                         -->
                        <h5 class="fw-bold mb-1" id="userName">
                            {{ $user['firstName'] . " " . $user['lastName']}}
                        </h5>
                        <p class="text-muted">
                            Member since {{ \Carbon\Carbon::parse($user['date'])->format('F Y') }}
                        </p>
                    </div>

                    <form id="profileInfo">
                        <!-- Basic Information -->
                        <div class="info-section">
                            <h5 class="section-title">
                                <i class="fas fa-info-circle me-2"></i>Basic Information
                            </h5>
                            
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter first name" value="{{$user['firstName']}}" name="firstName">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" value="{{$user['lastName']}}" placeholder="Enter last name" name="lastName">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" value="{{$user['date_of_birth']}}" name="date_of_birth">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option @if($user['gender' == 'male']) selected @endif value="male">Male</option>
                                            <option @if($user['gender' == 'female']) selected @endif value="female">Female</option>
                                            <option @if($user['gender' == 'other']) selected @endif value="other">Other</option>
                                            <option @if($user['gender' == '']) selected @endif value="">Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Blood Group</label>
                                        <select class="form-select" name="blood_group">
                                            <option value="">Select Blood Group</option>
                                            <option {{ $user['blood_group'] == 'O+' ? 'selected' : '' }} value="O+">O+</option>
                                            <option {{ $user['blood_group'] == 'O-' ? 'selected' : '' }} value="O-">O-</option>
                                            <option {{ $user['blood_group'] == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                            <option {{ $user['blood_group'] == 'A-' ? 'selected' : '' }} value="A-">A-</option>
                                            <option {{ $user['blood_group'] == 'B+' ? 'selected' : '' }} value="B+">B+</option>
                                            <option {{ $user['blood_group'] == 'B-' ? 'selected' : '' }} value="B-">B-</option>
                                            <option {{ $user['blood_group'] == 'AB+' ? 'selected' : '' }} value="AB+">AB+</option>
                                            <option {{ $user['blood_group'] == 'AB-' ? 'selected' : '' }} value="AB-">AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Marital Status</label>
                                        <select class="form-select" name="marital_status">
                                            <option value="">Select Status</option>
                                            <option {{ $user['marital_status'] == 'single' ? 'selected' : '' }} value="single">Single</option>
                                            <option {{ $user['marital_status'] == 'married' ? 'selected' : '' }} value="married">Married</option>
                                            <option {{ $user['marital_status'] == 'divorced' ? 'selected' : '' }} value="divorced">Divorced</option>
                                            <option {{ $user['marital_status'] == 'widowed' ? 'selected' : '' }} value="widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            
                        </div>

                        <!-- Contact Information -->
                        <div class="info-section">
                            <h5 class="section-title">
                                <i class="fas fa-address-book me-2"></i>Contact Information
                            </h5>
                            
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="{{ $user['email'] }}" placeholder="Enter email" readonly disabled>
                                        <small class="text-success"><i class="fas fa-check-circle me-1"></i>Verified</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" value="{{ $user['phone'] }}" placeholder="Enter phone number" name="phone">
                                        <!--
                                        <small class="text-success"><i class="fas fa-check-circle me-1"></i>Verified</small>
                                        -->
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Alternate Phone</label>
                                        <input type="tel" class="form-control" placeholder="Enter alternate phone" value="{{ $user['alternate_phone'] }}" name="alternate_phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Emergency Contact</label>
                                        <input type="tel" class="form-control" value="{{ $user['emergency_contact'] }}" placeholder="Enter emergency contact" name="emergency_contact">
                                    </div>
                                </div>
                            
                        </div>

                        <!-- Medical Information -->
                        <div class="info-section">
                            <h5 class="section-title">
                                <i class="fas fa-heartbeat me-2"></i>Medical Information
                            </h5>
                            
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Known Allergies</label>
                                        <textarea class="form-control" rows="3" placeholder="List any known allergies (e.g., medications, food, etc.)" name="allergies">{{ $user['allergies'] }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Current Medications</label>
                                        <textarea class="form-control" rows="3" placeholder="List current medications you are taking" name="medications">{{ $user['medications'] }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Medical Conditions</label>
                                        <textarea class="form-control" rows="3" placeholder="List any chronic medical conditions" name="medical_conditions">{{ $user['medical_condition'] }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Height (cm)</label>
                                        <input type="number" class="form-control" value="{{ $user['height_cm'] }}" placeholder="Enter height" name="height_cm">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" value="{{ $user['weight_kg'] }}" placeholder="Enter weight" name="weight_kg">
                                    </div>
                                </div>
                            
                        </div>

                        <!-- Account Security -->
                        <!--
                        <div class="info-section">
                            <h5 class="section-title">
                                <i class="fas fa-lock me-2"></i>Account Security
                            </h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded-3">
                                        <div>
                                            <h6 class="fw-bold mb-1">Password</h6>
                                            <small class="text-muted">Last changed 3 months ago</small>
                                        </div>
                                        <button class="btn btn-outline-primary">Change Password</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center p-3 border rounded-3">
                                        <div>
                                            <h6 class="fw-bold mb-1">Two-Factor Authentication</h6>
                                            <small class="text-muted">Add an extra layer of security</small>
                                        </div>
                                        <button class="btn btn-outline-primary">Enable</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-end">
                            <button type="submit" class="btn btn-primary text-white">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="errorBox" class="alert" style="
        position: fixed;
        left: 20px;
        bottom:20px;
        display: none;
        z-index: 9999;
    "></div>

    @if (session('success'))
        <div id="" class="alert flashBox" style="
            position: fixed;
            left: 20px;
            bottom:20px;
            display: ;
            z-index: 9999;
            ">
            
            <div style="
                        background:green;
                        color:#000;
                        padding:6px 10px;
                        border-radius:4px;
                        margin-bottom:6px;
                        border-left:8px solid #35dc5fff;
                        color:white;
                        font-weight:bold;
                    ">
                {{ session('success') }}
            </div>   
        </div>    
    @endif

    @if (session('error'))
        <div id="" class="alert flashBox" style="
            position: fixed;
            left: 20px;
            bottom:20px;
            display: ;
            z-index: 9999;
        ">
            <div style="
                        background:red;
                        color:#000;
                        padding:6px 10px;
                        border-radius:4px;
                        margin-bottom:6px;
                        border-left:8px solid #dc3545;
                        color:white;
                        font-weight:bold;
                    ">
                {{ session('error') }}    
            </div>
        </div>    
    @endif

    @if ($errors->any())
        <div class="alert flashBox" style="
            position: fixed;
            left: 20px;
            bottom:20px;
            display: ;
            z-index: 9999;
            ">
                @foreach ($errors->all() as $error)
                    <div style="
                        background:#fff;
                        color:#000;
                        padding:6px 10px;
                        border-radius:4px;
                        margin-bottom:6px;
                        border-left:8px solid #dc3545;
                    ">
                        {{ $error }}
                    </div>
                @endforeach
        </div>
    @endif
    
    <!-- Footer -->
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        let flashBox = $(".flashBox");
        setTimeout(() => {
                        flashBox.fadeOut();
                    }, 5000);
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

        /*
        const form = document.getElementById("profileInfo");
        form.addEventListener("submit", function(e){
            e.preventDefault();

            let formData = new FormData(form);
        });
        */

        $('#profileInfo').on('submit', function(e){
            e.preventDefault();

            let data = $(this).serialize(); // sends clean key=value pairs

            $.ajax({
                url: "{{route("updateProfileInpfo")}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(res){
                    let message = (res.message);
                    let messageBox = $("#errorBox");
                    messageBox.html("");   // clear old messages
                    $("#userName").html(res.userName);
                    messageBox.append(`
                            <div style="
                                background:#fff;
                                color:#000;
                                padding:6px 10px;
                                border-radius:4px;
                                margin-bottom:6px;
                                border-left:8px solid #35dc56ff;
                            ">
                               <i class="fa-solid fa-check-double"></i> ${message}
                            </div>
                        `);

                        messageBox.show();  // show box
                       
                        // Hide after 3 seconds
                        setTimeout(() => {
                            messageBox.fadeOut();
                        }, 5000);
                },
                error: function(errors){
                    console.log(errors.responseJSON);
                    let errorBox = $("#errorBox");
                    errorBox.html("");   // clear old messages

                    // real validation errors
                    let validationErrors = errors.responseJSON.errors;

                    $.each(validationErrors, function(key, messages){
                        errorBox.append(`
                            <div style="
                                background:#fff;
                                color:#000;
                                padding:6px 10px;
                                border-radius:4px;
                                margin-bottom:6px;
                                border-left:8px solid #dc3545;
                            ">
                                <i class="fa-solid fa-x"></i> ${messages[0]}
                            </div>
                        `);
                    });

                    errorBox.show();  // show box

                    // Hide after 3 seconds
                    setTimeout(() => {
                        errorBox.fadeOut();
                    }, 5000);
                }
            });
        });


        // profile
        // Click avatar opens file picker
        $("#avatarBox, .avatar-upload-btn").on("click", function () {
            $("#avatarInput").click();
        });

        // Show preview when file selected
        $("#avatarInput").on("change", function (e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $("#avatarPreview").attr("src", event.target.result).show();
                    $("#avatarIcon").hide(); // hide default icon
                    
                    // hide existing image
                    $("#myProfile").hide();
                    // show  buttom
                    $("#uploadButton").show(); 
                    $("#cancelButton").show();
                };
                reader.readAsDataURL(file);
            }
        });

        $("#cancelButton").on("click", function () {
            $("#avatarPreview").attr("src", '').hide();
            $("#avatarIcon").show(); // hide default icon
                    
            // Unhide existing image
            $("#myProfile").show();
            // Hide buttons
            $("#uploadButton").hide(); 
            $("#cancelButton").hide();
        });

    });

    </script>
</body>
</html>