<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $sql = "SELECT id FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
        }

        body {
            background: url("Pics/healthcare-stethoscope-symbols-2milkjfopmck18ii.jpg") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
        }

        nav {
            background-color: #1ca518;
            color: white;
            text-align: center;
            padding: 0.75em;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin:0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            color: #f4f4f4;
        }

        #register {
            margin: auto;
            width: 90%;
            max-width: 400px;
            padding: 2em;
            background-color: white;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        #register form {
            display: flex;
            flex-direction: column;
        }

        #register label {
            margin-bottom: 10px;
        }

        #register input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #464646;
            border-radius: 5px;
        }

        #register input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        #register input[type="submit"]:hover {
            opacity: 0.8;
        }

        #icon {
            margin-right: auto;
        }

        @media screen and (max-width: 700px) {
            nav {
                flex-direction: column;
                align-items: center;
            }

            h1 {
            margin-right: 0 auto;
        }
            nav a {
                margin: 5px 0;
            }

            h2 {
                margin-top: 20px;
            }

            #register {
                width: 90%;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <nav>
            <h1 id="icon">RemoHealth</h1>
            <a href="welcome.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
    </nav>
    <div id="register">
        <h2>Register</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required /><br /><br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required /><br /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required /><br /><br />
            <input type="submit" value="Register" />
        </form>
    </div>
</body>

</html>

