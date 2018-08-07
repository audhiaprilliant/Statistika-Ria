<?php 
	if (isset($_POST['upload_esai'])) {
		if ($_FILES['esai']['type'] == "application/pdf") {
		$source_file = $_FILES['esai']['tmp_name'];
		$nama_file = $_FILES['esai']['name'];
		$x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $id_pendaftaran = $hasil['id_pendaftaran'];
        $namabaru = 'SEC-'.$id_pendaftaran.".".$ekstensi;
        $target_path = "../file_esai/" .$namabaru;

		if (file_exists($target_path)) {
			echo "<script>alert('Error. You have uploaded an essay');
                window.location.href='ken.php';
                </script>";
		}
		else {
			move_uploaded_file( $source_file, $target_path );
			$esai_sql = "UPDATE peserta_ken SET file_esai='$namabaru' WHERE no_lomba = '$id_pendaftaran' ";
			mysqli_query($db, $esai_sql);
			echo "<script>alert('Essay successfully uploaded.');
                window.location.href='ken.php';
                </script>";
		}
	}
	else {
		if ( $_FILES['esai']['type'] != "application/pdf") {
			echo "<script>alert('File must be in PDF.');
                window.location.href='ken.php';
                </script>";
		}
	}
}
?>