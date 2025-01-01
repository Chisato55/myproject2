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
  <style>
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
  </style>
</head>
<body>

<div class="container d-flex justify-content-center">
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
</div>

</body>
</html>
