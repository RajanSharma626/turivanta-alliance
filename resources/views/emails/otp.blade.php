<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 0; padding: 0; color: #1a1a1a; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border: 1px solid #e1e8ed; border-radius: 24px; padding: 40px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .logo { margin-bottom: 30px; font-size: 24px; font-weight: 800; color: #ff014f; letter-spacing: 2px; text-transform: uppercase; }
        h1 { font-size: 28px; margin-bottom: 20px; font-weight: 800; color: #0f172a; }
        p { color: #64748b; line-height: 1.6; margin-bottom: 30px; }
        .otp-box { background-color: #fff1f5; border: 2px solid #ff014f; border-radius: 16px; padding: 25px; font-size: 42px; font-weight: 900; letter-spacing: 12px; color: #ff014f; display: inline-block; margin-bottom: 30px; }
        .footer { font-size: 12px; color: #94a3b8; margin-top: 40px; border-top: 1px solid #f1f5f9; padding-top: 20px; }
        .notice { font-size: 13px; color: #94a3b8; font-style: italic; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">Turivanta Alliance</div>
        <h1>Verify Your Email</h1>
        <p>Thank you for signing up the alliance. To finalize your registration, please use the following one-time verification code:</p>
        
        <div class="otp-box">
            {{ $otp }}
        </div>
        
        <p class="notice">This code will expire in 5 minutes. If you did not request this code, please ignore this email.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} Turivanta Alliance. All rights reserved.
        </div>
    </div>
</body>
</html>
