<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>RemoHealth</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #0074d9;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 20px;
                background-color: #001f3f;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
            }
            .navbar-brand {
                font-size: 24px;
                font-weight: bold;
                color: #ffffff;
                text-decoration: none;
            }
            .navbar-links {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
            }
            .navbar-links li {
                margin-right: 10px;
            }
            .navbar-links li a {
                color: #ffffff;
                text-decoration: none;
                padding: 5px 10px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .navbar-links li a:hover {
                background-color: #00487c;
            }
            .container {
                padding: 80px 20px 20px;
                text-align: center;
            }
            .logo {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #ff4136;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                margin: 10px;
                cursor: pointer;
            }
            .button:hover {
                background-color: #ff725c;
            }
            .btn {
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <a href="#" class="navbar-brand" id="logo"
                ><i class="bi bi-heart icon"></i>RemoHealth</a
            >
            <ul class="navbar-links">
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="logo">Welcome to RemoHealth</div>
            <button class="button"><a class="btn" href="register.php">Sign Up</a></button>
            <button class="button"><a class="btn" href="login.php">Log In</a></button>
        </div>
    </body>
</html>
