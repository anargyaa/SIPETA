<?php
	if (isset($_GET['pesan'])) {
		if($_GET['pesan'] == 'berhasil'){
			echo "<script>u_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagal') {
			echo "<script>u_gagal()</script>";
		}
	}
?>

<div class="section w-full mt-[22px] h-screen flex justify-center items-center">
	<div class="py-6 px-4 w-[400px] flex flex-col items-center shadow-xl bg-white rounded-md">
		<h1 class="font-bold text-xl my-2">SIGN UP</h1>
		<form action="controller/auth.php" method="post" class="w-full flex flex-col items-center">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Lengkap</span>
			  </div>
			  <input type="text" name="namaL" required placeholder="Masukan email anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Email</span>
			  </div>
			  <input type="email" name="email" required placeholder="Masukan password anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password</span>
			  </div>
			  <input type="password" minlength="8" name="password" required placeholder="Masukan password anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Konfirmasi Password</span>
			  </div>
			  <input type="password" minlength="8" name="cpassword" required placeholder="Masukan password anda" class="input input-bordered w-full" />
			</label>
			<button class="btn my-4 w-full hover:text-white hover:bg-info" value="signup" name="signup">Daftar</button>
			<a>Sudah Punya Akun ?</a><a href="index.php?halaman=signin" class="text-blue-500 hover:underline">Masuk</a>
		</form>
	</div>
</div>