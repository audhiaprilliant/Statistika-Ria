<?php 
    include "../connect.php";
    session_start();
     if(!isset($_SESSION['login_user'])){
      header("location: ../");
   } 
    
    $email = $_SESSION['login_user'];
    $sql = mysqli_query($db,"select * from peserta where email = '$email'" );
    $ps1 = mysqli_fetch_array($sql);
    $no_peserta = $ps1['no_peserta'];
    
    $show = "";
    $kompetisi = 3;
    include 'profil-2.php';

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
  <title>Statistics Infographics Competition</title>
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
                <h2 class="text-center mb-1 text-primary"><b><b>Dashboard SIC <?=@$nama?></b></b></h2>
            </div>
        </div>
    </div>
</div>

    <section id="peserta1" class="padding-top">
        <div class="container">
            <div class="row">
                <?php include'sidebar.php';?>

                <div class="col-md-10 col-sm-8">
                    <?php include'upload_karya.php';?>
                    <div class="panel panel-primary " >
                        <div class="panel-body">
                            <form class="form-horizontal">
                             <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group" style="margin : 10px">
                                    <label for="inputtext">Participant ID</label>   
                                    <input type="text" class="form-control" value="<?php echo $id_perlombaan; ?>" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 ol-sm-12">
                                    <div class="form-group" style="margin : 10px">
                                    <label for="inputtext1">Competition Status</label>   
                                    <input type="text" class="form-control" value="Active" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " <?=@$show?> >   
                        <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h2 class="page-header text-primary"><b>Your partner profile</b></h2>
                        </div>
                        <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="col-md-3">
                                        <div class="portfolio-single">
                                            <div class="portfolio-thumb">
                                                <img src="../images/foto/<?php echo $result['file_foto'];?> " class="img-responsive" width="120" height="120">
                                        
                                            </div>
                                            <div class="portfolio-view">
                                                <ul class="nav nav-pills">
                                                    <li><a href="../images/foto/<?php echo $foto;?>" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext">Full Name</label>   
                                            <input type="text" class="form-control" value="<?php echo $namaa ?>" placeholder="" readonly>
                                            </div>
                                        </div>    
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">Email</label>   
                                            <input type="text" class="form-control" value="<?php echo $emaill ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group" style="margin : 10px">
                                            <label for="inputtext1">University</label>   
                                            <input type="text" class="form-control" value="<?php echo $institusi ?>" placeholder="" readonly>
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
                                            <input type="text" class="form-control" value="<?php echo $no_hp ?>" placeholder="" readonly>
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
                                            <label for="inputtext1">College Student Identity Number</label>   
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
                <div class="col-md-2 col-sm-4"></div>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >                        
                        <div class="panel-body">
                            <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="text-center mb-1 text-primary py-3 bg-light"><b>Answer Sheet Template of SIC</b></h2>
                            </div>
                            <div align='left'>
                                <div class="col-md-4">
                                    <a href="Template/Template SIC.docx" class="btn btn-primary">Download Answer Sheet Template KIS here! </a>
                                </div>
                                <br>
                                <h3>Footers for both landscape and portrait layouts can be downloaded at 10th August 2018</h3>
                                <div class="col-md-4">
                                    <a href="" class="btn btn-primary">Download Footer Landscape</a>
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <a href="" class="btn btn-primary">Download Footer Portrait </a>
                                </div>
                            </div>
                        </div>                    
                  
                    </div>
                </div>
                <div class="col-md-2 col-sm-4"></div>
                <div class="col-md-10 col-sm-8">
                    <div class="panel panel-primary " >                   
                        <div class="panel-body">
                            <br>
                            <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="text-center mb-1 text-primary py-3 bg-light"><b>Infographic Submission</b></h2>
                            </div>
                        
                            <form class="form-horizontal" enctype="multipart/form-data" action="kis.php" method="post">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group" style="margin : 10px">
                                        <label for="">File must be in PDF and can update by re-upload</label>   
                                        <!--
                                        <input type="file" name="karya">
                                        <input type="submit" name="upload_karya" class="btn btn-primary" value="Upload">
                                        -->
                                        </div>

                                </div>
                                <div class="col-md-4"></div>
                            </form>
                        </div>                   
                    </div>
                </div>            
                </div>
                
            </div>
        </div>
    </section>
<br>


    <?php 
    include'footer.php';
     ?>
    <!--/#footer-->
</body>
</html>        