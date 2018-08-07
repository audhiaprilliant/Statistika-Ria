<?php
if(isset($_POST['daftar-ksn'])){

    $email = $_SESSION['login_user'];
    $sql = mysqli_query($db,"select * from peserta where email = '$email'" );
    $result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $nama_lengkap = rtrim($result['nama_lengkap']);
    $no_peserta = $result['no_peserta'];
    $speserta = mysqli_query($db, "select * from kompetisi where kode_lomba = 1 and no_peserta1 = '$no_peserta'");

    if(mysqli_num_rows($speserta)==0){
        $skompetisi = mysqli_query($db,"select * from kompetisi where kode_lomba = 1" );
        $urutanlomba = mysqli_num_rows($skompetisi)+1;
        $urutanlomba = str_pad($urutanlomba, 3, "0", STR_PAD_LEFT);
        $id_pendaftaran = 'SR1301'.$urutanlomba.$no_peserta;

        $tambahkompetisi = "INSERT INTO kompetisi(id_pendaftaran, no_peserta1, kode_lomba, urutan_lomba) VALUES ('$id_pendaftaran', '$no_peserta', '1', '$urutanlomba')";

        $ptambah = mysqli_query($db, $tambahkompetisi);

        if($ptambah === true){
            $tambahpesertaksn = "INSERT INTO peserta_ksn(no_lomba) VALUES ('$id_pendaftaran')";
            mysqli_query($db, $tambahpesertaksn);
            echo "<script>alert('Congratulation, $nama_lengkap has been registered in Kompetisi Statistika Nasional!');
                                  window.location.href='ksn.php';
                                  </script>";
        }
        else{
            mysqli_error($db);
        }
    }
    else{
        echo "<script>alert('$nama_lengkap has been registered in Kompetisi Statistika Nasional!');
            window.location.href='index.php';
            </script>";
    }
}
?>