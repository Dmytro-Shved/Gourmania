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
        .main-content {
            padding: 20px;
            text-align: center;
        }
        .main-content h1 {
            font-size: 24px;
            color: #253858;
            margin-bottom: 20px;
        }
        .main-content p {
            font-size: 16px;
            color: #5e6c84;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #AE763E;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .section {
            padding: 20px;
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
        }
        .section img {
            width: 150px;
            height: 110px;
            margin-right: 10px;
            display: block;
        }
        .section h2 {
            font-size: 18px;
            max-width: 230px;
            color: #ffffff;
            margin-bottom: 10px;
            background-color: #AE763E;
            border-radius: 10px;
            text-align: center;
            padding: 5px;
        }
        .section p {
            font-size: 14px;
            max-width: 320px;
            color: #5e6c84;
            line-height: 1.3;
            margin-bottom: 10px;
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
            font-size: 24px;
            color: #253858;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header -->
    <div class="header">
        <img src="https://i.ibb.co/C98yFvx/Component-1.png" alt="Gourmania Logo">
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome to Gourmania!</h1>
        <img src="https://i.ibb.co/wSvVv93/chief-hat-changed-color.png" alt="Chef Hat" style="max-width: 200px; margin: 20px 0;">
        <p style="color: #253858;font-weight: bold">Wear that chief's hat with pleasure, {{ $name }}</p>
        <p>We're so glad you're here. Now you're able to rate recipes, save the recipes you like and create yours! <a href="#" style="color: #AE763E;">Visit site</a> to see more.</p>
        <a href="#" class="button" style="color: #ffffff">Get Started</a>
    </div>

    <div class="info">
        <p>By verifying your email, you will have access to</p>
    </div>

    <!-- Sections -->
    <!-- section 1 -->
    <div class="section">
        <img src="https://i.ibb.co/mF48bsx/Component-3.png" alt="Rate the recipes">
        <div>
            <h2>Rate the recipes</h2>
            <p>If you liked the recipe you can show your reaction by rating the recipe!</p>
        </div>
    </div>

    <!-- section 2 -->
    <div class="section">
        <img src="https://i.ibb.co/sQbLRWQ/Component-4.png" alt="Save the recipes">
        <div>
            <h2>Save the recipes</h2>
            <p>If there is a recipe you like and don't want to lose it, you can always save it for yourself and use it whenever you like.</p>
        </div>
    </div>

    <!-- section 3 -->
    <div class="section">
        <img src="https://i.ibb.co/ggwrNDT/Component-5.png" alt="Create your own recipes">
        <div>
            <h2>Create your own recipes</h2>
            <p>If you feel like sharing your findings, you can create your own recipe.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>If you would prefer to no longer receive messages like this, you can <a style="text-decoration: underline;color: #ffffff" href="#">unsubscribe</a>.</p>
        <p><a style="text-decoration: underline;color: #ffffff" href="#">Privacy policy</a></p>

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
