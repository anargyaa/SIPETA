<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">PENGAJUAN</h1>
	<p class="text-center">Selamat datang di Halaman Pengajuan Tanah! Berikut adalah ringkasan pengajuan tanah yang telah Anda kirimkan. Pantau status setiap pengajuan dan temukan kemudahan akses ke halaman tambah pengajuan tanah.</p>
</div>

<div class="w-7/12 h-fit mb-12 p-4 flex flex-col gap-4 justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<form action="" class="w-full p-4 flex justify-between rounded rounded-2xl shadow-md bg-base-100 gap-4">
	    <div id="kelurahan">
	        <div class="rounded rounded-2xl ">
	            <select id="kelurahanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
	                <option value="all">Kecamatan</option>
	                <option value="Ciampea">Ciampea</option>
	                <option value="Leuwiliang">Leuwiliang</option>
	            </select>
	        </div>
	    </div>
	    <div id="kecamatan">
	        <div class="rounded rounded-2xl ">
	            <select id="kecamatanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
	                <option value="all">Kategori Proyek</option>
	                <option value="Ciampea">PSN</option>
	                <option value="Cibungbulang">Non-PSN</option>
	            </select>
	        </div>
	    </div>
	    <div id="status">
	        <div class="rounded rounded-2xl ">
	            <select id="statusFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
	                <option value="all">Status</option>
	                <option value="Aktif">Aktif</option>
	                <option value="Non-Aktif">Non-Aktif</option>
	            </select>
	        </div>
	    </div>
	    <div id="nama-instansi">
	        <div class="rounded rounded-2xl ">
	            <input type="text" placeholder="Cari dengan data apa saja" id="namaInstansiFilter"
	                class="input input-bordered w-full max-w-xs rounded rounded-xl" />
	        </div>
	    </div>
	</form>

	<div class="overflow-x-auto w-full bg-base-100 rounded-2xl p-2 shadow-md">
	  <table class="table">
	    <thead>
	      <tr>
	        <th></th>
	        <th>Nama Instansi</th>
	        <th>Pimpinan Instansi</th>
	        <!-- <th>Peruntukan</th> -->
	        <th>Kategori Proyek</th>
	        <!-- <th>Kelurahan</th> -->
	        <!-- <th>Kecamatan</th> -->
	        <!-- <th>Koordinat Lintang</th> -->
	        <!-- <th>Koordinat Bujur</th> -->
	        <th>Lokasi</th>
	        <th>Status</th>
	        <th>Aksi</th>
	        <!-- <th>Rencana Tata Ruang</th> -->
	        <!-- <th>Perkiraan Luas</th> -->
	        <!-- <th>Perkiraan Panjang</th> -->
	        <!-- <th>Perkiraan Alokasi</th> -->
	        <!-- <th>Mulai Persiapan</th> -->
	        <!-- <th>Mulai Pelaksanaan</th> -->
	        <!-- <th>Dokumen</th> -->
	        <!-- <th>Keterangan</th> -->
	      </tr>
	    </thead>
	    <tbody>
	      <tr class="hover">
	        <th>1</th>
	        <td>Cy Ganderton</td>
	        <td>Quality Control Specialist</td>
	        <td>Blue</td>
	        <td><textarea class="w-full h-auto resize-none">asdasd</textarea></td>
	        <td>Aktif</td>
	        <td><a href="" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Detail</a></td>
	      </tr>
	    </tbody>
	  </table>
	</div>
	<button class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2" value="tambah" name="tambah">Pengajuan</button>
</div>