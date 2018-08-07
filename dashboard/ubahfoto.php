<?php 
    include "../connect.php";
    session_start();
     if(!isset($_SESSION['login_user'])){
      header("location: ../");
   } 
    
    $email = $_SESSION['login_user'];
    $sql = mysqli_query($db,"select * from peserta where email = '$email'" );
    $result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $nama = $result['nama_lengkap'];
    $foto = $result['file_foto'];
    $no_peserta = $result['no_peserta'];
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
    include'header.php';
     ?>
    <!--/#header-->

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-primary text-center">Please Fill Your Profile !</h1>
            </div>
        </div>
    </div>
</div>

    <section id="peserta1" class="padding-top">
        <div class="container">
            <div class="row">
                        <?php include 'sidebar.php'; ?>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >
                        <div class="panel-body">
                            <div class="col-md-4 col-sm-4"> </div>
                            <form class="form-horizontal col-md-4 col-sm-4" method="POST" action="ubahfoto.php" enctype="multipart/form-data">
                                <div class="form-group text-center">
                                    <label for="foto"><h3><strong>Photo Profile</strong></h3></label>
                                    <img id="output" width="300" src="../images/foto/<?php echo $foto ?>"/>
                                    <script>
                                        var loadFile = function(event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                    <input type="file" name="foto" value="<?php echo $foto ?>" accept="image/*" onchange="loadFile(event)">
                                </div>
                                <div class="form-group pull-right"> 
                                    <input type="submit" name="simpan" class="btn btn-primary" value="SAVE">
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <?php 
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            if (isset($_FILES['foto'])){
                $nama_lengkap = rtrim($result['nama_lengkap']);
                $nama_foto = $_FILES['foto']['name'];

                $x = explode('.', $nama_foto);


                $ekstensi1 = strtolower(end($x));

                $ukuranfoto = $_FILES['foto']['size'];
                $file_tmpfoto = $_FILES['foto']['tmp_name'];
                $namabarufoto = $no_peserta.'-'.$nama_lengkap.'.'.$ekstensi1;

                $target_pathfoto = "../images/foto/" . $namabarufoto;
                if(file_exists($target_pathfoto)){
                    chmod($target_pathfoto, 0777);
                    unlink($target_pathfoto);
                }
                move_uploaded_file($file_tmpfoto, $target_pathfoto);
                $tambahfotoktm = "UPDATE peserta SET file_foto ='$namabarufoto' WHERE no_peserta = '$no_peserta'";
                mysqli_query($db, $tambahfotoktm);

                echo "<script>alert('$nama_lengkap 'photo profile successfully updated.');
                    window.location.href='profil.php';
                    </script>";
                
            }
        }
    ?>
                   

    <?php 
    include'footer.php';
     ?>
    <!--/#footer-->
</body>
</html>        