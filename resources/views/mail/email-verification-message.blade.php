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
            margin-top: 20px;
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            color: #253858;
            margin-bottom: 20px;
        }
        .content p {
            font-size: 16px;
            color: #5e6c84;
            line-height: 1.5;
            margin-bottom: 20px;
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
            margin-bottom: 5px;
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
        <h1>Please Confirm Your Email Addres</h1>
        <p>You'll be able to create your recipes in seconds. We just need you to confirm that you're a human.</p>
    </div>

    <div style="text-align: center;">
        <a href="{{ $url }}" class="button" style="color: #ffffff">I'm Human</a>
    </div>

    <div class="info">
        <img src="https://images2.imgbox.com/3a/fd/ime7uKJ7_o.png" alt="Hand Dish" style="max-width: 200px; margin-top: 15px">
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
