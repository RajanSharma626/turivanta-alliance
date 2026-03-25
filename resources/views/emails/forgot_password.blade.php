<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f7f6; }
        .container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #e1e8ed; }
        .logo { font-size: 24px; font-weight: 800; color: #ff014f; text-align: center; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px; }
        h1 { font-size: 22px; color: #1a1a1a; text-align: center; margin-bottom: 25px; }
        p { margin-bottom: 20px; color: #555; }
        .otp-box { background-color: #fff1f5; border: 2px dashed #ff014f; color: #ff014f; font-size: 32px; font-weight: 800; text-align: center; padding: 20px; border-radius: 12px; margin: 30px 0; letter-spacing: 10px; }
        .footer { text-align: center; font-size: 12px; color: #888; margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; }
        .expiry { color: #888; font-size: 13px; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">Turivanta Alliance</div>
        <h1>Reset Your Password</h1>
        <p>Hello {{ $user->first_name }},</p>
        <p>We received a request to reset your password. Use the following code to continue:</p>
        
        <div class="otp-box">
            {{ $otp }}
        </div>
        
        <p class="expiry">This code will expire in 5 minutes.</p>
        
        <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} Turivanta Alliance. All rights reserved.
        </div>
    </div>
</body>
</html>
