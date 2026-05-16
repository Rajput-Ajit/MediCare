<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification | MediCare+</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #10847e;
            --secondary-color: #ff6b35;
            --light-green: #e8f5f4;
            --dark-green: #0a6b66;
            --orange: #ff6b35;
            --light-orange: #ffd9b3;
            --light-white: #f7f7f7;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-green) 0%, var(--light-orange) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 10px;
        }
        
        .otp-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            max-width: 450px;
            width: 100%;
            padding: 25px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .otp-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF9933, #FFFFFF, #138808);
        }
        
        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .brand-logo i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .brand-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }
        
        .icon-shield {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--light-green), var(--light-orange));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .icon-shield i {
            font-size: 1.8rem;
            color: var(--primary-color);
        }
        
        .otp-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .otp-header h2 {
            color: var(--dark-green);
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.5rem;
        }
        
        .otp-header p {
            color: #666;
            margin-bottom: 3px;
            font-size: 0.9rem;
        }
        
        .email-address {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1rem;
        }
        
        .otp-input-single {
            width: 100%;
            padding: 12px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 600;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: var(--light-white);
            letter-spacing: 6px;
        }
        
        .otp-input-single:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(16, 132, 126, 0.1);
        }
        
        .otp-input-single::placeholder {
            letter-spacing: 6px;
            color: #999;
            font-size: 1.1rem;
        }
        
        .btn-verify {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            border: none;
            border-radius: 10px;
            color: white;
            transition: all 0.3s ease;
            margin-top: 15px;
        }
        
        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 132, 126, 0.3);
            background: linear-gradient(135deg, var(--dark-green), var(--primary-color));
        }
        
        .btn-verify:active {
            transform: translateY(0);
        }
        
        .resend-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .resend-text {
            color: #666;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .btn-resend {
            background: transparent;
            border: 2px solid var(--orange);
            color: var(--orange);
            padding: 8px 24px;
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .btn-resend:hover {
            background: var(--orange);
            color: white;
        }
        
        .change-email {
            text-align: center;
            margin-top: 15px;
        }
        
        .change-email a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .change-email a:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }
        
        .otp-info {
            background: var(--light-green);
            border-left: 3px solid var(--primary-color);
            padding: 12px;
            border-radius: 6px;
            margin-top: 20px;
        }
        
        .otp-info i {
            color: var(--primary-color);
            margin-right: 8px;
        }
        
        .otp-info p {
            margin: 0;
            color: #555;
            font-size: 0.8rem;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 16px;
            border: none;
            overflow: hidden;
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--light-green) 0%, var(--light-orange) 100%);
            border-bottom: 1px solid #e0e0e0;
            padding: 20px 25px;
        }
        
        .modal-title {
            color: var(--dark-green);
            font-weight: 700;
            font-size: 1.3rem;
        }
        
        .modal-body {
            padding: 25px;
        }
        
        .modal-body p {
            color: #666;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        
        .modal-body .form-label {
            color: var(--dark-green);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .modal-body .form-control {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .modal-body .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 132, 126, 0.1);
        }
        
        .modal-info-alert {
            background: var(--light-green);
            border-left: 3px solid var(--primary-color);
            border-radius: 8px;
            padding: 12px;
            font-size: 0.85rem;
            margin-top: 15px;
        }
        
        .modal-info-alert i {
            color: var(--primary-color);
            margin-right: 8px;
        }
        
        .modal-info-alert span {
            color: #555;
        }
        
        .modal-footer {
            border-top: 1px solid #e0e0e0;
            padding: 15px 25px;
        }
        
        .btn-modal-cancel {
            border: 2px solid #ddd;
            color: #666;
            background: white;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-modal-cancel:hover {
            background: #f8f9fa;
            border-color: #ccc;
            color: #333;
        }
        
        .btn-modal-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-modal-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 132, 126, 0.3);
        }
        
        @media (max-width: 576px) {
            .otp-container {
                padding: 20px 20px;
                border-radius: 12px;
            }
            
            .brand-logo i {
                font-size: 2rem;
            }
            
            .brand-title {
                font-size: 1.2rem;
            }
            
            .icon-shield {
                width: 50px;
                height: 50px;
                margin-bottom: 12px;
            }
            
            .icon-shield i {
                font-size: 1.5rem;
            }
            
            .otp-header h2 {
                font-size: 1.3rem;
            }
            
            .otp-header p {
                font-size: 0.85rem;
            }
            
            .email-address {
                font-size: 0.95rem;
            }
            
            .otp-input-single {
                font-size: 1.1rem;
                letter-spacing: 4px;
                padding: 10px;
            }
            
            .otp-input-single::placeholder {
                font-size: 0.95rem;
                letter-spacing: 4px;
            }
            
            .btn-verify {
                padding: 11px;
                font-size: 0.95rem;
            }
            
            .otp-info p {
                font-size: 0.75rem;
            }
            
            .modal-title {
                font-size: 1.1rem;
            }
            
            .modal-header,
            .modal-body,
            .modal-footer {
                padding: 18px 20px;
            }
        }
        
        @media (max-width: 400px) {
            body {
                padding: 5px;
            }
            
            .otp-container {
                padding: 18px 16px;
            }
            
            .brand-logo {
                margin-bottom: 15px;
            }
            
            .otp-header {
                margin-bottom: 15px;
            }
            
            .resend-section {
                margin-top: 15px;
                padding-top: 15px;
            }
            
            .otp-info {
                margin-top: 15px;
                padding: 10px;
            }
        }
        
        @media (min-height: 700px) {
            .otp-container {
                padding: 30px 35px;
            }
        }
    </style>
