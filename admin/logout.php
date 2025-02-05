<?php
session_start();
session_unset();
session_destroy();
header('Location: http://localhost:8080/myproject2/myproject1/login.php');
exit(); // Ensure the script stops executing after the redirect
?>
