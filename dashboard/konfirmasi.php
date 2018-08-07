<?php 
    include '../connect.php';
    
    //$kompetisi = $_GET['kode_lomba'];
    session_start();
    $email = $_SESSION['login_user'];
    $kompetisi = isset($_GET['kode_lomba']) ? $_GET['kode_lomba'] :null ;
    $sqll = "select * from peserta where email = '$email'";
    $qe = mysqli_fetch_array(mysqli_query($db, $sqll));
    $nama_lengkap = rtrim($qe['nama_lengkap']);
    $no_id = $qe['no_peserta'];

    $sbayarken = mysqli_query($db, "select * from peserta_ken where id_upload = '$no_id'");
    $sbayarkis = mysqli_query($db, "select * from peserta_kis where id_upload = '$no_id'");
    $sdaftarken1 = mysqli_query($db, "select * from kompetisi where no_peserta1 = '$no_id' and kode_lomba=2");
    $sdaftarken2 = mysqli_query($db, "select * from kompetisi where no_peserta2 = '$no_id' and kode_lomba=2");
    $sdaftarkis1 = mysqli_query($db, "select * from kompetisi where no_peserta1 = '$no_id' and kode_lomba=3");
    $sdaftarkis2 = mysqli_query($db, "select * from kompetisi where no_peserta2 = '$no_id' and kode_lomba=3");

    if($kompetisi == 2){
        $jml1 = mysqli_num_rows($sbayarken);
        $jml2 = mysqli_num_rows($sdaftarken1);
        $jml3 = mysqli_num_rows($sdaftarken2);
        if(($jml1 == 1) OR ($jml2 == 1) OR ($jml3 == 1)){
             echo "<script>alert('$nama_lengkap has been registered in Statistics Essay Competition.');
            window.location.href='index.php';
            </script>";
        }
    }
    elseif ($kompetisi == 3) {
        $jml1 = mysqli_num_rows($sbayarkis);
        $jml2 = mysqli_num_rows($sdaftarkis1);
        $jml3 = mysqli_num_rows($sdaftarkis2);
        if(($jml1 == 1) OR ($jml2 == 1) OR ($jml3 == 1)){
             echo "<script>alert('$nama_lengkap has been registered in Statistics Infographics Competition.');
            window.location.href='index.php';
            </script>";
        }
    }
    
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
  <title>Upload Payment Receipt</title>
</head>

<body>
    <?php 
    $currentPage='';
    include'header.php';
     ?>
<!--
<div class="py-3 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-1 text-primary">Welcome <?=@$nama?></h2>
            </div>
        </div>
    </div>
</div>
-->

<div class="py-3 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <h1 class="page-header text-center text-primary"><b><b>Upload Payment Receipt</b></b></h1>
            </div>
        </div>
    </div>
</div>

                <div class="col-sm-4 col-md-4"></div>
                <div class="col-sm-6 col-md-6 text-center">
                    <form action="konfirmasi.php?kode_lomba=<?php echo $kompetisi?>" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-6 col-md-6">
                            <input type="file" name="bukti_bayar" required="required" accept="image/*" onchange="loadFile(event)" >
                            <img id="output" width="300"/>
                                <script>
                                    var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
                        </div>
                        <div class="col-sm-6 col-md-6">
                    <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                </div>
            </form>
        </div>
    <br>
    <br>
    <br>
    <br>
    </div>

    <?php 
        include 'bukti-pembayaran.php';
        include'footer.php';
    ?>
    <!--/#footer-->

</body>
</html>





      