</head>
<body>
    @if(session('error'))
        <div style="
            position: fixed;
            top: 10px;
            right: 10px;
            width: 100%;
            max-width:500px;
            background-color: #f44336; /* red */
            color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            z-index: 9999;
            border-radius:10px;
        ">
            {{ session('error') }}
        </div>
    @endif

    <div class="otp-container">
        
        <!-- Brand Logo -->
        <div class="brand-logo">
            <i class="fas fa-pills"></i>
            <h1 class="brand-title">MediCare+</h1>
        </div>
        
        <!-- Security Icon -->
        <div class="icon-shield">
            <i class="fas fa-shield-alt"></i>
        </div>
        
        <!-- OTP Header -->
        <div class="otp-header">
            <h2>Verify Your Email</h2>
            <p>Enter the 6-digit code sent to</p>
            <p class="email-address">{{ $email }}</p>
        </div>
        
        <!-- OTP Input Form -->
        <form method="POST" action="/verifyOtp">
            @csrf
            <div class="mb-3">
                <input 
                    type="text" 
                    class="form-control otp-input-single" 
                    maxlength="6" 
                    pattern="[0-9]{6}" 
                    inputmode="numeric"
                    placeholder="000000"
                    name="otp"
                    required>
            </div>
            
            <!-- Verify Button -->
            <button type="submit" class="btn btn-verify">
                <i class="fas fa-check-circle me-2"></i>Verify & Continue
            </button>
        </form>
        
        <!-- Resend OTP Section -->
        <!--
        <div class="resend-section">
            <p class="resend-text">Didn't receive the code?</p>
            <button type="button" class="btn btn-resend" id="resendButton" disabled>
                <i class="fas fa-redo-alt me-2"></i>Resend OTP
                <span class="fw-bold" id="countDown">
                    100
                </span>
            </button>
            
        </div>
        -->
        <!-- Change Email -->
        <!--
        <div class="change-email">
            <a href="#" data-bs-toggle="modal" data-bs-target="#changeEmailModal">
                <i class="fas fa-edit me-1"></i>Change Email Address
            </a>
        </div>
        -->
        <!-- Info Alert -->
        <!--
        <div class="otp-info">
            <i class="fas fa-info-circle"></i>
            <p><strong>Note:</strong> OTP is valid for 10 minutes. Please do not share this code with anyone for security reasons.</p>
        </div>
        -->
    </div>

    <!-- Change Email Modal -->
    <div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeEmailModalLabel">
                        <i class="fas fa-envelope me-2"></i>Change Email Address
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Enter your new email address below. We'll send a verification code to the new address.</p>
                    <form id="changeEmailForm">
                        @csrf
                        <input type="hidden" name="oldEmail" value="{{$email}}">
                        <div class="mb-3">
                            <label for="newEmail" class="form-label">New Email Address</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="newEmail" 
                                placeholder="your.email@example.com"
                                required>
                        </div>
                        <div class="modal-info-alert">
                            <i class="fas fa-info-circle"></i>
                            <span>Make sure you have access to this email address.</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-modal-cancel" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" form="changeEmailForm" class="btn btn-modal-submit">
                        <i class="fas fa-paper-plane me-2"></i>Send Code
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    let time = 100;
   
    let countSpan = document.getElementById("countDown");
    let resendButton = document.getElementById("resendButton");

    let countDown = setInterval(() => {
        countSpan.innerHTML = --time;

        if(time < 1){
            clearInterval(countDown);
            countSpan.innerHTML = "";
            resendButton.removeAttribute("disabled");
        }

    }, 1000);

    resendButton.addEventListener("click", function(){
        alert("Button Clicked");
    });
    </script>
</body>
</html>