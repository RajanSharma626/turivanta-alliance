<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #050505; margin: 0; padding: 0; color: #ffffff; }
        .container { max-width: 600px; margin: 40px auto; background-color: #0a0a0f; border: 1px solid #1a1a1f; border-radius: 24px; padding: 40px; text-align: center; }
        .logo { margin-bottom: 30px; font-size: 24px; font-weight: 800; color: #ff014f; letter-spacing: 2px; text-transform: uppercase; }
        h1 { font-size: 28px; margin-bottom: 20px; font-weight: 800; }
        p { color: #a0a0a0; line-height: 1.6; margin-bottom: 30px; }
        .otp-box { background-color: #1a1a1f; border: 2px solid #ff014f; border-radius: 16px; padding: 25px; font-size: 42px; font-weight: 900; letter-spacing: 12px; color: #ffffff; display: inline-block; margin-bottom: 30px; text-shadow: 0 0 10px rgba(255, 1, 79, 0.3); }
        .footer { font-size: 12px; color: #505050; margin-top: 40px; border-top: 1px solid #1a1a1f; padding-top: 20px; }
        .notice { font-size: 13px; color: #707070; font-style: italic; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">Turivanta Alliance</div>
        <h1>Verify Your Email</h1>
        <p>Thank you for joining the alliance. To finalize your registration, please use the following one-time verification code:</p>
        
        <div class="otp-box">
            {{ $otp }}
        </div>
        
        <p class="notice">This code will expire in 10 minutes. If you did not request this code, please ignore this email.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} Turivanta Alliance. All rights reserved.
        </div>
    </div>
</body>
</html>
