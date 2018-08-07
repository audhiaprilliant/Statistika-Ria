<?php 
session_start();
    if(isset($_SESSION['login_user'])){
      header("location: dashboard/");
   }
    include 'validation.php';
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
  <title>Registration | The 13th Statistika Ria</title>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
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
              <i class="fa d-inline fa-lg fa-envelope-"></i>
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
            <a class="nav-link" href="faq.php">
              <i class="fa d-inline fa-lg fa-search"></i>
              <b>
                <b>&nbsp;Sign In</b>
              </b>
            </a>
          </li>
        </ul>
        <!--
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="form-login.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>-->
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-primary text-center"><b><b>SIGN UP</b></b></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form  name="contact-form" method="post" action="register.php">
            <div class="form-group">
              <label>Fullname</label>
              <input type="text" name="name" class="form-control" value="<?=@$fullname?>" required="required" placeholder="Full Name">
              <span class="text-danger"><?=@$fullname_error ?></span>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?=@$email?>" placeholder="Email">
              <span class="text-danger"><?=@$email_error ?></span>
              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="<?=@$password?>" required="required" placeholder="Password">
              <span class="text-danger"><?=@$password_error ?><?=@$epassword?></span>
            </div>
            <div class="form-group">
              <label>Re-type Password</label>
              <input type="password" name="cpassword" class="form-control" value="<?=@$cpassword?>" required="required" placeholder="Password Confirmation">
              <span class="text-danger"><?=@$cpassword_error ?></span>
            <br>
            <div>
              <button type="submit" name="daftar" class="btn btn-primary">Sign Up</button>
            </div>
            <br><h6>Have an account ?</h6>
            <div>
              <a href="form-login.php" class="btn btn-primary"> Sign In </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container"> </div>
  </div>

  <?php
    include 'signup.php';
    include'template/footer.php';
  ?>
    <!--/#footer-->

</body>
</html>