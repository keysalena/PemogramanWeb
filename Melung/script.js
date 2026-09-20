function updateClock() {
    const now = new Date();

    const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

    const namaHari = hari[now.getDay()];
    const tanggal = now.getDate();
    const namaBulan = bulan[now.getMonth()];
    const tahun = now.getFullYear();

    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');

    const result = `${namaHari}, ${tanggal} ${namaBulan} ${tahun} • ${jam}:${menit}:${detik} WIB`;

    document.getElementById('live-clock').textContent = result;
}

updateClock();

setInterval(updateClock, 1000);

// ==========================================
// LOGIKA POPUP / MODAL BERITA
// ==========================================
document.addEventListener("DOMContentLoaded", function () {
  // Data lengkap isi tiap berita
  const newsDetailData = [
    {
      title: "IPSAL Sukses Gelar Kegiatan Menyambut HUT RI Ke-81",
      date: "02 Sep 2026",
      views: "73",
      category: "BERITA DESA",
      image: "https://images.unsplash.com/photo-1531058240690-006c446962d8?q=80&w=600&auto=format&fit=crop",
      content: `
        <p>Ikatan Pemuda Santri dan Pelajar Melung (IPSAL) sukses menyelenggarakan rangkaian kegiatan positif dalam rangka menyambut dan memeriahkan peringatan HUT Kemerdekaan RI ke-81.</p>
        <p>Kegiatan tersebut diisi dengan berbagai perlombaan tradisional, jalan sehat warga, dan pentas seni lokal yang berhasil mengumpulkan ratusan warga desa Melung.</p>
        <p>Kepala Desa Melung mengapresiasi tinggi inisiatif para pemuda desa yang terus berkontribusi aktif menjaga kekompakan dan semangat nasionalisme di lingkungan masyarakat.</p>
      `
    },
    {
      title: "Peringatan HUT RI Ke-81 di Desa Melung dengan Partisipasi Beragam",
      date: "18 Aug 2026",
      views: "53",
      category: "BERITA DESA",
      image: "https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600&auto=format&fit=crop",
      content: `
        <p>Upacara peringatan detik-detik Proklamasi Kemerdekaan Republik Indonesia Ke-81 di Lapangan Desa Melung berlangsung secara khidmat dan meriah.</p>
        <p>Warga dari berbagai elemen, mulai dari tokoh adat, perangkat desa, pelajar, hingga kelompok tani kompak mengenakan pakaian adat dan seragam khas daerah.</p>
        <p>Acara ditutup dengan kenduri bersama sebagai wujud rasa syukur atas kemajuan dan ketenteraman warga Desa Melung.</p>
      `
    },
    {
      title: "Wujudkan Tertib Administrasi, Pemdes Melung Rilis Daftar Lengkap Syarat Pelayanan",
      date: "07 Jul 2026",
      views: "166",
      category: "BERITA DESA",
      image: "https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&w=600&auto=format&fit=crop",
      content: `
        <p>Pemerintah Desa Melung resmi meluncurkan panduan alur dan daftar persyaratan lengkap untuk pengurusan berkas kependudukan dan surat pengantar administrasi desa.</p>
        <p>Langkah ini bertujuan untuk mempercepat birokrasi, memberikan kepastian waktu bagi warga, serta mendukung transparansi pelayanan publik yang lebih prima.</p>
        <p>Warga desa dapat melihat papan pengumuman di balai desa atau mengunduh daftar berkas persyaratan secara langsung melalui portal resmi desa.</p>
      `
    }
  ];

  // Ambil elemen modal
  const modal = document.getElementById("newsModal");
  if (!modal) return; // Jika halaman bukan berita.html, hentikan

  const modalTitle = document.getElementById("modalTitle");
  const modalDate = document.getElementById("modalDate");
  const modalViews = document.getElementById("modalViews");
  const modalImage = document.getElementById("modalImage");
  const modalBadge = document.getElementById("modalBadge");
  const modalBody = document.getElementById("modalBody");

  const closeBtn = document.getElementById("modalCloseBtn");
  const dismissBtn = document.getElementById("modalDismissBtn");

  // Fungsi membuka modal berita
  function openNewsModal(index) {
    const data = newsDetailData[index];
    if (!data) return;

    modalTitle.textContent = data.title;
    modalDate.textContent = data.date;
    modalViews.textContent = data.views;
    modalImage.src = data.image;
    modalImage.alt = data.title;
    modalBadge.textContent = data.category;
    modalBody.innerHTML = data.content;

    modal.classList.add("active");
    document.body.classList.add("modal-open");
  }

  // Fungsi menutup modal
  function closeNewsModal() {
    modal.classList.remove("active");
    document.body.classList.remove("modal-open");
  }

  // Pasang event listener klik pada setiap kartu berita
  const newsCards = document.querySelectorAll(".news-card");
  newsCards.forEach((card, index) => {
    // Tombol "Baca"
    const readBtn = card.querySelector(".btn-read-more");
    if (readBtn) {
      readBtn.addEventListener("click", function (e) {
        e.preventDefault();
        openNewsModal(index);
      });
    }

    // Seluruh area kartu dapat diklik
    card.style.cursor = "pointer";
    card.addEventListener("click", function (e) {
      if (e.target.closest(".btn-read-more")) return; // Hindari double trigger
      openNewsModal(index);
    });
  });

  // Tombol close silang & tombol tutup bawah
  if (closeBtn) closeBtn.addEventListener("click", closeNewsModal);
  if (dismissBtn) dismissBtn.addEventListener("click", closeNewsModal);

  // Klik di luar kotak modal untuk menutup
  modal.addEventListener("click", function (e) {
    if (e.target === modal) {
      closeNewsModal();
    }
  });

  // Tekan tombol keyboard Escape (Esc) untuk menutup modal
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modal.classList.contains("active")) {
      closeNewsModal();
    }
  });
});