<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Hafalan Quran Digital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Login Container -->
    <div id="loginContainer" class="login-container">
        <h2>Login</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

    <!-- Main Container (Dashboard) -->
    <div id="mainContainer" class="container" style="display: none;">
        <!-- Theme Switcher -->
        <div class="theme-switcher">
            <button class="theme-btn light active" data-theme="light"><i class="fas fa-sun"></i></button>
            <button class="theme-btn dark" data-theme="dark"><i class="fas fa-moon"></i></button>
        </div>

        <!-- Side Navigation -->
        <nav class="side-nav">
            <div class="nav-header">
                <img src="logo.png" alt="Quran Logo" class="nav-logo">
                <h2 class="app-title">QuranMem</h2>
            </div>

            <ul class="nav-menu">
                <li class="nav-item active"><a href="#dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#hafalan"><i class="fas fa-book-open"></i> Hafalan</a></li>
                <li class="nav-item"><a href="#statistik"><i class="fas fa-chart-pie"></i> Statistik</a></li>
                <li class="nav-item"><a href="#laporan"><i class="fas fa-file-alt"></i> Laporan</a></li>
                <li class="nav-item"><a href="#pengaturan"><i class="fas fa-cog"></i> Pengaturan</a></li>
            </ul>

            <div class="nav-footer">
                <div class="user-profile">
                    <img src="user.jpg" alt="Profil Pengguna">
                    <div class="profile-info">
                        <h4 id="usernamePlaceholder"></h4>
                        <p>Level: 12</p>
                    </div>
                </div>
                <button class="btn logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-grid">
                    <!-- Progress Overview -->
                    <div class="card full-width">
                        <h3 class="card-title">Progress Hafalan</h3>
                        <div class="progress-chart">
                            <canvas id="progressChart"></canvas>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="stats-grid">
                        <div class="stat-card success">
                            <i class="fas fa-check-circle"></i>
                            <div class="stat-info">
                                <h4>Hafalan Terselesaikan</h4>
                                <p>125 Surah</p>
                            </div>
                        </div>
                        <div class="stat-card warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div class="stat-info">
                                <h4>Hafalan Perlu Diulang</h4>
                                <p>15 Surah</p>
                            </div>
                        </div>
                        <div class="stat-card primary">
                            <i class="fas fa-calendar-alt"></i>
                            <div class="stat-info">
                                <h4>Target Bulan Ini</h4>
                                <p>5 Juz</p>
                            </div>
                        </div>
                        <div class="stat-card error">
                            <i class="fas fa-times-circle"></i>
                            <div class="stat-info">
                                <h4>Hafalan Tertunda</h4>
                                <p>3 Surah</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="card activity-feed">
                        <h3 class="card-title">Aktivitas Terakhir</h3>
                        <ul class="activity-list">
                            <li class="activity-item">
                                <i class="fas fa-check-circle success"></i>
                                <div class="activity-info">
                                    <p>Menambahkan hafalan Surah Al-Fatihah</p>
                                    <small>2 jam yang lalu</small>
                                </div>
                            </li>
                            <!-- 9 item aktivitas lainnya -->
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Hafalan Section -->
            <section id="hafalan" class="content-section">
                <div class="card">
                    <h2>Catat Hafalan Baru</h2>
                    <form class="hafalan-form" id="hafalanForm">
                        <div class="form-group">
                            <label for="surah">Surah</label>
                            <select id="surah" name="surah" required>
                                <option value="1">Al-Fatihah</option>
                                <option value="2">Al-Baqarah</option>
                                <!-- Tambahkan lebih banyak surah -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ayat-start">Ayat Mulai</label>
                            <input type="number" id="ayat-start" name="ayat-start" min="1" max="286" required>
                        </div>
                        <div class="form-group">
                            <label for="ayat-end">Ayat Selesai</label>
                            <input type="number" id="ayat-end" name="ayat-end" min="1" max="286" required>
                        </div>
                        <button type="submit" class="btn primary">Simpan Hafalan</button>
                    </form>
                </div>
            </section>

            <!-- Statistik Section -->
            <section id="statistik" class="content-section">
                <div class="card">
                    <h2>Statistik Hafalan</h2>
                    <div class="chart-container">
                        <canvas id="statistikChart"></canvas>
                    </div>
                </div>
            </section>

            <!-- Laporan Section -->
            <section id="laporan" class="content-section">
                <div class="card">
                    <h2>Laporan Hafalan</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Surah</th>
                                <th>Ayat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Al-Fatihah</td>
                                <td>1-7</td>
                                <td>12/09/2023</td>
                                <td>Selesai</td>
                            </tr>
                            <!-- Tambahkan lebih banyak baris -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pengaturan Section -->
            <section id="pengaturan" class="content-section">
                <div class="card">
                    <h2>Pengaturan</h2>
                    <form class="settings-form" id="settingsForm">
                        <div class="form-group">
                            <label for="theme">Tema</label>
                            <select id="theme" name="theme">
                                <option value="light">Terang</option>
                                <option value="dark">Gelap</option>
                            </select>
                        </div>
                        <button type="submit" class="btn primary">Simpan Pengaturan</button>
                    </form>
                </div>
            </section>
        </main>
    </div>

    <!-- Notification System -->
    <div class="notification-container" id="notificationContainer">
        <div class="notification success">
            <i class="fas fa-check-circle"></i>
            <p>Hafalan berhasil disimpan!</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Fungsi untuk login
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Ambil nilai input
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Simpan username di localStorage
            localStorage.setItem('username', username);

            // Sembunyikan login container dan tampilkan main container
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('mainContainer').style.display = 'block';

            // Tampilkan username di halaman
            document.getElementById('usernamePlaceholder').textContent = username;
        });

        // Fungsi untuk logout
        document.querySelector('.logout-btn').addEventListener('click', () => {
            localStorage.removeItem('username');
            document.getElementById('loginContainer').style.display = 'block';
            document.getElementById('mainContainer').style.display = 'none';
        });

        // Fungsi untuk mengubah tema
        const themeSwitcher = document.querySelector('.theme-switcher');
        const themeButtons = document.querySelectorAll('.theme-btn');
        const body = document.body;

        themeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const theme = button.getAttribute('data-theme');
                body.className = theme;
                themeButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                localStorage.setItem('theme', theme);
            });
        });

        // Terapkan tema yang disimpan
        const savedTheme = localStorage.getItem('theme') || 'light';
        body.className = savedTheme;
        document.querySelector(`.theme-btn[data-theme="${savedTheme}"]`).classList.add('active');

        // Fungsi untuk navigasi
        const navLinks = document.querySelectorAll('.nav-link');
        const contentSections = document.querySelectorAll('.content-section');

        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                navLinks.forEach(link => link.classList.remove('active'));
                contentSections.forEach(section => section.classList.remove('active'));
                const target = link.getAttribute('href');
                link.classList.add('active');
                document.querySelector(target).classList.add('active');
            });
        });

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                <p>${message}</p>
            `;
            document.getElementById('notificationContainer').appendChild(notification);
            setTimeout(() => notification.remove(), 3000);
        }

        // Contoh penggunaan notifikasi
        document.getElementById('hafalanForm').addEventListener('submit', (e) => {
            e.preventDefault();
            showNotification('Hafalan berhasil disimpan!', 'success');
        });

        // Grafik Progress Hafalan
        const progressChart = new Chart(document.getElementById('progressChart'), {
            type: 'bar',
            data: {
                labels: ['Juz 1', 'Juz 2', 'Juz 3', 'Juz 4', 'Juz 5'],
                datasets: [{
                    label: 'Progress Hafalan',
                    data: [80, 60, 45, 70, 90],
                    backgroundColor: '#2c786c',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Grafik Statistik
        const statistikChart = new Chart(document.getElementById('statistikChart'), {
            type: 'pie',
            data: {
                labels: ['Selesai', 'Perlu Diulang', 'Tertunda'],
                datasets: [{
                    label: 'Statistik Hafalan',
                    data: [125, 15, 3],
                    backgroundColor: ['#2c786c', '#ff9800', '#f44336'],
                }]
            }
        });
    </script>
</body>
</html>