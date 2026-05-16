<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare+ - Verify Your Account</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            padding: 20px;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
        }
        .brand-header {
            text-align: center;
            padding: 40px 30px;
            background: linear-gradient(135deg, #00b894 0%, #0984e3 100%);
        }
        .brand-logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
        }
        .brand-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 16px;
            margin: 0;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 20px;
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .message-text {
            font-size: 15px;
            color: #6c757d;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .otp-container {
            background: linear-gradient(135deg, #00b894 0%, #0984e3 100%);
            border-radius: 12px;
            padding: 35px 20px;
            text-align: center;
            margin: 30px 0;
            box-shadow: 0 4px 12px rgba(0, 184, 148, 0.3);
        }
        .otp-label {
            color: rgba(255, 255, 255, 0.95);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .otp-code {
            font-size: 48px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 12px;
            font-family: 'Courier New', Consolas, monospace;
            margin: 15px 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .otp-expiry {
            color: rgba(255, 255, 255, 0.95);
            font-size: 14px;
            margin-top: 15px;
            font-weight: 500;
        }
        .otp-expiry strong {
            font-weight: 700;
        }
        .instructions {
            background-color: #f8f9fa;
            border-left: 4px solid #00b894;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .instructions h3 {
            color: #333;
            font-size: 16px;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .instructions ol {
            margin-left: 20px;
            color: #6c757d;
            font-size: 14px;
            line-height: 1.8;
        }
        .instructions li {
            margin: 8px 0;
        }
        .security-warning {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .security-warning-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .warning-icon {
            font-size: 24px;
            margin-right: 10px;
        }
        .security-warning h3 {
            color: #856404;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }
        .security-warning p {
            color: #856404;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }
        .help-box {
            background-color: #e7f3ff;
            border-left: 4px solid #0984e3;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .help-box h3 {
            color: #0984e3;
            font-size: 16px;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .help-box p {
            color: #6c757d;
            font-size: 14px;
            margin: 8px 0;
            line-height: 1.6;
        }
        .help-box a {
            color: #0984e3;
            text-decoration: none;
            font-weight: 600;
        }
        .help-box a:hover {
            text-decoration: underline;
        }
        .support-button {
            display: inline-block;
            background: linear-gradient(135deg, #00b894 0%, #0984e3 100%);
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            text-align: center;
            margin: 20px 0;
        }
        .divider {
            height: 1px;
            background: #e9ecef;
            margin: 30px 0;
        }
        .note {
            font-size: 13px;
            color: #6c757d;
            text-align: center;
            margin-top: 25px;
            line-height: 1.6;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            .brand-header {
                padding: 30px 20px;
            }
            .brand-logo {
                font-size: 2rem;
            }
            .content {
                padding: 30px 20px;
            }
            .otp-code {
                font-size: 36px;
                letter-spacing: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="brand-header">
            <div class="brand-logo">
                💊 MediCare+
            </div>
            <p class="brand-subtitle">Your Online Pharmacy Partner</p>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Greeting -->
            <div class="greeting">
                Hello {{ $name ?? 'Valued Customer' }},
            </div>

            <!-- OTP Box -->
            <div class="otp-container">
                <div class="otp-label">Your Verification Code</div>
                <div class="otp-code">{{ $otp ?? '******' }}</div>
                <div class="otp-expiry">
                    This code expires in <strong>{{ $expiry ?? '10' }} minutes</strong>
                </div>
            </div>

            <!-- Additional Note -->
            <div class="note">
                Thank you for choosing MediCare+. We're committed to keeping your account secure 
                and providing you with the best healthcare experience.
                <br><br>
                This is an automated message, please do not reply to this email.
            </div>
        </div>
    </div>
</body>
</html>