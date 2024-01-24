<div class="section w-full mt-[22px] h-screen flex justify-center items-center">
	<div class="p-4 w-[400px] flex flex-col items-center bg-neutral-100 rounded-3xl shadow-2xl">
		<div class="bg-base-100 rounded-2xl p-2 w-full flex flex-col items-center shadow-md">
			<h1 class="font-bold text-xl my-2">SIGN IN</h1>
			<form action="controller/auth.php" method="post" class="w-full flex flex-col items-center">
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Email</span>
				  </div>
				  <input type="email" name="email" placeholder="Masukan email anda" class="input input-bordered w-full" />
				</label>
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Password</span>
				  </div>
				  <input type="password" name="password" placeholder="Masukan password anda" class="input input-bordered w-full" />
				</label>
				<button class="btn my-4 w-full hover:text-white hover:bg-info" value="login" name="login">Masuk</button>
				<a>Belum punya akun ?</a><a href="index.php?halaman=signup" class="text-blue-500 hover:underline">Buat Akun</a>
			</form>
		</div>
	</div>
</div>