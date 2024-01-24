<style>
#map {
    z-index: 1;
    position: relative;
    height: 400px;
    width: 100%;
}
</style>
<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
    <h1 class="text-6xl text-center font-bold">PETA</h1>
    <p class="text-center">Lihat dan cari lokasi tanah yang sudah terdaftar di Kabupaten Sukabumi.</p>
</div>
<div class="w-8/12 min-h-screen mt-12 mb-12 p-4 flex flex-col rounded rounded-3xl bg-neutral-100 gap-10 shadow-xl">
        <?php 

            include 'controller/conn.php';

            $dataPerencanaan = [];
            $query = $conn->query("SELECT kelurahan, kecamatan, status FROM perencanaan");

            while ($tiap = $query->fetch_assoc()) {
                $dataPerencanaan[] = $tiap;
            }

        ?>

        <form action="" class="w-full p-4 flex justify-between rounded rounded-2xl shadow-md bg-base-100 gap-4">
            <div id="kelurahan">
                <div class="rounded rounded-2xl ">
                    <select id="kelurahanFilter" name="kelurahan" class="select select-bordered w-full rounded rounded-xl">
                        <option value="all">Kelurahan</option>
                        <?php 
                        $existingValues = [];
                        foreach ($dataPerencanaan as $data): 
                            if (!in_array($data['kelurahan'], $existingValues)) {
                                echo '<option value="' . $data['kelurahan'] . '">' . $data['kelurahan'] . '</option>';    
                                $existingValues[] = $data['kelurahan'];
                            }
                        endforeach; 
                        ?>
                    </select>
                </div>
            </div>
            <div id="kecamatan">
                <div class="rounded rounded-2xl ">
                    <select id="kecamatanFilter" name="kecamatan" class="select select-bordered w-full rounded rounded-xl">
                        <option value="all">Kecamatan</option>
                        <?php 
                        $existingValues = [];
                        foreach ($dataPerencanaan as $data): 
                            if (!in_array($data['kecamatan'], $existingValues)) {
                                echo '<option value="' . $data['kecamatan'] . '">' . $data['kecamatan'] . '</option>';    
                                $existingValues[] = $data['kecamatan'];
                            }
                        endforeach; 
                        ?>
                    </select>
                </div>
            </div>
            <div id="status">
                <div class="rounded rounded-2xl ">
                    <select id="statusFilter" name="status" class="select select-bordered w-full rounded rounded-xl">
                        <option value="all">Status</option>
                        <?php 
                        $existingValues = [];
                        foreach ($dataPerencanaan as $data): 
                            if (!in_array($data['status'], $existingValues)) {
                                echo '<option value="' . $data['status'] . '">' . $data['status'] . '</option>';    
                                $existingValues[] = $data['status'];
                            }
                        endforeach; 
                        ?>
                    </select>
                </div>
            </div>
            <div id="nama-instansi">
                <div class="rounded rounded-2xl ">
                    <input type="text" placeholder="Masukkan Nama Instansi" id="namaInstansiFilter"
                        class="input input-bordered w-full max-w-xs rounded rounded-xl" />
                </div>
            </div>
        </form>

        <div class="w-full bg-base-100 rounded-3xl p-2 shadow-md">
            <div id="map" class="rounded-2xl"></div>
        </div>

        <div id="dataInstansi" class="w-full p-4 rounded rounded-3xl shadow-md bg-base-100 flex flex-col">
            
        </div>
</div>

<?php include 'controller/peta.php'; ?>