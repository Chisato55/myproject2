<!DOCTYPE html>
<html lang="en">
<head>
  <title>Myproject1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: pink; /* Background is now pink */
    }
    .jumbotron {
      background: linear-gradient(90deg, #ff69b4, #ff1493); /* Gradient pink for jumbotron */
      color: white;
      padding: 50px 20px;
    }
    .navbar {
      background-color: #333;
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
    }
    .nav-link:hover {
      color: #ff69b4 !important; /* Pink hover effect */
    }
    .fakeimg {
      height: 200px;
      background: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      color: #555;
      font-size: 18px;
    }
    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }
    .footer a {
      color: #ff69b4;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1 class="display-4" style="color: #333;">Welcome to Myproject1</h1> <!-- สีดำ -->
  <p class="lead" style="color: #fff;">Your one-stop solution for all your needs</p> <!-- สีขาว -->
</div>


<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">Myproject1</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Signup</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container content-section">
  <div class="row">
    <div class="col-md-4">
      <div class="card p-3">
        <h2>About Me</h2>
        <img src="image0_0.jpg" alt="Photo of me" class="img-fluid rounded">
        <p>I'm passionate about creating modern and responsive designs.</p>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card p-4">
        <h2>Latest Updates</h2>
        <img src="pic.jpg" alt="Latest Update" class="img-fluid rounded my-3">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent venenatis at purus eget ultrices.</p>
        <img src="1111.jpg" alt="Another Update" class="img-fluid rounded my-3">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vulputate libero ut est tristique tincidunt.</p>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <p>© 2025 Myproject1. All rights reserved.</p>
  <p>Follow us on 
    <a href="#"><i class="fab fa-facebook"></i> Facebook</a> | 
    <a href="#"><i class="fab fa-twitter"></i> Twitter</a> | 
    <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
  </p>
</div>

</body>
</html>
