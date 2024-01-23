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
			if($_GET["page"] == "beranda"){
				include 'beranda.php';
			}
			elseif($_GET["page"] == "peta"){
				include 'peta.php';
			}
			elseif($_GET["page"] == "konsultasi"){
				include 'konsultasi.php';
			}
			elseif($_GET["page"] == "signin"){
				include 'signin.php';
			}
			elseif($_GET["page"] == "signup"){
				include 'signup.php';
			}
		}
		else{
			include 'beranda.php';
		}
	?>
	</div>
	
	<?php include 'footer.php'; ?>
</body>
</html>