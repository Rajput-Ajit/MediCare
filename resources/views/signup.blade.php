<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | MediCare+ Online Pharmacy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #00b894;
            --secondary-color: #0984e3;
            --light-bg: #f8f9fa;
            --border-color: #e9ecef;
            --text-muted: #6c757d;
            --success-color: #28a745;
            --danger-color: #dc3545;
        }

        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .signup-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            max-width: 600px;
            width: 100%;
            margin: 20px;
        }

        .brand-header {
            text-align: center;
            padding: 30px 40px 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: #fafbfc;
            border-radius: 12px 12px 0 0;
        }

        .brand-logo {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .brand-subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin: 0;
        }

        .signup-form {
            padding: 30px 40px 40px;
        }

        .form-floating {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control, .form-select {
            border: 1.5px solid var(--border-color);
            border-radius: 8px;
            background: white;
            transition: border-color 0.2s ease;
            height: 56px;
            font-size: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.1rem rgba(0, 184, 148, 0.15);
        }

        .form-floating > label {
            color: var(--text-muted);
            font-size: 14px;
        }

        .form-control:focus ~ label,
        .form-control:not(:placeholder-shown) ~ label,
        .form-select:focus ~ label,
        .form-select:not([value=""]) ~ label {
            color: var(--primary-color);
        }

        .btn-signup {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            padding: 14px;
            width: 100%;
            transition: background-color 0.2s ease;
        }

        .btn-signup:hover {
            background: #00a085;
            color: white;
        }

        .btn-signup:active {
            background: #009175;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid var(--border-color);
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            color: #00a085;
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .section-title {
            color: #333;
            font-weight: 600;
            margin: 25px 0 20px 0;
            font-size: 1.1rem;
            padding-bottom: 8px;
            border-bottom: 2px solid #f1f3f4;
        }

        .section-title:first-of-type {
            margin-top: 0;
        }

        .form-section {
            background: #fafbfc;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid #f1f3f4;
        }

        .alert {
            border-radius: 6px;
            font-size: 14px;
        }

        .alert-info {
            background-color: #f8f9ff;
            border-color: #e3e7fd;
            color: #4c63d2;
        }

        .text-danger {
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .signup-card {
                margin: 10px;
                border-radius: 8px;
            }
            
            .signup-form, .brand-header {
                padding: 20px;
            }
            
            .brand-logo {
                font-size: 1.8rem;
            }

            .form-section {
                padding: 20px;
            }
        }

        /* Remove any remaining animations */
        *, *::before, *::after {
            animation-duration: 0s !important;
            animation-delay: 0s !important;
            transition-duration: 0.2s !important;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <!-- Top-right alert container -->
        <div style="position: fixed; top: 20px; right: 20px; z-index: 9999; display: flex; flex-direction: column; gap: 10px;">
            <!-- Validation Errors -->
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" data-bs-autohide="true" data-bs-delay="5000">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

        </div>


        <div class="signup-card">
            <div class="brand-header">
                <div class="brand-logo">
                    <i class="fas fa-pills me-2"></i>MediCare+
                </div>
                <p class="brand-subtitle">Create your account and join millions of satisfied customers</p>
            </div>

            <div class="signup-form">
                <form action="/SignupPost" method="POST">
                    @csrf
                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <h5 class="section-title">Personal Information</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="{{old('firstName')}}" required>
                                    <label for="firstName"><i class="fas fa-user me-2"></i>First Name</label>
                                    @error('firstName')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{old('lastName')}}" required>
                                    <label for="lastName"><i class="fas fa-user me-2"></i>Last Name</label>
                                    @error('lastName')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}" required>
                            <label for="email"><i class="fas fa-envelope me-2"></i>Email Address</label>
                            @error('email')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{old('phone')}}" required>
                            <label for="phone"><i class="fas fa-phone me-2"></i>Phone Number</label>
                            @error('phone')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="dateOfBirth" name="dateOfBirth" required>
                                        <option value="">Select your age range</option>
                                        <option value="18-25" {{ old('dateOfBirth') == '18-25' ? 'selected' : '' }}>18-25 years</option>
                                        <option value="26-35" {{ old('dateOfBirth') == '26-35' ? 'selected' : '' }}>26-35 years</option>
                                        <option value="36-45" {{ old('dateOfBirth') == '36-45' ? 'selected' : '' }}>36-45 years</option>
                                        <option value="46-55" {{ old('dateOfBirth') == '46-55' ? 'selected' : '' }}>46-55 years</option>
                                        <option value="55+" {{ old('dateOfBirth') == '55+' ? 'selected' : '' }}>55+ years</option>
                                    </select>
                                    <label for="dateOfBirth"><i class="fas fa-calendar me-2"></i>Age Range</label>
                                    @error('dateOfBirth')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                        <option value="prefer-not-to-say" {{ old('gender') == 'prefer-not-to-say' ? 'selected' : '' }}>Prefer not to say</option>
                                    </select>
                                    <label for="gender"><i class="fas fa-user-friends me-2"></i>Gender</label>
                                    @error('gender')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Security Section -->
                    <div class="form-section">
                        <h5 class="section-title">Account Security</h5>
                        
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                            @error('password')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror    
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                            <label for="confirmPassword"><i class="fas fa-lock me-2"></i>Confirm Password</label>
                             @error('password_confirmation')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            <small><strong>Password Requirements:</strong> Minimum 8 characters with uppercase, lowercase, and number</small>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-section">
                        <h5 class="section-title">Terms & Verification</h5>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Verification:</strong> We'll send a verification code to your email address after registration.
                        </div>

                        <div class="mb-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                <label class="form-check-label" for="agreeTerms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-signup">
                        <i class="fas fa-user-plus me-2"></i>Create My Account
                    </button>
                </form>
                
                <div class="login-link">
                    <p class="mb-0">Already have an account? <a href="/login">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>