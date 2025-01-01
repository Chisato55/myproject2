<?php
include("include/config.php");
error_reporting(0);

if (isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $mobile = $_POST['usermobile'];
    $password = $_POST['loginpassword'];
    $hasedpassword = hash('sha256', $password);

    $ret = "SELECT * FROM userdata WHERE (username=:uname || useremail=:uemail)";
    $queryt = $dbh->prepare($ret);
    $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
    $queryt->bindParam(':uemail', $email, PDO::PARAM_STR);
    $queryt->execute();
    $results = $queryt->fetchAll(PDO::FETCH_OBJ);

    if ($queryt->rowCount() == 0) {
        $sql = "INSERT INTO userdata(fullname,username,useremail,usermobile,loginpassword) VALUES (:fname,:uname,:uemail,:umobile,:upass)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':uname', $username, PDO::PARAM_STR);
        $query->bindParam(':uemail', $email, PDO::PARAM_STR);
        $query->bindParam(':umobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':upass', $hasedpassword, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<div class='alert alert-success'>You have signed up successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Something went wrong. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Username or Email already exists. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SignUp Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .signup-container {
            margin-top: 50px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
            width: 100%;
            background: linear-gradient(90deg, #28a745, #218838);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #218838, #1e7e34);
        }
        .form-group label {
            font-weight: bold;
        }
        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="signup-container col-md-6 mx-auto">
        <h2>SignUp Page</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="useremail">Email:</label>
                <input type="email" class="form-control" id="useremail" placeholder="Enter Email" name="useremail" required>
            </div>
            <div class="form-group">
                <label for="usermobile">Mobile:</label>
                <input type="text" maxlength="10" pattern="[0-9]{10}" title="Enter 10-digit number only" class="form-control" id="usermobile" placeholder="Enter Mobile Number" name="usermobile" required>
            </div>
            <div class="form-group">
                <label for="loginpassword">Password:</label>
                <input type="password" class="form-control" id="loginpassword" placeholder="Enter Password" name="loginpassword" required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-success" name="signup" id="signup">Register</button>
        </form>
    </div>
</div>

</body>
</html>
