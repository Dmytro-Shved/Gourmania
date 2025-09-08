<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #5e6c84;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #AE763E;
        }
        .header img {
            max-width: 300px;
        }
        .content {
            margin-top: 5px;
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            color: #253858;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            color: #5e6c84;
            line-height: 1.5;
            margin-bottom: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 50px;
            background-color: #AE763E;
            text-decoration: none;
            border-radius: 4px;
            font-size: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #ffffff;
            background-color: #AE763E;
        }
        .footer a {
            color: #0052cc;
            text-decoration: none;
        }
        .info{
            text-align: center;
            font-size: 18px;
            color: #253858;
            margin-bottom: 1px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header -->
    <div class="header">
        <img src="https://images2.imgbox.com/14/a0/jLmx8RVy_o.png" alt="Gourmania Logo">
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Reset Your Password</h1>
        <p>You are receiving this email because we received a password reset request for your account.</p>
    </div>

    <div style="text-align: center;">
        <a href="{{ $resetUrl }}" class="button" style="color: #ffffff">Reset password</a>
    </div>

    <div class="content">
        <p>This password reset link will expire in <strong>60 minutes</strong>.</p>
        <p>If you did not request a password reset, no further action is required.</p>
    </div>

    <div class="info">
        <img src="https://images2.imgbox.com/ec/5c/VXtzi6aJ_o.png" alt="Mushroom" style="max-width: 200px; margin-top: 1px">
    </div>

    <div class="content">
        <p>Thanks, <br>Gourmania</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div>
            <a href="https://github.com/Dmytro-Shved" alt="Facebook">
                <img src="https://img.icons8.com/?size=100&id=hbVaJ5lgpaax&format=png&color=ffffff" width="35" height="35" alt="Facebook">
            </a>
            <a href="https://github.com/Dmytro-Shved" alt="Instagram">
                <img src="https://img.icons8.com/?size=100&id=Iatym1CIDVkh&format=png&color=ffffff" width="35" height="35" alt="Instagram">
            </a>
            <a href="https://github.com/Dmytro-Shved" alt="GitHub">
                <img src="https://img.icons8.com/?size=100&id=WCL5hPLvhUjQ&format=png&color=ffffff" width="35" height="35" alt="GitHub">
            </a>
        </div>

        <p>© 2025 Gourmania. All rights reserved.<br>
            by <a href="https://github.com/Dmytro-Shved" style="text-decoration: underline; color: #ffffff">Dmytro Shved</a></p>
    </div>
</div>
</body>
</html>
