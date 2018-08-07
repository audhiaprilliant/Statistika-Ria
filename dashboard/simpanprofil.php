<?php
$error="";
if ($_SERVER['REQUEST_METHOD']=='POST'){

    $hp = mysqli_real_escape_string($db, $_POST['nomorhandphone']);
    $institusi = mysqli_real_escape_string($db, $_POST['institusi']);
    $daerah = mysqli_real_escape_string($db, $_POST['daerah']);
    $gender = mysqli_real_escape_string($db, $_POST['jk']);
    $birthday = mysqli_real_escape_string($db, $_POST['tgl_lahir']);
    $nim = mysqli_real_escape_string($db, $_POST['nim']);

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $nama_ktm = $_FILES['ktm']['name'];
    $nama_foto = $_FILES['foto']['name'];

    $x = explode('.', $nama_ktm);
    $y = explode('.', $nama_foto);

    $ekstensi1 = strtolower(end($x));
    $ekstensi2 = strtolower(end($y));

    $ukuranktm = $_FILES['ktm']['size'];
    $ukuranfoto = $_FILES['foto']['size'];

    $email = $_SESSION['login_user'];
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $hasil = mysqli_fetch_array(mysqli_query($db,$sql), MYSQLI_ASSOC);
    $nama_lengkap = $hasil['nama_lengkap'];

    
    if((in_array($ekstensi1, $ekstensi_diperbolehkan) === true) && (in_array($ekstensi2, $ekstensi_diperbolehkan) === true)){
        if(($ukuranktm < 1044070) && ($ukuranfoto < 1044070)){

            $query = "INSERT INTO peserta(email, nama_lengkap, no_hp, asal_univ, asal_daerah, jenis_kelamin, tanggal_lahir, nim, file_ktm, file_foto) VALUES ('$email', '$nama_lengkap', '$hp', '$institusi', '$daerah', '$gender' ,'$birthday', '$nim', '-', '-' )";

            if(mysqli_query($db, $query)){
                $no_peserta = mysqli_insert_id($db);
                $no_peserta = str_pad($no_peserta, 3, "0", STR_PAD_LEFT);

                $file_tmpktm = $_FILES['ktm']['tmp_name'];
                $file_tmpfoto = $_FILES['foto']['tmp_name'];

                $namabaruktm = $no_peserta.'-'.$nama_lengkap.'.'.$ekstensi1;
                $namabarufoto = $no_peserta.'-'.$nama_lengkap.'.'.$ekstensi2;

                $target_pathktm = "../images/ktm/" . $namabaruktm;
                $target_pathfoto = "../images/foto/" . $namabarufoto;

                move_uploaded_file($file_tmpktm, $target_pathktm);
                move_uploaded_file($file_tmpfoto, $target_pathfoto);

                $tambahfotoktm = "UPDATE peserta SET file_ktm ='$namabaruktm' , file_foto = '$namabarufoto' WHERE no_peserta = '$no_peserta'";

                if(mysqli_query($db, $tambahfotoktm)){
                    echo "<script>alert('$nama_lengkap profile successfully saved.');
                              window.location.href='index.php';
                              </script>";
                }
            }
            else{
                echo mysqli_error($db);
                echo "<script>alert('Error');
                              </script>";
            }
        }
        else {
            echo "<script>alert('File photo more than 1MB');
                              </script>";
        }
    }
    else {
        echo "<script>alert('Maximum file size 1MB and have extension jpg, jpeg, or png');
                              </script>";
        }
}  
?>