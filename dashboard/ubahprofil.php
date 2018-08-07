<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $nama = mysqli_real_escape_string($db, rtrim($_POST['nama']));
    $hp = mysqli_real_escape_string($db, $_POST['nomorhandphone']);
    $institusi = mysqli_real_escape_string($db, $_POST['institusi']);
    $daerah = mysqli_real_escape_string($db, $_POST['daerah']);
    $gender = mysqli_real_escape_string($db, $_POST['jk']);
    $birthday = mysqli_real_escape_string($db, $_POST['tgl_lahir']);
    $nim = mysqli_real_escape_string($db, $_POST['nim']);

    $email = $_SESSION['login_user'];
    $sql = "SELECT * FROM peserta WHERE email = '$email'";
    $hasil = mysqli_fetch_array(mysqli_query($db,$sql), MYSQLI_ASSOC);
    $no_peserta = $hasil['no_peserta'];
    
    $query = "UPDATE peserta SET nama_lengkap = '$nama' ,no_hp = '$hp', asal_univ = '$institusi', asal_daerah = '$daerah', jenis_kelamin = '$gender', tanggal_lahir = '$birthday', nim = '$nim' WHERE no_peserta = '$no_peserta'";

    if(mysqli_query($db, $query)){
        if (isset($_FILES['ktm'])){

        $nama_ktm = $_FILES['ktm']['name'];

        $x = explode('.', $nama_ktm);

        $ekstensi1 = strtolower(end($x));

        $ukuranktm = $_FILES['ktm']['size'];
        $file_tmpktm = $_FILES['ktm']['tmp_name'];
        $namabaruktm = $no_peserta.'-'.$nama.'.'.$ekstensi1;

        $target_pathktm = "../images/ktm/" . $namabaruktm;

        if(file_exists($target_pathktm)) {
            chmod($target_pathktm, 0777);
            unlink($target_pathktm); //remove the file
        }
        move_uploaded_file($file_tmpktm, $target_pathktm);
        $tambahfotoktm = "UPDATE peserta SET file_ktm ='$namabaruktm' WHERE no_peserta = '$no_peserta'";
        mysqli_query($db, $tambahfotoktm);

        echo "<script>alert('$nama 's profile successfully updated.');
            window.location.href='index.php';
            </script>";
        }
        else{
            echo "<script>alert('$nama 's profile successfully updated.');
            window.location.href='index.php';
            </script>"; 
        }
     }
    }  
?>