<?php 
    $speserta1 = mysqli_query($db, "SELECT * FROM kompetisi WHERE no_peserta1='$no_peserta' AND kode_lomba = '$kompetisi'");
    $speserta2 = mysqli_query($db, "SELECT * FROM kompetisi WHERE no_peserta2='$no_peserta' AND kode_lomba = '$kompetisi'");

    if(mysqli_num_rows($speserta1) == 1){
        $hasil = mysqli_fetch_array($speserta1, MYSQLI_ASSOC);
        $id_perlombaan = $hasil['id_pendaftaran'];
        $no_peserta2 = $hasil['no_peserta2'];
        
        if($no_peserta2 != 0){
            $qpeserta2 = "SELECT * FROM peserta where no_peserta='$no_peserta2'";
            $result = mysqli_fetch_array(mysqli_query($db, $qpeserta2), MYSQLI_ASSOC);
            $namaa = $result['nama_lengkap'] ;
            $emaill = $result['email'];
            $institusi = $result['asal_univ'];
            $daerah = $result['asal_daerah'];
            $no_hp = $result['no_hp'];
            $jk = $result['jenis_kelamin'];
            $nim = $result['nim'];
            $ttl = $result['tanggal_lahir'];
            $foto = $result['file_foto'];
        }
        else{
            $show = "style = 'display : none'";
        }
    }
    elseif(mysqli_num_rows($speserta1) == 0 && mysqli_num_rows($speserta2) == 1){

        $hasil = mysqli_fetch_array($speserta2, MYSQLI_ASSOC);
        $id_perlombaan = $hasil['id_pendaftaran'];
        $no_peserta1 = $hasil['no_peserta1'];

        if($no_peserta1 != 0){
            $qpeserta2 = "SELECT * FROM peserta where no_peserta='$no_peserta1'";
            $result = mysqli_fetch_array(mysqli_query($db, $qpeserta2), MYSQLI_ASSOC);
            $namaa = $result['nama_lengkap'] ;
            $emaill = $result['email'];
            $institusi = $result['asal_univ'];
            $daerah = $result['asal_daerah'];
            $no_hp = $result['no_hp'];
            $jk = $result['jenis_kelamin'];
            $nim = $result['nim'];
            $ttl = $result['tanggal_lahir'];
            $foto = $result['file_foto'];
        }
    }
?>