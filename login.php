<?php
include("include/config.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!--<style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .login-container {
      margin-top: 100px;
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
    .header-text {
      text-align: center;
      color: #343a40;
      margin-bottom: 20px;
    }
    .signup-link {
      color: #007bff;
      text-decoration: none;
    }
    .signup-link:hover {
      text-decoration: underline;
    }
  </style>-->
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

                                <form>
                                    <div class="form-group">
                                        <label for="username">UserName:</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="loginpassword">Password:</label>
                                        <input type="password" class="form-control" id="loginpassword" placeholder="Enter password" name="loginpassword" required>
                                    </div>
                                    <button type="submit" class="btn btn-success" name="login" id="login">Login</button>

                                    <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="" class="text-primary ml-1">register</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
</head>
<body>
  <style>
    body{
    margin-top:20px;
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
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.4);
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #5369f8 !important;
}

.btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
}
Similar snippets
  </style>

<!--<div class="container d-flex justify-content-center">
  <div class="login-container col-md-6">
    <h2 class="header-text">Login Page</h2>
    <form action="checklogin.php" method="post">
      <div class="form-group">
        <label for="username">UserName:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required>
      </div>
      <div class="form-group">
        <label for="loginpassword">Password:</label>
        <input type="password" class="form-control" id="loginpassword" placeholder="Enter password" name="loginpassword" required>
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-success" name="login" id="login">Login</button>
      <p class="text-center mt-3">If you don't have an account, <a href="signup.php" class="signup-link">Sign up here</a></p>
    </form>
  </div>
</div> -->

</body>
</html>
