function updateClock() {
    const now = new Date();

    const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

    const namaHari = hari[now.getDay()];
    const tanggal = now.getDate();
    const namaBulan = bulan[now.getMonth()];
    const tahun = now.getFullYear();

    // Format 2 digit untuk jam, menit, dan detik (contoh: 09:05:01)
    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');

    // Penggabungan teks format: "Minggu, 13 Sep 2026 • 15:26:39 WIB"
    const result = `${namaHari}, ${tanggal} ${namaBulan} ${tahun} • ${jam}:${menit}:${detik} WIB`;

    document.getElementById('live-clock').textContent = result;
}

// Jalankan fungsi langsung saat pertama dimuat
updateClock();

// Perbarui tampilan setiap 1 detik (1000 milidetik)
setInterval(updateClock, 1000);