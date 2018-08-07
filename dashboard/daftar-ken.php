<?php
if(isset($_POST['daftar-ken'])){
	$id_ken = mysqli_real_escape_string($db, $_POST['id_ken']);
	$no_peserta = $result['no_peserta'];
	$skompetisi = mysqli_query($db, "SELECT * FROM kompetisi WHERE id_pendaftaran = '$id_ken'");
	if(mysqli_num_rows($skompetisi)!=0){
		$hasilkom = mysqli_fetch_array($skompetisi, MYSQLI_ASSOC);
		$no_peserta1 = $hasilkom['no_peserta1'];
		$no_peserta2 = $hasilkom['no_peserta2'];

		if ($no_peserta1 == 0) {
			$query = "UPDATE kompetisi SET no_peserta1 = '$no_peserta' WHERE id_pendaftaran = '$id_ken' ";
			mysqli_query($db, $query);
			echo "<script>alert('Congratulation, you have been registered in Statistics Essay Competition!');
							window.location.href='ken.php';
                              </script>";
		}
		elseif ($no_peserta2 == 0) {
			$query = "UPDATE kompetisi SET no_peserta2 = '$no_peserta' WHERE id_pendaftaran = '$id_ken' ";
			mysqli_query($db, $query);
			echo "<script>alert('Congratulation, you have been registered in Statistics Essay Competition!');
							window.location.href='ken.php';
                              </script>";
		}
		elseif (($no_peserta1 != 0) && ($no_peserta2 != 0)) {
			echo "<script>alert('Sorry, team has been consisted 2 persons.');
                              </script>";
		}
	}
	else{
		echo "<script>alert('There is no competition ID.');
                              </script>";
	}
}
?>