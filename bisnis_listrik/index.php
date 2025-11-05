<?php
// ===================================================================
// KONEKSI & PENGAMBILAN DATA DARI DATABASE
// ===================================================================

// --- Koneksi Database ---
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db   = 'bisnis_listrik'; // Ganti dengan nama database Anda

// Membuat koneksi
 $conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// --- Ambil Data "Tentang Kami" dari Database ---
 $sql = "SELECT judul, paragraf1, paragraf2, gambar_url, gambar_alt FROM tentang_kami LIMIT 1";
 $result = $conn->query($sql);

// Inisialisasi variabel dengan nilai default
 $judul_tentang = "Tentang Jasa Tukang Listrik";
 $paragraf1_tentang = "JasaTukangListrik.com adalah tim profesional yang berdedikasi untuk menyediakan layanan kelistrikan terbaik. Dengan pengalaman bertahun-tahun, kami telah membangun reputasi sebagai solusi terpercaya untuk semua kebutuhan listrik rumah tangga dan bisnis.";
 $paragraf2_tentang = "Komitmen kami adalah pada kepuasan pelanggan, keamanan kerja, dan hasil yang rapi serta tahan lama. Teknisi kami tidak hanya ahli secara teknis, tetapi juga terlatih untuk memberikan pelayanan yang sopan dan menjaga kebersihan tempat kerja.";
 $gambar_url_tentang = "https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=2070&auto=format&fit=crop";
 $gambar_alt_tentang = "Teknisi Listrik Profesional";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $judul_tentang = $row['judul'];
    $paragraf1_tentang = $row['paragraf1'];
    $paragraf2_tentang = $row['paragraf2'];
    $gambar_url_tentang = $row['gambar_url'];
    $gambar_alt_tentang = $row['gambar_alt'];
}

// --- Ambil Data Galeri dari Database ---
 $sql_galeri = "SELECT gambar_url, deskripsi, alt_text FROM galeri ORDER BY urutan ASC";
 $result_galeri = $conn->query($sql_galeri);
 $data_galeri = [];
if ($result_galeri->num_rows > 0) {
    while($row = $result_galeri->fetch_assoc()) {
        $data_galeri[] = $row;
    }
}

