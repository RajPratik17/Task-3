<?php
include 'config.php';

session_start();

$alertMessage = "";

if (isset($_SESSION['logout_message'])) {
    $alertMessage = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: main.php");
            exit();
        } else {
            $alertMessage = "Invalid password";
        }
    } else {
        $alertMessage = "No user found with that username";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>RemoHealth Login</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<style>
body {
    background:url("healthcare-stethoscope-symbols-2milkjfopmck18ii.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;
    margin: 0;
    font-family: "Roboto", sans-serif;
    font-weight: 400;
    font-style: normal;
}

#login {
    width: 30%;
    margin: 0 auto;
    margin-top: 10%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 1em;
    background-color: #f9f9f9;
}

h2 {
    text-align: center;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 1em;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="password"]:focus {
    background-color: #f2f2f2;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    opacity: 0.8;
}

nav {
    background-color: #1ca518;
    overflow: hidden;
    display: flex;
    padding: 0.75em;
    justify-content: flex-end;
    align-items: center;
}

nav a {
    color: white;
    text-decoration: none;
    padding: 1em;
}

#icon {
    color: white;
    margin-right: auto;
}

#login {
    border-radius: 1em;
    box-shadow: 2px 2px 30px #36303080;
}

#login a {
    text-decoration: none;
    color: #1ca518;
    font-size: 1em;
}

#logbtn {
    border-radius: 1em;
}

#alert {
    display: none;
    margin: 0 auto;
    width: 50%;
    padding: 10px;
    background-color: #f44336;
    color: white;
    text-align: center;
    border-radius: 5px;
    position: relative;
    top: 10px;
}

@media screen and (max-width: 700px)
{
    nav
    {
        display:flex;
        flex-direction:column;
    }
    
}
</style>
<script>
function showAlert(message, bgColor = '#f44336') {
    var alertBox = document.getElementById('alert');
    alertBox.innerHTML = message;
    alertBox.style.backgroundColor = bgColor;
    alertBox.style.display = 'block';
    setTimeout(function() {
        alertBox.style.display = 'none';
    }, 3000);
}
</script>

<body>
    <nav>
        <h1 id="icon">RemoHealth</h1>
        <a href="welcome.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <div id="alert"></div>
    <div id="login">
        <h2>RemoHealth Login</h2>
        <form method="POST" action="">
            <label for="username"> Enter Username:</label>
            <input type="text" id="username" name="username" required /><br /><br />
            <label for="password"> Enter Password:</label>
            <input type="password" id="password" name="password" required /><br /><br />
            <input type="submit" value="Login" id="logbtn"/>
        </form>
    </div>
    <?php
    if (!empty($alertMessage)) {
        echo "<script>showAlert('$alertMessage');</script>";
    }
    ?>
</body>

</html>