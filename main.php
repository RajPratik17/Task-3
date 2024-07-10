<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>RemoHealth Dashboard</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="grid-container">
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>

        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand" id="title">
                    <i class="bi bi-heart icon"></i>RemoHealth
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="#" target="_blank">
                        <span class="material-icons-outlined">person</span>
                        Welcome, <?php echo $_SESSION['username']; ?>!
                    </a>
                </li>
                <ul class="sidebar-list">
                    <li class="sidebar-list-item">
                        <a href="#" target="_blank">
                            <span class="material-icons-outlined">dashboard</span> Overview
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="https://www.timeanddate.com/calendar/" target="_blank">
                            <span class="material-icons-outlined">calendar_today</span> Calendar
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="#" target="_blank">
                            <span class="material-icons-outlined">message</span> Messages
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="#" target="_blank">
                            <span class="material-icons-outlined">settings</span> Settings
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="" target="_blank">
                            <span class="material-icons-outlined">support</span> Contact Us
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="logout.php">
                            <span class="material-icons-outlined">exit_to_app</span>Logout
                            
                        </a>
                    </li>
                </ul>
        </aside>

        <main class="main-container">
            <div class="main-title">
                <h2>Health Indicator</h2>
            </div>

            <div class="date-filter">
                <label for="datepicker">Date:</label>
                <input type="date" id="datepicker" onchange="handleDateChange()">
            </div>

            <div class="main-cards">
                <div class="card">
                    <div class="card-inner">
                        <h3>Heart</h3>
                        <div class="heart-container">
                            <span class="material-icons-outlined" id="heart">favorite</span>
                        </div>
                    </div>
                    <h1 id="heartbeat">72</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>Sleep</h3>
                        <span class="material-icons-outlined">bedtime</span>
                    </div>
                    <h1>9 hours</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>Walk</h3>
                        <span class="material-icons-outlined">directions_walk</span>
                    </div>
                    <h1 id="step-count">0 <span>steps</span></h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>Body Temperature</h3>
                        <span class="material-icons-outlined">thermostat</span>
                    </div>
                    <h1 id="temperature">36.5°C</h1>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <h3>Calories</h3>
                        <span class="material-icons-outlined">local_fire_department</span>
                    </div>
                    <h1>2000</h1>  
            </div>
        </main>


    </div>
    <div class="sos-button">
        <button onclick="sendSOS()">
            <span>Emergency Button</span>
        </button>
    </div>

    <script>

    let sidebarOpen = false;
    const sidebar = document.getElementById('sidebar');

    function openSidebar() {
        if (!sidebarOpen) {
            sidebar.classList.add('sidebar-responsive');
            sidebarOpen = true;
        }
    }

    function closeSidebar() {
        if (sidebarOpen) {
            sidebar.classList.remove('sidebar-responsive');
            sidebarOpen = false;
        }
    }



    function handleDateChange() {
        const selectedDate = document.getElementById('datepicker').value;
        console.log('Selected Date:', selectedDate);
    }

    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        const year = today.getFullYear();
        let month = today.getMonth() + 1;
        let day = today.getDate();

        month = month < 10 ? "0" + month : month;
        day = day < 10 ? "0" + day : day;

        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('datepicker').value = formattedDate;
    });

    const heartbeatElement = document.getElementById('heartbeat');

    function generateRandomHeartbeat() {
        return Math.floor(Math.random() * (100 - 60 + 1)) + 60;
    }

    function updateHeartbeat() {
        heartbeatElement.textContent = generateRandomHeartbeat();
    }

    setInterval(updateHeartbeat, 3000);

    function updateStepCount() {
        const stepCountElement = document.getElementById('step-count');
        let currentStepCount = parseInt(stepCountElement.innerText);
        currentStepCount += 10;
        stepCountElement.innerText = currentStepCount;
    }

    setInterval(updateStepCount, 5000);

    function sendSOS() {
        alert("SOS message sent!");
    }

    function generateRandomTemperature() {
        return (Math.random() * (37.2 - 36.1) + 36.1).toFixed(1);
    }

    function updateTemperature() {
        const temperatureElement = document.getElementById('temperature');
        temperatureElement.textContent = generateRandomTemperature() + "°C";
    }

    setInterval(updateTemperature, 5000);
    </script>

</body>

</html>
