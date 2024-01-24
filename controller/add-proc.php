<?php

	include './conn.php';

	if (isset($_POST['konsultasi'])) {
		$nama		= $_POST['nama'];
		$email		= $_POST['email'];
		$telephone	= $_POST['telephone'];
		$topik		= $_POST['topik'];
		$pesan		= $_POST['pesan'];

		$stmt = $conn->query("SELECT * FROM user WHERE email = '$email'");
		if ($stmt->num_rows > 0) {
			$stmt 	= $conn->query("SELECT * FROM user WHERE email='$email'");
			header('location: ../index.php?halaman=konsultasi&pesan=berhasil');
			$row = mysqli_fetch_array($stmt);
			$id_user = $row['id_user'];
			$result = $conn->query("INSERT INTO konsultasi VALUES('', '$id_user', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp())");
			if ($result) {
				header('location: ../index.php?halaman=konsultasi&pesan=berhasil');
			} else {
				header('location: ../index.php?halaman=konsultasi&pesan=gagal');
			}
		} else {
			$result = mysqli_query($conn,"INSERT INTO konsultasi VALUES('', '0', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp())");
			if ($result) {
				echo "berhasil";
				header('location: ../index.php?halaman=konsultasi&pesan=berhasil');
			} else {
				echo "gagal";
			}
		}
	}

?>