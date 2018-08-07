<?php 
$email = $_SESSION['login_user'];
$result = mysqli_fetch_array(mysqli_query($db,"select * from peserta where email = '$email'" ));
$cek = mysqli_fetch_array(mysqli_query($db,"select * from register where email = '$email'" ));
$nama = $cek['nama_lengkap'];
?>

<!DOCTYPE html>
<header id='header'>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h1><img src="../images/logo.png" alt="logo"></h1>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="fa d-inline fa-lg fa-home"></i>
              <b>
                <b>Home</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../news.php">
              <i class="fa d-inline fa-lg fa-newspaper-o"></i>
              <b>
                <b>&nbsp;News</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../kompetisi.php">
              <i class="fa d-inline fa-lg fa-graduation-cap"></i>
              <b>
                <b>&nbsp;Competition</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../timeline.php">
              <i class="fa d-inline fa-lg fa-calendar"></i>
              <b>
                <b>&nbsp;Timeline</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">
              <i class="fa d-inline fa-lg fa-envelope-o"></i>
              <b>
                <b> Contacts</b>
              </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../faq.php">
              <i class="fa d-inline fa-lg fa-search"></i>
              <b>
                <b>&nbsp;FAQ</b>
              </b>
            </a>
          </li>
          <li class='nav-item'>
            <a class="nav-link" href='index.php'>
              <i class='fa fa-user'></i>
              <b>
                <b>&nbsp; Dashboard</b>
              </b>
            </a> 
            <a class="nav-link" href='../logout.php'>
              <i class='fa fa-sign-out'></i>
                <b>
                  <b>&nbsp; LogOut</b>
                </b>
            </a>
          </li>
      </div>
    </div>
  </nav>
</header>