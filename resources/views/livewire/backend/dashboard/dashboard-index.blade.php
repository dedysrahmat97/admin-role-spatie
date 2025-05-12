<div>
    <!-- Navbar -->
    @include('partials.backend.navbar', ['title' => $title])
    <div class="container mx-auto px-4">

        <!-- Statistik Penting -->
        <div class="grid grid-cols-2 gap-4">
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="text-lg font-semibold">100</p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Total Proyek</h5>
                    <p class="text-lg font-semibold">50</p>
                </div>
            </div>
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Total Donasi</h5>
                    <p class="text-lg font-semibold">Rp 10.000.000</p>
                </div>
            </div>
        </div>

        <!-- Grafik atau Chart -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Grafik Pertumbuhan Pengguna</h5>
                    <canvas id="userGrowthChart"></canvas>
                </div>
            </div>

            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Kalender</h5>
                    <p>Kalender akan ditampilkan di sini.</p>
                </div>
            </div>
        </div>

        <!-- Notifikasi atau Pengumuman -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Notifikasi</h5>
                    <ul class="list-disc pl-5">
                        <li>Notifikasi 1</li>
                        <li>Notifikasi 2</li>
                    </ul>
                </div>
            </div>

            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h5 class="card-title">Aktivitas Terbaru</h5>
                    <ul class="list-disc pl-5">
                        <li>Pengguna A menambahkan proyek baru</li>
                        <li>Pengguna B mengupdate profil</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Cepat -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="col-span-2">
                <button class="btn btn-primary mr-2">Tambah Proyek</button>
                <button class="btn btn-secondary">Tambah Pengguna</button>
            </div>
        </div>

        <!-- Daftar Aktivitas Terbaru -->
        <div class="grid grid-cols-2 gap-4 mt-6">

        </div>

        <!-- Kalender -->
        <div class="grid grid-cols-2 gap-4 mt-6">

        </div>
    </div>

</div>

<!-- Dummy Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr'],
            datasets: [{
                label: 'Pengguna',
                data: [10, 20, 30, 40],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        }
    });
</script>
