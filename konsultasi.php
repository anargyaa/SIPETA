<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">KONSULTASI</h1>
	<p class="text-center">Silahkan sampaikan pertanyaan atau permasalahan dengan mengisi form dibawah ini, dan jawaban akan disampaikan melalui email yang didaftarkan.</p>
</div>
<div class="w-8/12 h-fit my-12 p-4 bg-neutral-100 rounded-3xl shadow-2xl">
	<form action="./controller/add-proc.php" method="post" accept-charset="utf-8" class="bg-base-100 rounded-2xl p-4 shadow-md" >				
		<div class="grid grid-cols-4 grid-rows-5 gap-4">
		    <div class="h-fit col-span-4">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Nama Lengkap *</span>
				  </div>
				  <input type="text" placeholder="Type here" name="nama" required class="input input-bordered w-full" />
				</label>
		    </div>
		    <div class="h-fit col-span-2 row-start-2">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Email *</span>
				  </div>
				  <input type="text" placeholder="Type here" name="email" required class="input input-bordered w-full" />
				</label>
		    </div>
		    <div class="h-fit col-span-2 col-start-3 row-start-2">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Telephone</span>
				  </div>
				  <input type="text" placeholder="Type here" name="telephone" required class="input input-bordered w-full" />
				</label>
		    </div>
		    <div class="h-fit col-span-4 row-start-3">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Topik Konsultasi</span>
				  </div>
				  <select class="select select-bordered w-full" name="topik" required>
					<option value="all">Pilih topik</option>
					<option value="Cara Penggunaan Website">Cara Penggunaan Website</option>
					<option value="Cara Penggunaan Website">Persyaratan-persyaratan</option>
					<option value="Cara Penggunaan Website">Lainnya</option>
				  </select>
				</label>
		    </div>
		    <div class="h-fit col-span-4 row-start-4">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Pesan</span>
				  </div>
				  <textarea class="textarea textarea-bordered h-full w-full resize-none" name="pesan" required placeholder="Type here"></textarea>
				</label>
		    </div>
		    <div class="h-fit col-span-4 row-start-5">
		   		<button class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2 float-right" name="konsultasi" value="konsultasi">Kirim</button>
		    </div>
		</div>
	</form>
</div>