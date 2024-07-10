<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['logout_message'] = "You have been logged out successfully.";
header("Location: login.php");
exit();
?>
