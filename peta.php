<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="./src/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bb6d1abaef.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.awesome-markers/dist/leaflet.awesome-markers.css" />

    <style>
        #map {
            z-index: 1;
            position: relative;
            height: 400px;
            width: 100%;
        }
    </style>
</head>


<body>
    <?php include 'navbar.php'; ?>
    <div class="flex min-h-screen items-center justify-center min-h-screen">
        <div class="w-8/12 min-h-screen my-24 p-4 flex flex-col rounded rounded-3xl bg-neutral-100 gap-10 shadow-xl">
                <form action="" class="w-full p-4 flex justify-between rounded rounded-2xl shadow-md bg-neutral-200 gap-4">
                    <div id="kelurahan">
                        <div class="rounded rounded-2xl ">
                            <select id="kelurahanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                                <option value="all">Semua Kelurahan</option>
                                <option value="Leweung Kolot">Leweung Kolot</option>
                                <option value="Cikampak">Cikampak</option>
                            </select>
                        </div>
                    </div>
                    <div id="kecamatan">
                        <div class="rounded rounded-2xl ">
                            <select id="kecamatanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                                <option value="all">Kecamatan</option>
                                <option value="Ciampea">Ciampea</option>
                                <option value="Cibungbulang">Cibungbulang</option>
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
                            <input type="text" placeholder="Masukkan Nama Instansi" id="namaInstansiFilter"
                                class="input input-bordered w-full max-w-xs rounded rounded-xl" />
                        </div>
                    </div>
                </form>

                <div class="w-full bg-neutral-200 rounded-3xl p-2 shadow-md">
                    <div id="map" class="rounded-2xl"></div>
                </div>

                <div id="dataInstansi" class="w-full p-4 rounded rounded-3xl shadow-md bg-neutral-200 flex flex-col">
                    
                </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sipetas";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM perencanaan";
        $result = mysqli_query($conn, $sql);

        $locations = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $locations[] = array(
                    'nama_instansi' => $row['nama_i'],
                    'pimpinan_instansi' => $row['pimpinan_i'],
                    'peruntukan' => $row['peruntukan'],
                    'kategori_proyek' => $row['kategori_proyek'],
                    'kelurahan' => $row['kelurahan'],
                    'kecamatan' => $row['kecamatan'],
                    'lat' => $row['koordinat_l'],
                    'lng' => $row['koordinat_b'],
                    'lokasi' => $row['lokasi'],
                    'rencana_tr' => $row['rencana_tr'],
                    'perkiraan_l' => $row['perkiraan_l'],
                    'perkiraan_p' => $row['perkiraan_p'],
                    'perkiraan_a' => $row['perkiraan_a'],
                    'm_persiapan' => $row['m_persiapan'],
                    'm_pelaksanaan' => $row['m_pelaksanaan'],
                    'status' => $row['status']
                );
            }
        }

        mysqli_close($conn);
    ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.awesome-markers/dist/leaflet.awesome-markers.js"></script>

    <script>
        var map;
        var markers = [];
        var locations = <?php echo json_encode($locations); ?>;

        function initMap() {
            var center = { lat: -6.265757, lng: 106.800000 };
            map = L.map('map').setView(center, 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            displayMarkers();

            document.getElementById('kelurahanFilter').addEventListener('change', applyFilter);
            document.getElementById('kecamatanFilter').addEventListener('change', applyFilter);
            document.getElementById('statusFilter').addEventListener('change', applyFilter);
            document.getElementById('namaInstansiFilter').addEventListener('input', applyFilter);
        }

        function createPopupContent(location) {
            return `
                <div class="flex flex-col">
                    <h2>Instansi: ${location.nama_instansi}</h2>
                    <h2>Kelurahan: ${location.kelurahan}</h2>
                    <h2>Kecamatan: ${location.kecamatan}</h2>
                    <h2>Koordinat Lintang: ${location.lat}&deg;</h2>
                    <h2>Koordinat Bujur: ${location.lng}&deg;</h2>
                    <h2>Status: ${location.status}</h2>
                    <button onclick="handleButtonClick('${location.nama_instansi}')" class="btn btn-info text-white">Lihat Detail</button>
                </div>`;
        }

        function addMarker(location) {
            var markerColor = location.status === 'Aktif' ? 'green' : 'red';

            var marker = L.marker([location.lat, location.lng], {
                icon: L.AwesomeMarkers.icon({
                    icon: 'info-sign',
                    markerColor: markerColor
                })
            }).addTo(map);

            marker.bindPopup(createPopupContent(location));

            markers.push(marker);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                map.removeLayer(markers[i]);
            }
            markers = [];
        }

        function displayMarkers() {
            clearMarkers();
            for (var i = 0; i < locations.length; i++) {
                addMarker(locations[i]);
            }
        }

        function applyFilter() {
            clearMarkers();

            var kelurahan = document.getElementById('kelurahanFilter').value;
            var kecamatan = document.getElementById('kecamatanFilter').value;
            var status = document.getElementById('statusFilter').value.toLowerCase();
            var namaInstansi = document.getElementById('namaInstansiFilter').value.toLowerCase();

            for (var i = 0; i < locations.length; i++) {
                var location = locations[i];
                var matchFilter = false;

                if (kelurahan === 'all' || kelurahan === location.kelurahan) {
                    if (kecamatan === 'all' || kecamatan === location.kecamatan) {
                        if (status === 'all' || status === location.status.toLowerCase()) {
                            if (namaInstansi === '' || location.nama_instansi.toLowerCase().includes(namaInstansi)) {
                                matchFilter = true;
                            }
                        }
                    }
                }

                if (matchFilter) {
                    addMarker(location);
                }
            }
        }

        function handleButtonClick(namaInstansi) {
            var location = findLocationByName(namaInstansi);
            var dataInstansiDiv = document.getElementById('dataInstansi');

            if (location) {
                dataInstansiDiv.innerHTML = `
                    <div class="grid grid-cols-6 grid-rows-6 gap-4">
                        <div class="col-span-3">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Nama Instansi</span>
                              </div>
                              <input type="text" readonly value="${location.nama_instansi}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 col-start-4">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Nama Pimpinan Instansi</span>
                              </div>
                              <input type="text" readonly value="${location.pimpinan_instansi}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 row-start-2">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Peruntukan</span>
                              </div>
                              <input type="text" readonly value="${location.peruntukan}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-2">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Kategori Proyek</span>
                              </div>
                              <input type="text" readonly value="${location.kategori_proyek}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 row-span-2 row-start-3">
                            <label class="form-control w-full h-full">
                              <div class="label">
                                <span class="label-text">Lokasi</span>
                              </div>
                              <textarea class="textarea textarea-bordered h-full resize-none" readonly>${location.lokasi}</textarea>
                            </label>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-3">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Rencana Tata Ruang</span>
                              </div>
                              <input type="text" readonly value="${location.rencana_tr}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-4">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Status</span>
                              </div>
                              <input type="text" readonly value="${location.status}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-2 row-start-5">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Perkiraan Luas</span>
                              </div>
                              <input type="text" readonly value="${location.perkiraan_l}m&sup2" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-2 col-start-3 row-start-5">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Perkiraan Panjang</span>
                              </div>
                              <input type="text" readonly value="${location.perkiraan_p}m" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-2 col-start-5 row-start-5">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Perkiraan Alokasi</span>
                              </div>
                              <input type="text" readonly value="${location.perkiraan_a}m&sup2" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 row-start-6">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Tanggal Mulai Persiapan</span>
                              </div>
                              <input type="text" readonly value="${location.m_persiapan}" class="input input-bordered w-full" />
                            </label>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-6">
                            <label class="form-control w-full">
                              <div class="label">
                                <span class="label-text">Tanggal Mulai Pelaksanaan</span>
                              </div>
                              <input type="text" readonly value="${location.m_pelaksanaan}" class="input input-bordered w-full" />
                            </label>
                        </div>
                    </div>`
            } else {
                dataInstansiDiv.innerHTML = 'Data tidak ditemukan';
            }
        }

        function findLocationByName(namaInstansi) {
            return locations.find(function (location) {
                return location.nama_instansi === namaInstansi;
            });
        }

        document.addEventListener('DOMContentLoaded', initMap);
    </script>

</body>
</html>
        