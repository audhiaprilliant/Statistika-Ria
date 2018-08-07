<?php 
    include "../connect.php";
    session_start();
     if(!isset($_SESSION['login_user'])){
      header("location: ../");
   } 
    
    $email = $_SESSION['login_user'];
    $sql = mysqli_query($db,"select * from peserta where email = '$email'" );
    $result = mysqli_fetch_array($sql);
    $nama = $result['nama_lengkap'];
	$idpeserta = $result['no_peserta'];
    $sidpendaftaran = mysqli_fetch_array(mysqli_query($db,"select * from kompetisi where no_peserta1 = '$idpeserta' and kode_lomba = 1" ));
    $idnya = $sidpendaftaran['id_pendaftaran'];
    $sqlsoal = mysqli_fetch_array(mysqli_query($db,"select * from peserta_ksn where no_lomba = '$idnya' "));
    $soal_ksn = $sqlsoal['file_soal'];
    $sandi = $sqlsoal['sandi'];

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
  <title>Kompetisi Statistika Nasional</title>
</head>

<body>
    <?php 
    include'header.php';
     ?>
    <!--/#header-->

<div class="py-3 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-1 text-primary"><b><b>Dashboard KSN <?=@$nama?></b></b></h2>
            </div>
        </div>
    </div>
</div>

    <section id="peserta1" class="padding-top">
        <div class="container">
            <div class="row">
                <?php include'sidebar.php';?>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >
                        <div class="panel-body">
                                <form class="form-horizontal">
                                     <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext">Participant ID</label>   
                                            <input type="text" class="form-control" value="<?php echo $idnya ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-4 ol-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Competition Status</label>   
                                            <input type="text" class="form-control" value="Active" placeholder="" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Stages</label>   
                                            <input type="text" class="form-control" value="Preliminary" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="col-md-2 col-sm-4"></div>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >                              
                        <div class="panel-body">
                            <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="text-center mb-1 text-primary py-3 bg-light"><b>Answer Sheet Template</b></h2>
                            </div>
                            <a href="Template/Template Lembar Jawaban KSN.doc" class="btn btn-primary">Download Answer Sheet Template Here! </a>
                        </div>                    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-sm-4"></div>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary" >       
                        <div class="panel-body">
                            <br>
                            <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="text-center mb-1 text-primary py-3 bg-light"><b>Kompetisi Statistika Nasional Problem Case</b></h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" style="margin : 10px">
                                    <label for="inputtext1">Problem Case</label> <br>  
                                    <a href="../SOAL/<?php echo $soal_ksn ?>.pdf" class="btn btn-primary" target="_blank">Download Problem Case <?php echo $soal_ksn ?> </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="margin : 10px">
                                    <label for="inputtext1">Problem Case Password</label>   
                                    <input type="text" class="form-control" value="<?php echo $sandi ?>" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>        
                        </div>

                        <br>
                        <br>
                        <!--
                        <div class="py-3 bg-light">
                            <div class="container-fluid">
                            <h2 class="title">NOTE:</h2>
                            <h2 class="title">Please, read Kompetisi Statistika Nasional Guideline carefully</h3><a href="../panduan.php" class="btn btn-primary">Download here</a>
                            <h3 class="title">Be sure that you have downloaded successfully and input password correctly</h3>
                            <h3 class="title">If you have problems with the roles, call the Official Account of The 13th Statistika Ria in Social Media or contact person 0852 8952 0038 (Ila)</h3>
                            <h3 class="title">1. Download problem case and password will be appeared in the right side</h3>
                            <h3 class="title">2. Solve the problem case in A4 paper with blackpen</h3>
                            <h3 class="title">3. Take or scan your answer sheet</h3>
                            <h3 class="title">4. Save your answer sheet using the template on Kompetisi Statistika Nasional template</h3>
                            <h3 class="title">5. One page for one question, first page just for your identity</h3>
                            <h3 class="title">Send your file with PDF format to email</h3>
                            <h3><b><b>ksn.statistikaria13@gmail.com</b></b></h3>
                            </div>
                        </div>
                    </div>                    
                </div> 
                </div>    
            </div>
            -->
        </div>
    </section>
<br>
<br>


    <?php 
    include'footer.php';
     ?>
    <!--/#footer-->

</body>
</html>        