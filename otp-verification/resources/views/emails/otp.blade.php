<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
        .header { text-align: center; padding: 20px; background: #4f46e5; color: white; }
        .content { padding: 20px; background: white; border-radius: 8px; }
        .otp { font-size: 24px; font-weight: bold; color: #4f46e5; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your OTP Code</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>Your One-Time Password (OTP) is:</p>
            <p class="otp">{{ $otp }}</p>
            <p>This OTP is valid for 5 minutes. Please do not share it with anyone.</p>
            <p>If you did not request this, please ignore this email.</p>
            <p>Best regards,<br>Laravel OTP</p>
        </div>
    </div>
</body>
</html>