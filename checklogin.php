<?php 
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $loginpassword = $_POST['loginpassword'];

    // Hash the password using SHA-256
    $hashedpassword = hash('sha256', $loginpassword);

    // Query to check the user
    $ret = "SELECT * FROM userdata WHERE (username = :uname AND loginpassword = :loginpassword)";
    $queryt = $dbh->prepare($ret);

    // Bind parameters
    $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
    $queryt->bindParam(':loginpassword', $hashedpassword, PDO::PARAM_STR);

    // Execute the query
    $queryt->execute();

    // Check if any user matches
    if ($queryt->rowCount() > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Login successful!');";
        echo "document.location = 'welcome.php';";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Invalid username or password!');";
        echo "document.location = 'login.php';";
        echo "</script>";
    }
}
?>
