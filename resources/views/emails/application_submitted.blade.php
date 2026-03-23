<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background: #ff014f; color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
        .content { padding: 20px; }
        .field { margin-bottom: 10px; }
        .label { font-weight: bold; color: #666; width: 120px; display: inline-block; }
        .value { color: #000; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Membership Application</h2>
        </div>
        <div class="content">
            <p>A new membership application has been submitted by <strong>{{ $user->name }}</strong>.</p>
            
            <div class="field"><span class="label">App ID:</span><span class="value">{{ $application->application_no }}</span></div>
            <div class="field"><span class="label">User ID:</span><span class="value">{{ $user->membership_id }}</span></div>
            <div class="field"><span class="label">Name:</span><span class="value">{{ $user->name }}</span></div>
            <div class="field"><span class="label">Email:</span><span class="value">{{ $user->email }}</span></div>
            <div class="field"><span class="label">Contact:</span><span class="value">{{ $user->contact_no }}</span></div>
            <div class="field"><span class="label">Legal Status:</span><span class="value">{{ $user->legal_status }}</span></div>
            
            <p>Supporting documents are attached to this email.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Turivanta Alliance. All rights reserved.
        </div>
    </div>
</body>
</html>