// Tutup koneksi database
 $conn->close();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Tukang Listrik Profesional & Terpercaya | Siap 24 Jam</title>
    <meta name="description" content="Jasa tukang listrik melayani perbaikan instalasi listrik, pasang baru, dan maintenance. Tukang listrik 24 jam terpercaya, profesional, dan berpengalaman.">
    <meta name="keywords" content="jasa tukang listrik, tukang listrik jakarta, tukang listrik 24 jam, pasang instalasi listrik, perbaikan korsleting listrik, jasa listrik panggilan, instalasi listrik rumah, tukang listrik terdekat">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Internal -->
    <style>
        /* --- Global Styles & Variables --- */
        :root {
            --primary-color: #003366; /* Biru Tua */
            --secondary-color: #FFC107; /* Kuning */
            --text-color: #333;
            --light-bg-color: #f4f4f4;
            --white-color: #fff;
            --font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-family);
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--white-color);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        h1, h2, h3 {
            font-weight: 600;
            line-height: 1.2;
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--primary-color);
        }

        section {
            padding: 80px 0;
        }

        .section-light {
            background-color: var(--light-bg-color);
        }

        .cta-button {
            display: inline-block;
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .cta-button:hover {
            background-color: #e0a800;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* --- Header & Navigation --- */
        header {
            background: var(--white-color);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            white-space: nowrap;
        }

        .logo i {
            color: var(--secondary-color);
            margin-right: 8px;
        }

        .nav-menu ul {
            display: flex;
            list-style: none;
        }

        .nav-menu a {
            color: var(--text-color);
            text-decoration: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-menu a:hover, .nav-menu a.active-link {
            color: var(--primary-color);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--primary-color);
            margin: 3px 0;
            transition: 0.3s;
        }

        /* --- Hero Section --- */
        .hero {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), url('https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=2070&auto=format&fit=crop') no-repeat center center/cover;
            height: 100vh;
            color: var(--white-color);
            display: flex;
            align-items: center;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* --- Features Section --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .feature-card i {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        /* --- Services Section --- */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .service-card {
            background: var(--white-color);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .service-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .service-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        /* --- About Section --- */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .about-text p {
            margin-bottom: 1rem;
        }

        .about-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* --- Gallery Section --- */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-desc {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: var(--white-color);
            padding: 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-desc {
            transform: translateY(0);
        }

        .gallery-desc p {
            font-size: 0.9rem;
        }

        /* --- Testimonials Section --- */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: var(--white-color);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--secondary-color);
        }

        .stars {
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .testimonial-card p {
            font-style: italic;
            margin-bottom: 1.5rem;
        }

        .testimonial-card cite {
            font-weight: 600;
            color: var(--primary-color);
            font-style: normal;
        }

        .testimonial-card cite span {
            display: block;
            font-weight: 400;
            color: #777;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .google-review-link {
            text-align: center;
            margin-top: 2rem;
        }
        .google-review-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }
        .google-review-link a:hover {
            color: var(--secondary-color);
        }
        .google-review-link i {
            margin-left: 8px;
        }


        /* --- Contact Section (DIUBAH) --- */
        .contact-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: var(--white-color);
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: var(--secondary-color);
            margin-right: 1rem;
            width: 30px;
        }

        .contact-item a,
        .contact-item span {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.1rem;
        }
        
        .contact-whatsapp-btn {
            margin-top: 2rem;
        }

        /* --- Footer --- */
        footer {
            background: var(--primary-color);
            color: var(--white-color);
            text-align: center;
            padding: 2rem 0;
        }

        footer p {
            margin-bottom: 0.5rem;
        }

        footer small {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .about-content {
                grid-template-columns: 1fr;
            }
            .about-image {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }
            .hero-content h1 {
                font-size: 2.5rem;
            }
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background-color: var(--white-color);
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0,0,0,0.05);
                padding: 2rem 0;
            }
            .nav-menu.active {
                left: 0;
            }
            .nav-menu ul {
                flex-direction: column;
            }
            .hamburger {
                display: flex;
            }
            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }
            .hamburger.active span:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }
            .hamburger.active span:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
        }

        @media (max-width: 576px) {
            .contact-content {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header & Navigasi -->
    <header>
        <div class="container">
            <a href="#beranda" class="logo"><i class="fas fa-bolt"></i> Jasa Tukang Listrik</a>
            <nav class="nav-menu">
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <main>
        <!-- Section: Beranda (Hero) -->
        <section id="beranda" class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Tukang Listrik Profesional & Terpercaya, Siap 24 Jam</h1>
                    <p>Butuh jasa tukang listrik yang cepat, handal, dan berpengalaman? Kami adalah solusi tepat untuk semua kebutuhan listrik Anda.</p>
                    <a href="https://wa.me/6281298991241?text=Halo%20Jasa%20Tukang%20Listrik,%20saya%20butuh%20bantuan." target="_blank" class="cta-button">
                        <i class="fab fa-whatsapp"></i> Hubungi Sekarang
                    </a>
                </div>
            </div>
        </section>

        <!-- Section: Keunggulan -->
        <section id="keunggulan" class="section-light">
            <div class="container">
                <h2>Mengapa Memilih Jasa Kami?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <i class="fas fa-user-shield"></i>
                        <h3>Berpengalaman</h3>
                        <p>Didukung oleh teknisi ahli yang bersertifikat dan memiliki pengalaman bertahun-tahun di bidangnya, menangani berbagai kasus listrik rumah tangga dan kantor.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-clock"></i>
                        <h3>Tepat Waktu</h3>
                        <p>Tim kami selalu datang tepat waktu dan siap merespon panggilan Anda dengan cepat, memahami betul pentingnya listrik untuk aktivitas Anda.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Bergaransi</h3>
                        <p>Pekerjaan kami bergaransi untuk memberikan Anda ketenangan dan jaminan keamanan jangka panjang.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-tag"></i>
                        <h3>Harga Terjangkau</h3>
                        <p>Kami menawarkan layanan berkualitas dengan harga yang bersaing dan transparan. Tidak ada biaya tersembunyi, Anda hanya membayar untuk pekerjaan yang dilakukan.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Layanan -->
        <section id="layanan">
            <div class="container">
                <h2>Layanan Kami</h2>
                <div class="services-grid">
                    <div class="service-card">
                        <i class="fas fa-plug"></i>
                        <h3>Instalasi Listrik Baru</h3>
                        <p>Melayani pemasangan instalasi listrik baru untuk rumah, kantor, ruko, atau bangunan lainnya sesuai standar PLN dan keamanan.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-tools"></i>
                        <h3>Perbaikan Kelistrikan</h3>
                        <p>Ahli dalam menangani berbagai masalah listrik seperti korsleting, konslet, mati total, instalasi terbakar, dan lainnya dengan cepat dan aman.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-lightbulb"></i>
                        <h3>Pemasangan Saklar & Lampu</h3>
                        <p>Pemasangan dan penggantian berbagai jenis saklar, stop kontak, dan lampu untuk mempercantik dan memperlengkap rumah atau kantor Anda.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-clipboard-check"></i>
                        <h3>Maintenance Listrik</h3>
                        <p>Layanan inspeksi dan maintenance berkala untuk mencegah terjadinya kerusakan dan memastikan instalasi listrik Anda selalu dalam kondisi aman dan prima.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Tentang Kami (SUDAH DIPERBAIKI) -->
        <section id="tentang-kami" class="section-light">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2><?php echo htmlspecialchars($judul_tentang); ?></h2>
                        <p><?php echo htmlspecialchars($paragraf1_tentang); ?></p>
                        <p><?php echo htmlspecialchars($paragraf2_tentang); ?></p>
                    </div>
                    <div class="about-image">
                        <img src="<?php echo htmlspecialchars($gambar_url_tentang); ?>" alt="<?php echo htmlspecialchars($gambar_alt_tentang); ?>">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Galeri Pekerjaan (SUDAH DIPERBAIKI) -->
        <section id="galeri">
            <div class="container">
                <h2>Galeri Pekerjaan</h2>
                <div class="gallery-grid">
                    <?php foreach ($data_galeri as $item): ?>
                        <div class="gallery-item">
                            <img src="<?php echo htmlspecialchars($item['gambar_url']); ?>" alt="<?php echo htmlspecialchars($item['alt_text']); ?>">
                            <div class="gallery-desc">
                                <p><?php echo htmlspecialchars($item['deskripsi']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Section: Testimoni (DIUBAH) -->
        <section id="testimoni" class="section-light">
            <div class="container">
                <h2>Review dari Pelanggan Kami</h2>
                <div class="testimonials-grid" id="testimonials-container">
                    <!-- Testimoni akan muncul di sini -->
                </div>
                <div class="google-review-link">
                    <a href="https://www.google.com/search?q=Jasa+Tukang+Listrik+Jakarta" target="_blank">
                        Lihat semua review kami di Google <i class="fab fa-google"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section: Kontak (DIUBAH) -->
        <section id="kontak">
            <div class="container">
                <h2>Hubungi Kami Langsung via WhatsApp</h2>
                <div class="contact-content">
                    <div class="contact-info">
                        <h3>Siap 24 Jam untuk Anda</h3>
                        <p>Jangan biarkan masalah listrik mengganggu aktivitas Anda. Klik tombol di bawah untuk terhubung langsung dengan tim kami.</p>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:0812-9899-1241">0812-9899-1241</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. H. Naman Raya No. 58B, Kembangan, Jakarta Barat</span>
                        </div>
                    </div>
                    <a href="https://wa.me/6281298991241?text=Halo%20Jasa%20Tukang%20Listrik,%20saya%20butuh%20bantuan." target="_blank" class="cta-button contact-whatsapp-btn">
                        <i class="fab fa-whatsapp"></i> Chat di WhatsApp Sekarang
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Jasa Tukang Listrik. Hak Cipta Dilindungi.</p>
            <p><small>Siap melayani 24 jam untuk kebutuhan listrik Anda.</small></p>
        </div>
    </footer>

    <!-- JavaScript Internal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // --- DATA REVIEW GOOGLE (INPUT DATA DI SINI) ---
            const googleReviews = [
                {
                    stars: 5,
                    text: "Pelayanannya sangat memuaskan, teknisi yang datang tepat waktu, ramah dan berpengalaman. Harga juga terjangkau. Recommended banget!",
                    author: "Bapak Ahmad",
                    location: "Jakarta Selatan"
                },
                {
                    stars: 5,
                    text: "Saya menghubungi Jasa Tukang Listrik untuk pasang instalasi listrik di kantor baru. Pekerjaannya rapi, aman, dan sesuai dengan apa yang saya inginkan. Terima kasih!",
                    author: "Ibu Sarah",
                    location: "Jakarta Pusat"
                },
                {
                    stars: 5,
                    text: "Responnya cepat saat saya hubungi. Listrik di rumah yang konslet langsung bisa diperbaiki. Teknisinya juga menjelaskan penyebabnya dengan detail. Puas sekali.",
                    author: "Bapak Budi",
                    location: "Bekasi"
                },
                {
                    stars: 4,
                    text: "Cukup puas dengan hasil kerjanya, hanya saja agak lama menunggu teknisinya datang. Tapi overall pekerjaan bagus dan rapi.",
                    author: "Rina",
                    location: "Tangerang"
                }
            ];

            // --- FUNGSI UNTUK MENAMPILKAN REVIEW ---
            function displayReviews() {
                const container = document.getElementById('testimonials-container');
                container.innerHTML = '';

                googleReviews.forEach(review => {
                    let starsHtml = '';
                    for (let i = 0; i < 5; i++) {
                        if (i < review.stars) {
                            starsHtml += '<i class="fas fa-star"></i>';
                        } else {
                            starsHtml += '<i class="far fa-star"></i>';
                        }
                    }

                    const reviewCard = document.createElement('div');
                    reviewCard.className = 'testimonial-card';
                    reviewCard.innerHTML = `
                        <div class="stars">${starsHtml}</div>
                        <p>"${review.text}"</p>
                        <cite>- ${review.author}, <span>${review.location}</span></cite>
                    `;
                    container.appendChild(reviewCard);
                });
            }

            displayReviews();

            // --- Mobile Menu Toggle ---
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                navMenu.classList.toggle('active');
            });

            document.querySelectorAll('.nav-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    hamburger.classList.remove('active');
                    navMenu.classList.remove('active');
                });
            });

            // --- Active Navigation Link on Scroll ---
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-menu a');

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (scrollY >= (sectionTop - 200)) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active-link');
                    if (link.getAttribute('href').slice(1) === current) {
                        link.classList.add('active-link');
                    }
                });
            });
        });
    </script>
</body>
</html>