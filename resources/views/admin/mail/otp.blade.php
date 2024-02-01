<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body>
<h1>Welcome to Hafeez</h1>
<p>Dear {{ $userName }},</p>

<p>Thank you for registering on the Hafeez website. We're excited to have you as a member of our community.</p>

<p>Your registration is complete, and your account is ready to use. Here is your registration information:</p>
<p>Your OTP code is: {{ $otpCode }}</p>

<p>If you have any questions or need assistance, please don't hesitate to contact us at support@hafeez.com.</p>

<p>Thank you again for joining Hafeez. We look forward to seeing you on our platform.</p>

<p>Best regards,<br>Hafeez Team</p>
</body>
</html>
