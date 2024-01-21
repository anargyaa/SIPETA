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

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="flex flex-col items-center justify-center">
        <div class="min-h-screen">
            <form action="" class="my-24 p-2 rounded rounded-3xl shadow shadow-xl bg-neutral-100">
                <div class="flex gap-2">
                    <div id="kelurahan">
                        <div class="rounded rounded-2xl p-2">
                            <select id="kelurahanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                                <option disabled selected>Kelurahan</option>
                                <option>Leweungkolot</option>
                                <option>Cikampak</option>
                            </select>
                        </div>
                    </div>
                    <div id="kecamatan">
                        <div class="rounded rounded-2xl p-2">
                            <select id="kecamatanFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                                <option disabled selected>Kecamatan</option>
                                <option>Ciampea</option>
                                <option>Cibungbulang</option>
                            </select>
                        </div>
                    </div>
                    <div id="status">
                        <div class="rounded rounded-2xl p-2">
                            <select id="statusFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                                <option disabled selected>Status</option>
                                <option>Dalam proses</option>
                                <option>Terdaftar</option>
                            </select>
                        </div>
                    </div>
                    <div id="nama-instansi">
                        <div class="rounded rounded-2xl p-2">
                            <input type="text" placeholder="Masukkan Nama Instansi" id="namaInstansiFilter"
                                class="input input-bordered w-full max-w-xs rounded rounded-xl" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


	<footer class="footer p-10 bg-yellow-900 text-neutral-content">
	  <aside>
	    <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
	    <p>Anargya :)<br/>Make by instinc</p>
	  </aside> 
	  <nav>
	    <header class="footer-title">Social</header> 
	    <div class="grid grid-flow-col gap-4">
	      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
	      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
	      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
	    </div>
	  </nav>
	</footer>

</body>
</html>