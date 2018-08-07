<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $speserta = mysqli_query($db, "select * from peserta where email = '$email'");
    $sid_upload = mysqli_fetch_array($speserta);
    $id_upload = $sid_upload['no_peserta'];

    if ($kompetisi == 2) {
        $skompetisi = mysqli_query($db,"select * from kompetisi where kode_lomba = 2" );
        $urutanlomba = mysqli_num_rows($skompetisi)+1;
        $urutanlomba = str_pad($urutanlomba, 3, "0", STR_PAD_LEFT);
        $id_pendaftaran = 'SR1302'.$urutanlomba;
        $tambahkompetisi = "INSERT INTO kompetisi(id_pendaftaran, kode_lomba, urutan_lomba) VALUES ('$id_pendaftaran', '2', '$urutanlomba')";
        
        $nama_foto = $_FILES['bukti_bayar']['name'];

        $x = explode('.', $nama_foto);

        $ekstensi1 = strtolower(end($x));
        
        $ukuranfoto = $_FILES['bukti_bayar']['size'];
        $file_tmpfoto = $_FILES['bukti_bayar']['tmp_name'];
        $namabarufoto = 'SEC-'.$id_pendaftaran.'.'.$ekstensi1;

        $target_pathfoto = "../images/bukti/" . $namabarufoto;

        if((in_array($ekstensi1, $ekstensi_diperbolehkan) === true)){
            if(($ukuranfoto < 1044070)){

            mysqli_query($db, $tambahkompetisi);
            move_uploaded_file($file_tmpfoto, $target_pathfoto);

            $tambahbukti = "INSERT INTO peserta_ken(no_lomba, status_pembayaran, bukti_bayar, id_upload) VALUES ('$id_pendaftaran', '1', '$namabarufoto', '$id_upload')";

            mysqli_query($db, $tambahbukti);

            echo "<script>alert('Payment receipt successfully upladed.');
                window.location.href='index.php';
                </script>";

            }
            else{
                echo "<script>alert('Maximum file size 1MB.');
                        </script>";
                }
        }
        else {
            echo "<script>alert('Please upload payment receipt with extension jpg, jpeg, atau png');
                    </script>";
        }
        
    }
    elseif ($kompetisi == 3){
        $skompetisi = mysqli_query($db,"select * from kompetisi where kode_lomba = 3" );
        $urutanlomba = mysqli_num_rows($skompetisi)+1;
        $urutanlomba = str_pad($urutanlomba, 3, "0", STR_PAD_LEFT);
        $id_pendaftaran = 'SR1303'.$urutanlomba;
        $tambahkompetisi = "INSERT INTO kompetisi(id_pendaftaran, kode_lomba, urutan_lomba) VALUES ('$id_pendaftaran', '3', '$urutanlomba')";
        
        $nama_foto = $_FILES['bukti_bayar']['name'];

        $x = explode('.', $nama_foto);

        $ekstensi1 = strtolower(end($x));

        $ukuranfoto = $_FILES['bukti_bayar']['size'];
        $file_tmpfoto = $_FILES['bukti_bayar']['tmp_name'];
        $namabarufoto = 'SIC-'.$id_pendaftaran.'.'.$ekstensi1;

        $target_pathfoto = "../images/bukti/" . $namabarufoto;

        if((in_array($ekstensi1, $ekstensi_diperbolehkan) === true)){
            if(($ukuranfoto < 1044070)){

            mysqli_query($db, $tambahkompetisi);
            move_uploaded_file($file_tmpfoto, $target_pathfoto);

            $tambahbukti = "INSERT INTO peserta_kis(no_lomba, status_pembayaran, bukti_bayar, id_upload) VALUES ('$id_pendaftaran', '1', '$namabarufoto', '$id_upload')";

            mysqli_query($db, $tambahbukti);

            echo "<script>alert('Payment receipt successfully uploaded');
                window.location.href='index.php';
                </script>";

            }
            else{
                echo "<script>alert('Maximum file size 1MB.');
                        </script>";
                }
        }
        else {
            echo "<script>alert('Please upload payment receipt with extension jpg, jpeg, atau png');
                    </script>";
        }

        }
}
?>