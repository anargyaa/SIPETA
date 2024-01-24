<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">PROFILE</h1>
	<p class="text-center">Selamat datang di Halaman Profil Anda! Di sini, Anda dapat mengelola informasi pribadi Anda dan memastikan data profil Anda selalu terkini. Kami menghargai kehadiran Anda, dan kami ingin memastikan pengalaman Anda dengan kami tetap nyaman dan personal.</p>
</div>
<div class="w-7/12 h-fit my-12 p-4 flex flex-col gap-4 justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<div class="bg-base-100 p-2 rounded-2xl shadow-md">
		<form action="" method="get" accept-charset="utf-8" class="w-full flex flex-col gap-2">
			<div class="flex gap-4">
				<img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" class="w-52 h-52 rounded-full" />
				<div class="flex flex-col justify-center">
					<label class="form-control w-full">
					  <div class="label">
					    <span class="label-text">Nama Lengkap</span>
					  </div>
					  <input type="text" readonly class="input w-full" value="Jhone Doe" />
					</label>
					<div class="flex gap-2">
						<label class="form-control w-full">
						  <div class="label">
						    <span class="label-text">Telephone</span>
						  </div>
						  <input type="text" readonly class="input w-full" value="088888888" />
						</label>
						<label class="form-control w-full">
						  <div class="label">
						    <span class="label-text">Email</span>
						  </div>
						  <input type="text" readonly class="input w-full" value="jhonedoe@gmail.com" />
						</label>
					</div>
				</div>
			</div>
			<button class="btn btn-warning text-white hover:outline hover:outline-2 hover:outline-offset-2" value="tambah" name="tambah">Ganti Password</button>	
		</form>
	</div>

	<div class="bg-base-100 mt-6 p-2 rounded-2xl shadow-md">
		<form action="" method="get" accept-charset="utf-8" class="w-full">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password Lama</span>
			    <span class="label-text-alt">*Jika ingin ganti password masukan password lama</span>
			  </div>
			  <input type="text" readonly class="input input-bordered w-full" value="jhonedoe@gmail.com" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password Baru</span>
			    <span class="label-text-alt">*Buat password baru</span>
			  </div>
			  <input type="text" readonly class="input input-bordered w-full" value="jhonedoe@gmail.com" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Konfirmasi Password Baru</span>
			    <span class="label-text-alt">*Samakan dengan password baru</span>
			  </div>
			  <input type="text" readonly class="input input-bordered w-full" value="jhonedoe@gmail.com" />
			</label>
			<button class="mt-2 btn btn-warning text-white float-right hover:outline hover:outline-2 hover:outline-offset-2" value="ganti" name="ganti">Ganti</button>
		</form>
	</div>
</div>