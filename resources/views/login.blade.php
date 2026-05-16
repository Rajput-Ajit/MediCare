<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MediCare+ Online Pharmacy</title>
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

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--border-color);
            max-width: 450px;
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

        .login-form {
            padding: 30px 40px 40px;
        }

        .form-floating {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            border: 1.5px solid var(--border-color);
            border-radius: 8px;
            background: white;
            transition: border-color 0.2s ease;
            height: 56px;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.1rem rgba(0, 184, 148, 0.15);
        }

        .form-floating > label {
            color: var(--text-muted);
            font-size: 14px;
        }

        .form-control:focus ~ label,
        .form-control:not(:placeholder-shown) ~ label {
            color: var(--primary-color);
        }

        .btn-login {
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

        .btn-login:hover {
            background: #00a085;
            color: white;
        }

        .btn-login:active {
            background: #009175;
        }

        .btn-login:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .btn-social {
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1.5px solid;
            font-size: 14px;
        }

        .btn-google {
            background: white;
            border-color: #db4437;
            color: #db4437;
        }

        .btn-google:hover {
            background: #db4437;
            color: white;
        }

        .btn-facebook {
            background: white;
            border-color: #4267B2;
            color: #4267B2;
        }

        .btn-facebook:hover {
            background: #4267B2;
            color: white;
        }

        .divider {
            text-align: center;
            position: relative;
            margin: 25px 0;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .forgot-password:hover {
            color: #00a085;
            text-decoration: underline;
        }

        .signup-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid var(--border-color);
        }

        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            color: #00a085;
            text-decoration: underline;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-muted);
            z-index: 10;
            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            font-size: 14px;
            color: #666;
        }

        .loading-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .social-login {
            margin: 20px 0 25px;
        }

        /* Remove any remaining animations */
        *, *::before, *::after {
            animation-duration: 0s !important;
            animation-delay: 0s !important;
            transition-duration: 0.2s !important;
        }

        /* Keep only the loading spinner animation */
        .loading-spinner {
            animation-duration: 1s !important;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                margin: 10px;
                border-radius: 8px;
            }
            
            .login-form, .brand-header {
                padding: 20px;
            }
            
            .brand-logo {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    @if(session('error'))
        <div style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f44336; /* red */
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            z-index: 9999;
        ">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div style="
            position: fixed;
            top: 10px;
            right: 5px;
            width: 30%;
            background-color: #36f469ff; /* green */
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            z-index: 9999;
        ">
            {{ session('success') }}
        </div>
    @endif
        
    <div class="login-container">
        <div class="login-card">
            <div class="brand-header">
                <div class="brand-logo">
                    <i class="fas fa-pills me-2"></i>MediCare+
                </div>
                <p class="brand-subtitle">Welcome back! Sign in to your account</p>
            </div>

            <div class="login-form">
                <form id="loginForm" action="/LoginPost" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}" required>
                        <label for="email"><i class="fas fa-envelope me-2"></i>Email Address</label>
                        @error('email')
                            <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        <i class="fas fa-eye password-toggle" id="passwordToggle"></i>
                        @error('password')
                            <span class="text-danger" style="font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login">
                        <span class="btn-text"><i class="fas fa-sign-in-alt me-2"></i>Sign In</span>
                        <div class="loading-spinner"></div>
                    </button>
                </form>

                <div class="divider">
                    <span>or continue with</span>
                </div>

                <div class="social-login">
                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-social btn-google w-100" type="button">
                                <i class="fab fa-google me-2"></i>Google
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-social btn-facebook w-100" type="button">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </button>
                        </div>
                    </div>
                </div>

                <div class="signup-link">
                    <p class="mb-0">Don't have an account? <a href="/signup">Sign up here</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const password = document.getElementById('password');
            const toggle = this;
            
            if (password.type === 'password') {
                password.type = 'text';
                toggle.classList.remove('fa-eye');
                toggle.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggle.classList.remove('fa-eye-slash');
                toggle.classList.add('fa-eye');
            }
        });

        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = this.querySelector('.btn-login');
            const btnText = button.querySelector('.btn-text');
            const spinner = button.querySelector('.loading-spinner');
            
            // Show loading state
            btnText.style.display = 'none';
            spinner.style.display = 'inline-block';
            button.disabled = true;
            
            // Let the form submit naturally to Laravel
        });

        // Enhanced form validation
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#28a745';
                }
            });

            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--primary-color)';
            });
        });

        // Social login placeholders
        document.querySelectorAll('.btn-social').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Social login integration coming soon!');
            });
        });
    </script>
</body>
</html>