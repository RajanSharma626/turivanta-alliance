<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #1a1a1a; background-color: #f4f7f6; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border: 1px solid #e1e8ed; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
        .header { background: #ff014f; color: white; padding: 40px 20px; text-align: center; }
        .header h2 { margin: 0; font-size: 24px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 40px; }
        .intro { margin-bottom: 30px; font-size: 16px; color: #475569; }
        .details-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 25px; margin-bottom: 30px; }
        .field { margin-bottom: 12px; display: flex; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; }
        .field:last-child { border-bottom: none; }
        .label { font-weight: 700; color: #64748b; width: 140px; font-size: 13px; text-transform: uppercase; }
        .value { color: #0f172a; font-weight: 600; font-size: 15px; }
        .footer { font-size: 12px; color: #94a3b8; text-align: center; margin-top: 20px; padding: 30px; border-top: 1px solid #f1f5f9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Membership Application</h2>
        </div>
        <div class="content">
            <p class="intro">A new membership application has been submitted by <strong>{{ $user->name }}</strong>.</p>
            
            <div class="details-box">
                <div class="field"><span class="label">App ID</span><span class="value">{{ $application->application_no }}</span></div>
                <div class="field"><span class="label">User ID</span><span class="value">{{ $user->membership_id }}</span></div>
                <div class="field"><span class="label">Name</span><span class="value">{{ $user->name }}</span></div>
                <div class="field"><span class="label">Email</span><span class="value">{{ $user->email }}</span></div>
                <div class="field"><span class="label">Contact</span><span class="value">{{ $user->contact_no }}</span></div>
                <div class="field"><span class="label">Legal Status</span><span class="value">{{ $user->legal_status }}</span></div>
            </div>
            
            <p class="intro" style="font-size: 14px; text-align: center;">Supporting documents are attached to this email for your review.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Turivanta Alliance. All rights reserved.
        </div>
    </div>
</body>
</html>
