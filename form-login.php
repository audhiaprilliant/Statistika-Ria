<?php
include('login.php');
if(isset($_SESSION['login_user'])){
      header("location: dashboard/");
   }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link href="css/animate.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
  <meta name="theme-color" content="#e96155" />
  <!-- URL Theme Color untuk Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#e96155" />
  <!-- URL Theme Color untuk iOS Safari -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#e96155" />
  <title>Sign In | The 13th Statistika Ria</title>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h1><img src="images/logo.png" alt="logo"></h1>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa d-inline fa-lg fa-home"></i>
              <b>
                <b>&nbsp;Home</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">
              <i class="fa d-inline fa-lg fa-newspaper-o"></i>
              <b>
                <b>&nbsp;News</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kompetisi.php">
              <i class="fa d-inline fa-lg fa-graduation-cap"></i>
              <b>
                <b>&nbsp;Competition</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="timeline.php">
              <i class="fa d-inline fa-lg fa-calendar"></i>
              <b>
                <b>Timeline</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">
              <i class="fa d-inline fa-lg fa-envelope-o"></i>
              <b>
                <b>&nbsp;Contact</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">
              <i class="fa d-inline fa-lg fa-search"></i>
              <b>
                <b>&nbsp;FAQ</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form-login.php">
              <i class="fa d-inline fa-lg fa-user-circle-o"></i>
              <b>
                <b>&nbsp;Sign In</b>
              </b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <h1 class="text-primary text-center"><b><b>SIGN IN</b></b></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form name="login-form" method="post" action="form-login.php">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" required="required" placeholder="Email Address">
              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required="required" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            
            <div class="form-group">
              <?=@$error ?>
            </div>
            <br>
            <h6>Do not have an account ?</h6>
            <a href="register.php" class="btn btn-primary"> Sign Up </a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container"> </div>
  </div>
  <div class="py-5 text-white bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center align-self-center">
            <p class="mb-5 text-left">Meranti Street 22 Wing 4 Floor
              <br>Department of Statistics
              <br>Mathematics and Science Faculty
              <br>Bogor Agricultural University
              <br>
              <br>Contact Person :&nbsp;0812 8521 9990 (Thama)
              <br>Contact Person : 0852 8952 0038 (Ila) &nbsp;</p>
            <div class="my-3 row">
              <div class="col-4 col-md-3">
                <a href="mailto:statistikaria13@gmail.com" target="_blank">
                  <i class="fa fa-3x text-light fa-envelope-o"></i>
                </a>
              </div>
              <!---
              <div class="col-4 col-md-3">
                <a href="https://www.facebook.com/statistikaria13" target="_blank">
                  <i class="fa fa-3x fa-facebook text-light"></i>
                </a>
              </div>-->
              <div class="col-4 col-md-3">
                <a href="https://twitter.com/statistikaria" target="_blank">
                  <i class="fa fa-3x fa-twitter text-light"></i>
                </a>
              </div>
              <div class="col-4 col-md-3">
                <a href="https://www.instagram.com/statistikaria"  target="_blank">
                  <i class="fa fa-3x fa-instagram text-light"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-4 col-md-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.712341285121!2d106.7288869141969!3d-6.5579507659311504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4ae22cce493%3A0xd24590e1bbfdc982!2sDepartemen+Statistika+IPB!5e0!3m2!1sid!2sid!4v1532015507037" width="295" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>