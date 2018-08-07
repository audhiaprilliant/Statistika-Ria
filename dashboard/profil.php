<?php
    include '../connect.php';
    session_start();
    if(!isset($_SESSION['login_user'])){
          header("location: ../");
       }
    $email = $_SESSION['login_user'];
    $sql1 = "SELECT * FROM register WHERE email = '$email'";
    $hasil1 = mysqli_fetch_array(mysqli_query($db,$sql1), MYSQLI_ASSOC);
    include 'simpanprofil.php';
?> 

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css">
  <link href="../css/animate.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
  <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
  <meta name="theme-color" content="#e96155" />
  <!-- URL Theme Color untuk Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#e96155" />
  <!-- URL Theme Color untuk iOS Safari -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#e96155" /> 
  <title>Profil | The 13th Statistika Ria</title>
</head>

<body>
    <?php 
        $currentPage='kompetisi';
        include'header.php';
    ?>
    <!--/#header-->

    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-primary text-center"><b><b>Please Fill Your Profile !</b></b></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
            <form name="login-form" method="post" action="profil.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Full Name</label>
                    <input type="text" name="nama" class="form-control" required="required" placeholder="Full Name" value="<?php echo $hasil1['nama_lengkap'] ?> "disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $hasil1['email'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nomorhandphone">Phone Number</label>
                    <input type="text" name="nomorhandphone" class="form-control" required="required" value="<?=@$hp?>" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="institusi">University</label>
                    <input type="text" name="institusi" value="<?=@$institusi?>" class="form-control" required="required" placeholder="University">
                </div>
                <div class="form-group">
                    <label for="daerah">City</label>
                    <input type="text" name="daerah" value="<?=@$daerah?>" class="form-control" required="required" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="jk">Sex</label>
                        <select name="jk" class="form-control" value="<?=@$gender?>" required="required" placeholder="Sex" >
                            <option disabled selected>Sex</option>
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Birth Date</label>
                    <input type="date" name="tgl_lahir" value="<?=@$birthday?>" class="form-control" required="required" placeholder="yyyy/mm/dd">
                </div>
                <div class="form-group">
                    <label for="nim">College Student Identity Number</label>
                    <input type="text" name="nim" value="<?=@$nim?>" class="form-control" required="required" placeholder="College Student Identity">
                </div>
                <div class="form-group">
                    <label for="ktm">Upload High Student Identity Card</label>
                    <br>
                    <input type="file" name="ktm" required="required" accept="image/*"" onchange="loadFile(event)">
                    <br>
                    <small>Maximum file size 1MB and have extension jpg, jpeg, or png</small>
                    <img id="output" width="300" />
                        <script>
                            var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                </div>
                <div class="form-group">
                    <label for="foto">Upload Photo Profile</label>
                    <br>
                    <input type="file" name="foto" required="required" accept="image/*" onchange="UploadFile(event)">
                    <br>
                    <small>Maximum file size 1MB and have extension jpg, jpeg, or png</small>
                    <img id="output1" width="300" />
                        <script>
                            var UploadFile = function(event) {
                            var output1 = document.getElementById('output1');
                            output1.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                <br>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                <div class="form-group col-md-12 col-sm-12"><?=@$error ?></div>
            </form>
        </div>
      </div>
    </div>
    </div>
  
    <?php 
        include'footer.php';
    ?>
    <!--/#footer-->
</body>
</html>