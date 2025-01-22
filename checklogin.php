<?php 
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $loginpassword = trim($_POST['loginpassword']);

    // Hash the password using SHA-256
    $hashedpassword = hash('sha256', $loginpassword);

    try {
        // Query to check the user
        $ret = "SELECT * FROM userdata WHERE username = :uname AND loginpassword = :loginpassword";
        $queryt = $dbh->prepare($ret);

        // Bind parameters
        $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
        $queryt->bindParam(':loginpassword', $hashedpassword, PDO::PARAM_STR);

        // Execute the query
        $queryt->execute();

        // Check if any user matches
        $result = $queryt->fetch(PDO::FETCH_OBJ);

        if ($result) {
            // Store user information in session variables
            $_SESSION['fullname'] = $result->fullname;
            $_SESSION['user_id'] = $result->id;
            $_SESSION['user_type'] = $result->user_type;

            // Redirect based on user type
            if ($_SESSION['user_type'] == 0) {
                echo "<script type='text/javascript'>";
                echo "alert('Login successful!');";
                echo "document.location = 'admin/dashboard.php';";
                echo "</script>";
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('Login successful!');";
                echo "document.location = 'welcome.php';";
                echo "</script>";
            }
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Invalid username or password!');";
            echo "document.location = 'login.php';";
            echo "</script>";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "<script type='text/javascript'>";
        echo "alert('Database error: " . $e->getMessage() . "');";
        echo "document.location = 'login.php';";
        echo "</script>";
    }
}
?>
