<?php
include("include/config.php");
error_reporting(E_ALL); // แสดงข้อผิดพลาดเพื่อช่วยในการดีบัก
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin-top: 20px;
            background: #f6f9fc;
        }
        .account-block {
            padding: 0;
            background-image: url(https://bootdey.com/img/Content/bg1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }
        .account-block .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .text-theme {
            color: #5369f8 !important;
        }
        .btn-success {
            width: 100%;
            background: linear-gradient(90deg, #28a745, #218838);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #218838, #1e7e34);
        }
    </style>
</head>
<body>
<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                <form action="checklogin.php" method="post">
                                    <div class="form-group">
                                        <label for="username">UserName:</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="loginpassword" placeholder="Enter Password" name="loginpassword" required>                                    </div>
                                    <button type="submit" class="btn btn-success" name="login">Login</button>
                                    <a href="forgot-password.php" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>

                                <?php
                                if (isset($_GET['error'])) {
                                    echo '<div class="alert alert-danger mt-3" role="alert">';
                                    echo htmlspecialchars($_GET['error']);
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This beautiful theme is yours!</h4>
                                    <p class="lead text-white">"Best investment I made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="signup.php" class="text-primary ml-1">Register</a></p>
        </div>
    </div>
</div>
</body>
</html>
