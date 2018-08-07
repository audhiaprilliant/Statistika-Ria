<?php 
	if (isset($_POST['upload_karya'])) {
		$source_file = $_FILES['karya']['tmp_name'];
		$nama_file = $_FILES['karya']['name'];
		$x = explode('.', $nama_file);
	    $ekstensi = strtolower(end($x));
	    $id_pendaftaran = $hasil['id_pendaftaran'];
	    $namabaru = 'SIC-'.$id_pendaftaran.'.'.$ekstensi;
	    $target_path = "../file_karya/" .$namabaru;
	    
		move_uploaded_file( $source_file, $target_path );
		$karya_sql = "UPDATE peserta_kis SET file_karya1='$namabaru' WHERE no_lomba = '$id_pendaftaran' ";
		mysqli_query($db, $karya_sql);
		echo "<script>alert('Infographics successfully uploaded.');
                window.location.href='kis.php';
                </script>";
	}
?>