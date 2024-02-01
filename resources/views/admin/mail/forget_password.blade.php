<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Forget Password Request</h2>
    <p>Dear {{ $name }},</p>
    <p>We have received your request to reset your password for the Hafeez website.</p>
    <p>Your One-Time Password (OTP) is: <strong>{{ $otpCode }}</strong></p>
    <p>Please use this OTP to proceed with resetting your password. Remember, the OTP is valid only for a short period of time.</p>
    <p>If you did not request a password reset, please ignore this email or contact support.</p>
</div>
</body>
</html>
