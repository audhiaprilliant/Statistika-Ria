<?php 
    include "../connect.php";
    session_start();
     if(!isset($_SESSION['login_user'])){
      header("location: ../");
   } 
    
    $email = $_SESSION['login_user'];
    $sql = mysqli_query($db,"select * from peserta where email = '$email'" );

    if($sql->num_rows === 0){
        header("location:profil");
    }
    $result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $nama = $result['nama_lengkap'];
    $univ = $result['asal_univ'];
    $daerah = $result['asal_daerah'];
    $hp = $result['no_hp'];
    $ttl = $result['tanggal_lahir'];
    $jk = $result['jenis_kelamin'];
    $nim = $result['nim'];
    $foto = $result['file_foto'];
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
  <title>Welcome <?=@$nama?> | The 13th Statistika Ria</title>
</head>

<body>

  <?php 
    $currentPage='kompetisi';
    include'header.php';
     ?>
    <!--/#header-->

<div class="py-3 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-1 text-primary"><b><b>Welcome <?=@$nama?></b></b></h2>
            </div>
        </div>
    </div>
</div>

    <section id="peserta1" class="padding-top">
        <div class="container">
            <div class="row">
                <?php include"sidebar.php"; ?>

                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >
                        <!--
                            <div class="row">
                                <div class="col-xs-2 col-md-12">
                                    <a href="editprofil.php"><i class="fa fa-pencil fa-2x pull-right"></i></a>
                                </div>
                            </div>
                        -->
                 
                  
                        <div class="panel-body">
                            
                                <form class="form-horizontal">
                                    <div class="col-md-3">
                                        <div class="portfolio-single">
                                            <div class="portfolio-thumb">
                                                <img src="../images/foto/<?php echo $foto;?> " class="img-responsive" width="120" height="120">
                                        
                                            </div>
                                            
                                            <div class="portfolio-view">
                                                <ul class="nav nav-pills">
                                                	<!--
                                                    <li><a href="ubahfoto.php"><i class="fa fa-link"></i></a></li>
                                        			-->
                                                    <li><a href="../images/foto/<?php echo $foto;?>" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>

                                  
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext">Full Name</label>   
                                            <input type="text" class="form-control" value="<?php echo $nama ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Email</label>   
                                            <input type="text" class="form-control" value="<?php echo $email ?>" placeholder="" readonly>
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">University</label>   
                                            <input type="text" class="form-control" value="<?php echo $univ ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">City</label>   
                                            <input type="text" class="form-control" value="<?php echo $daerah ?>" placeholder="" readonly>
                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Phone Number</label>   
                                            <input type="text" class="form-control" value="<?php echo $hp ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Birth Date</label>   
                                            <input type="text" class="form-control" value="<?php echo $ttl ?>" placeholder="" readonly>
                                            </div>
                                      
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Sex</label>   
                                            <input type="text" class="form-control" value="<?php if($jk=='L'){
                                                echo 'Male';
                                                }else{ echo 'Female';

                                                    } ?>" placeholder="" readonly>
                                            </div>
                                        
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">College Student Identity</label>   
                                            <input type="text" class="form-control" value="<?php echo $nim ?>" placeholder="" readonly>
                                            </div>
                                        
                                        </div>


                                    </div>
                                    
                                </form>
                        </div>
                       
                    </div>
                </div>
            
            </div>
        </div>
    </section>

    <div id="tab-container">
        <div class="container">
            
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header py-3 text-center bg-light text-primary"><b>Registration</b></h2>
                    </div>
                    <div class="col-md-12">
                        <ul id="tab1" class="nav nav-tabs">
                            <li class="nav-link""><a href="#KSN" data-toggle="tab">KSN</a></li>
                            <li class="nav-link"><a href="#KEN" data-toggle="tab">SEC</a></li>
                            <li class="nav-link"><a href="#KIS" data-toggle="tab">SIC</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="KSN">
                                <p>Kompetisi Statistika Nasional (KSN) is one of the competitions in The 13th Statistika Ria which can be joined by college students from a lot of universities in Indonesia. Kompetisi Statistika Nasional is intended to increase creativity, critical thinking to solve statistics problem extensively, and analytical skill carefully so that the participants will be able to make the best solutions.</p>
                                <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <a href="../guideline/KSN_Guideline.pdf" class="btn btn-primary">Download Guideline of KSN</a>
                                </div>
                                <div class="col-sm-4 col-md-4"> 
                                    <form method="POST" action="index.php" class="form-horizontal">
                                        <input type="submit" name="daftar-ksn" class="btn btn-primary" value="Register Now!" onclick="return confirm('Are you sure?');">
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="KEN">
                                <p> Statistics Essay Competition (SEC) is one of the competitions in The 13th Statistika Ria which is intended to increase insight and creativity of college students. Participants must write their ideas in scientific paper based on the theme of SEC. The participants are welcomed from all college students from different faculty in Indonesia and South East Asia region.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="../guideline/SEC_Guideline.pdf" class="btn btn-primary">Download Guideline of SEC</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="konfirmasi.php?kode_lomba=2" name=2 class="btn btn-primary">Register Now!</a>
                                    </div>

                                    <div class="col-md-7">
                                        <form name="confirmation" action="index.php" method="POST">
                                            <div class="col-md-3"></div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="id_ken" class="form-control" required="required" placeholder="Insert Participant ID">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <input type="submit" name="daftar-ken" class="btn btn-primary" value="JOIN">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                                

                            <div class="tab-pane fade" id="KIS">
                                <p>Statistics Infographics Competition (SIC) is one of the competitions in The 13th Statistika Ria which can be joined by all college students in Indonesia and South East Asia region. Participants can send infographics design based on the theme of SIC.</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="../guideline/SIC_Guideline.pdf" class="btn btn-primary">Download Guideline of SIC</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="konfirmasi.php?kode_lomba=3" class="btn btn-primary">Register Now!</a>
                                    </div>

                                    <div class="col-md-7">
                                        <form name="confirmation" action="index.php" method="POST">
                                            <div class="col-md-3"></div>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="id_kis" class="form-control" required="required" placeholder="Insert Participant ID">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <input type="submit" name="daftar-kis" class="btn btn-primary" value="JOIN">
                                            </div>
                                        </form>
                                    </div>

                            </div>
                                
                        </div>
                    </div>
                </div>
            
        </div>

    </div>
    <br>
    <br>
    <br>
    <?php 
        include 'daftar-ksn.php';
        include 'daftar-ken.php';
        include 'daftar-kis.php';
        include'footer.php';
    ?>
    <!--/#footer-->
    
</body>
</html>