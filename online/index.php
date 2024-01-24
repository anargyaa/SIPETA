<?php 

	include '../controller/conn.php';
	session_start();

	if (!isset($_SESSION['username'])) {
		header("Location: ../index.php?page=signin");
	}
?>


<!DOCTYPE html>
<html data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link href="../src/output.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/bb6d1abaef.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'navbaron.php'; ?>
	<div class="flex flex-col items-center justify-center">
	<?php
		if(isset($_GET["page"])){
			if($_GET["page"] == "../beranda"){
				include '../beranda.php';
			}
			elseif($_GET["page"] == "peta"){
				include 'peta.php';
			}
			elseif($_GET["page"] == "dashboard"){
				include 'dashboard.php';
			}
			elseif($_GET["page"] == "pengajuan"){
				include 'pengajuan.php';
			}
			elseif($_GET["page"] == "balasan"){
				include 'balasan.php';
			}
			elseif($_GET["page"] == "detail"){
				include 'detail.php';
			}
			elseif($_GET["page"] == "tambah"){
				include 'tambah.php';
			}
			elseif($_GET["page"] == "edit"){
				include 'edit.php';
			}
			elseif($_GET["page"] == "profile"){
				include 'profile.php';
			}
			elseif($_GET["page"] == "pengajuan-admin"){
				include 'pengajuan-admin.php';
			}
		}
		else{
			include 'dashboard.php';
		}
	?>
	</div>
	
	<?php include '../footer.php'; ?>
</body>
</html>