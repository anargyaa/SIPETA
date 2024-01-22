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
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-7/12">
            <form action="" class="mt-24 mb-12 p-4 flex justify-between rounded rounded-3xl shadow-xl bg-neutral-100">
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
                            class="input input-bordered w-full max-w-xl rounded rounded-xl" />
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full flex justify-center py-10 bg-yellow-900">
            <div class="w-7/12 bg-neutral-100 rounded-3xl p-2 shadow-xl">
                <div id="map" class="rounded-2xl"></div>
            </div>
        </div>

        <div class="w-7/12">
            <div class="mt-12 mb-12 p-4 rounded rounded-3xl shadow-xl bg-neutral-100">
                <h2>Nama Instansi</h2>
                <h2>Pimpinan Instansi</h2>
                <h2>Perkiraan Panjang</h2>
                <h2>Perkiraan Luas</h2>
                <h2>Perkiraan Alokasi</h2>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testing";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = "SELECT nama_instansi, koordinat_lintang, koordinat_bujur, kelurahan, kecamatan, status FROM instansi";
        $result = mysqli_query($conn, $sql);

        $locations = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $locations[] = array(
                    'nama_instansi' => $row['nama_instansi'],
                    'lat' => $row['koordinat_lintang'],
                    'lng' => $row['koordinat_bujur'],
                    'kelurahan' => $row['kelurahan'],
                    'kecamatan' => $row['kecamatan'],
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

        function initMap() {
            var center = { lat: -6.265757, lng: 106.800000 };
            map = L.map('map').setView(center, 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Tampilkan semua marker pada saat halaman dimuat
            displayMarkers();

            // Atur event listener untuk form filter
            document.getElementById('kelurahanFilter').addEventListener('change', applyFilter);
            document.getElementById('kecamatanFilter').addEventListener('change', applyFilter);
            document.getElementById('statusFilter').addEventListener('change', applyFilter);
            document.getElementById('namaInstansiFilter').addEventListener('input', applyFilter);
        }

        function displayMarkers() {
            // Hapus semua marker yang ada
            clearMarkers();

            var locations = <?php echo json_encode($locations); ?>;

            // Tambahkan kembali marker sesuai data terbaru
            for (var i = 0; i < locations.length; i++) {
                addMarker(locations[i]);
            }
        }

        function addMarker(location) {
            var markerColor = location.status === 'Aktif' ? 'green' : 'red';

            var marker = L.marker([location.lat, location.lng], {
                icon: L.AwesomeMarkers.icon({
                    icon: 'info-sign',
                    markerColor: markerColor
                })
            }).addTo(map);

            marker.bindPopup(
                'Instansi: ' + location.nama_instansi + '<br>' +
                'Kelurahan: ' + location.kelurahan + '<br>' +
                'Kecamatan: ' + location.kecamatan + '<br>' +
                'Status: ' + location.status
            );

            markers.push(marker);
        }

        function clearMarkers() {
            // Hapus semua marker yang ada dari peta
            for (var i = 0; i < markers.length; i++) {
                map.removeLayer(markers[i]);
            }

            // Bersihkan array marker
            markers = [];
        }

        function applyFilter() {
            // Dapatkan nilai dari elemen form
            var kelurahan = document.getElementById('kelurahanFilter').value;
            var kecamatan = document.getElementById('kecamatanFilter').value;
            var status = document.getElementById('statusFilter').value.toLowerCase();
            var namaInstansi = document.getElementById('namaInstansiFilter').value.toLowerCase();

            // Hapus semua marker yang ada
            clearMarkers();

            var locations = <?php echo json_encode($locations); ?>;

            // Tambahkan kembali marker sesuai dengan data terbaru dan kriteria filter
            for (var i = 0; i < locations.length; i++) {
                var location = locations[i];
                var matchFilter = false;

                // Periksa kondisi untuk setiap filter
                if (kelurahan === 'all' || kelurahan === location.kelurahan) {
                    if (kecamatan === 'all' || kecamatan === location.kecamatan) {
                        if (status === 'all' || status === location.status.toLowerCase()) {
                            if (namaInstansi === '' || location.nama_instansi.toLowerCase().includes(namaInstansi)) {
                                matchFilter = true;
                            }
                        }
                    }
                }

                // Tambahkan marker jika memenuhi kriteria filter
                if (matchFilter) {
                    addMarker(location);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', initMap);
    </script>

</body>
</html>