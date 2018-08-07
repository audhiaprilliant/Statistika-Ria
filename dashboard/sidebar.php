<?php 
    $no_peserta = $result['no_peserta'];
    $sqllomba = "SELECT * FROM kompetisi WHERE no_peserta1 = '$no_peserta' OR no_peserta2 = '$no_peserta' " ;
    $skompetisil = mysqli_query($db, $sqllomba);
    $kode_lombadia = "";
    if (mysqli_num_rows($skompetisil)!= 0){
        $kode_lombadia = array();
        while ($row = mysqli_fetch_array($skompetisil)) {
            $kode_lombadia[] = $row['kode_lomba'];
        }
    }
    else{
        $kode_lombadia = array();
    }

?>

<div class="py-5" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="index.php" class="active nav-link">
                <i class="fa fa-home fa-home"></i>&nbsp;Dashboard</a>
            </li>
            <li class="nav-item bg-light" <?php if(!in_array(1, $kode_lombadia)){echo "style = 'display : none' ";}?>><a class="nav-link" href="ksn.php">Dashboard KSN</a></li>
            <li class="nav-item bg-light" <?php if(!in_array(2, $kode_lombadia)){echo "style = 'display : none' ";}?>><a class="nav-link" href="ken.php">Dashboard SEC</a></li>
            <li class="nav-item bg-light" <?php if(!in_array(3, $kode_lombadia)){echo "style = 'display : none' ";}?>><a class="nav-link" href="kis.php">Dashboard SIC</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!--
<div class="col-md-2 col-sm-4">
    <div class="sidebar portfolio-sidebar">
        <div class="sidebar-item categories">
            <h3><strong><b>Menu</b></strong></h3>
            <ul class="nav navbar-stacked">
                <li><a href="index.php">Dashboard</a></li>
                <li <?php if(!in_array(1, $kode_lombadia)){echo "style = 'display : none' ";}?>><a href="ksn.php">Dashboard KSN</a></li>
                <li <?php if(!in_array(2, $kode_lombadia)){echo "style = 'display : none' ";}?>  ><a href="ken.php">Dashboard SEC</a></li>
                <li <?php if(!in_array(3, $kode_lombadia)){echo "style = 'display : none' ";}?>><a href="kis.php">Dashboard SIC</a></li>
            </ul>
        </div>
    </div>
</div>
-->