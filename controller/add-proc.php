<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../phpmailer/src/PHPMailer.php';
	require '../phpmailer/src/SMTP.php';
	require '../phpmailer/src/Exception.php';
	include './conn.php';

	session_start();

	if (isset($_POST['tokenk']) && isset($_POST['konsultasi']) && $_POST['tokenk'] === $_SESSION['tokenk']) {
		$nama		= strip_tags($_POST['nama']);
		$email		= strip_tags($_POST['email']);
		$telephone	= strip_tags($_POST['telephone']);
		$topik		= strip_tags($_POST['topik']);
		$pesan		= strip_tags($_POST['pesan']);

		$stmt = $conn->query("SELECT * FROM user WHERE email = '$email'");
		$row = $stmt->fetch_assoc();
		$id_user = $row['id_user'];
		if ($stmt->num_rows > 0) {
			$result = $conn->query("INSERT INTO konsultasi VALUES('', '$id_user', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp(), 'Belum Dibaca')");
			if ($result) {
				$mail = new PHPMailer(true);
				try {
				    $mail->isSMTP();
				    $mail->Host = 'smtp.gmail.com';
				    $mail->SMTPAuth = true;
				    $mail->Username = 'reffa.kaila@gmail.com';
				    $mail->Password = 'cpxk qwrb vula rhxe';
				    $mail->SMTPSecure = 'tls';
				    $mail->Port = 587;

				    // Set informasi pengirim dan penerima
				    $mail->setFrom('dptrkab.sukabumi@gmail.com', 'Dinas Pertanahan dan Tata Ruang Kab.Sukabumi');
				    $mail->addAddress($email, $nama);

				    // Set subjek dan isi pesan email
				    $mail->Subject = 'Konsultasi Dinas Pertanahan dan Tata Ruang Kab.Sukabumi';
				    $mail->Body = 	'Topik yang anda kirimkan : ' . $topik . PHP_EOL . 
				    				'Pesan yang anda kirimkan : ' . $pesan . PHP_EOL . PHP_EOL . 
				    				'Terimakasih telah menggunakan jasa konsultasi kami, harap tunggu balasan dari kami lewat email yang anda kirimkan !';

				    // Kirim email
				    if ($mail->send()) {
						header('location: ../index.php?page=konsultasi&pesan=berhasil');
				    }
				} catch (Exception $e) {
					header('location: ../index.php?page=konsultasi&pesan=gagal');
				}
			} else {
				header('location: ../index.php?page=konsultasi&pesan=gagal');
			}
		} else {
			$result = $conn->query("INSERT INTO konsultasi VALUES('', '0', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp(), 'Belum Dibaca')");
			if ($result) {
				$mail = new PHPMailer(true);
				try {
				    $mail->isSMTP();
				    $mail->Host = 'smtp.gmail.com';
				    $mail->SMTPAuth = true;
				    $mail->Username = 'reffa.kaila@gmail.com';
				    $mail->Password = 'cpxk qwrb vula rhxe';
				    $mail->SMTPSecure = 'tls';
				    $mail->Port = 587;

				    // Set informasi pengirim dan penerima
				    $mail->setFrom('dptrkab.sukabumi@gmail.com', 'Dinas Pertanahan dan Tata Ruang Kab.Sukabumi');
				    $mail->addAddress($email, $nama);

				    // Set subjek dan isi pesan email
				    $mail->Subject = 'Konsultasi Dinas Pertanahan dan Tata Ruang Kab.Sukabumi';
				    $mail->Body = 	'Topik yang anda kirimkan : ' . $topik . PHP_EOL . 
				    				'Pesan yang anda kirimkan : ' . $pesan . PHP_EOL . 
				    				'Terimakasih telah menggunakan jasa konsultasi kami, harap tunggu balasan dari kami lewat email yang anda kirimkan !';

				    // Kirim email
				    $mail->send();
					header('location: ../index.php?page=konsultasi&pesan=berhasil');
				} catch (Exception $e) {
					header('location: ../index.php?page=konsultasi&pesan=gagal');
				}
			} else {
				header('location: ../index.php?page=konsultasi&pesan=gagal');
			}
		}
		unset($_SESSION['tokenk']);
	}

	elseif (!isset($_POST['tokenk']) || !isset($_SESSION['tokenk']) || $_POST['tokenk'] !== $_SESSION['tokenk']){
		header('location: ../index.php?page=konsultasi');
	}


?>