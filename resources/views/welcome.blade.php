<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Gamelab - Sistem Manajemen Perpustakaan Modern</title>
    <meta name="description"
        content="Sistem manajemen perpustakaan modern yang efisien dan user-friendly untuk mengelola koleksi buku digital dengan mudah.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --accent-gradient: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 100%);
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --white: #ffffff;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 8px 25px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 15px 35px rgba(0, 0, 0, 0.15);
            --border-radius: 15px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-sm);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: var(--white);
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            margin: 0 0.5rem;
            transition: var(--transition);
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: #667eea !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--primary-gradient);
            transition: var(--transition);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        .btn-nav {
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            margin: 0 0.25rem;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .btn-outline-primary {
            color: #667eea;
            border-color: #667eea;
        }

        .btn-outline-primary:hover {
            background: var(--primary-gradient);
            border-color: transparent;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.9;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: var(--primary-gradient);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: var(--white);
            text-align: center;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            margin-bottom: 2.5rem;
            opacity: 0.95;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 400;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .hero-buttons {
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .hero-buttons .btn {
            margin: 0.5rem;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 30px;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
        }

        .hero-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-white {
            background: var(--white);
            color: #667eea;
            border: none;
        }

        .btn-white:hover {
            background: var(--white);
            color: #5a67d8;
        }

        .btn-outline-white {
            color: var(--white);
            border: 2px solid var(--white);
            background: transparent;
        }

        .btn-outline-white:hover {
            background: var(--white);
            color: #667eea;
        }

        /* ===== FLOATING ELEMENTS ===== */
        .floating-book {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 3rem;
            animation: float 6s ease-in-out infinite;
        }

        .floating-book:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-book:nth-child(2) {
            top: 30%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-book:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-book:nth-child(4) {
            bottom: 20%;
            right: 10%;
            animation-delay: 1s;
        }

        /* ===== FEATURES SECTION ===== */
        .features-section {
            padding: 6rem 0;
            background: var(--bg-light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .section-title .subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .feature-card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2.5rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        .feature-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .feature-card h4 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* ===== STATS SECTION ===== */
        .stats-section {
            padding: 5rem 0;
            background: var(--primary-gradient);
            color: var(--white);
            position: relative;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .stat-item {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .stat-number {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: block;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 5rem 0;
            background: var(--white);
            text-align: center;
        }

        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-section h2 {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 0 1rem;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 0;
                min-height: 90vh;
            }

            .hero-buttons .btn {
                display: block;
                margin: 0.5rem auto;
                width: 80%;
                max-width: 300px;
            }

            .feature-card {
                margin-bottom: 2rem;
            }

            .stats-section {
                padding: 3rem 0;
            }

            .floating-book {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem 0;
            }

            .btn-nav {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* ===== UTILITY CLASSES ===== */
        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-gradient {
            background: var(--primary-gradient);
            border: none;
            color: var(--white);
        }

        .btn-gradient:hover {
            opacity: 0.9;
            color: var(--white);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-open me-2"></i>
                Perpustakaan Gamelab
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                </ul>

                @if (Route::has('login'))
                    <div class="ms-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-nav">
                                <i class="fas fa-tachometer-alt me-1"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-nav">
                                <i class="fas fa-sign-in-alt me-1"></i>
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-nav">
                                    <i class="fas fa-user-plus me-1"></i>
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-book"><i class="fas fa-book"></i></div>
        <div class="floating-book"><i class="fas fa-bookmark"></i></div>
        <div class="floating-book"><i class="fas fa-book-open"></i></div>
        <div class="floating-book"><i class="fas fa-graduation-cap"></i></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Revolusi Digital<br>
                            <span class="text-gradient">Perpustakaan Modern</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kelola koleksi perpustakaan dengan sistem manajemen yang canggih,
                            efisien, dan mudah digunakan. Transformasi digital untuk masa depan literasi yang lebih
                            baik.
                        </p>
                        <div class="hero-buttons">
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-white">
                                    <i class="fas fa-rocket me-2"></i>
                                    Mulai Sekarang
                                </a>
                                <a href="#features" class="btn btn-outline-white">
                                    <i class="fas fa-play me-2"></i>
                                    Pelajari Lebih Lanjut
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="btn btn-white">
                                    <i class="fas fa-tachometer-alt me-2"></i>
                                    Ke Dashboard
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Fitur <span class="text-gradient">Unggulan</span></h2>
                <p class="subtitle">
                    Solusi komprehensif untuk manajemen perpustakaan modern dengan teknologi terdepan
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h4>Manajemen Koleksi</h4>
                        <p>Kelola ribuan buku dengan sistem katalog yang terorganisir, pencarian cepat, dan kategorisasi
                            yang fleksibel untuk memudahkan administrasi.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h4>Sistem Kategori</h4>
                        <p>Organisasi buku berdasarkan genre, penulis, tahun terbit, dan kategori custom untuk
                            memudahkan navigasi dan discovery konten.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h4>Analytics Dashboard</h4>
                        <p>Pantau performa perpustakaan dengan dashboard analitik komprehensif, laporan real-time, dan
                            insights untuk pengambilan keputusan.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                        <h4>Pencarian Pintar</h4>
                        <p>Temukan buku dalam hitungan detik dengan algoritma pencarian canggih, filter multi-kriteria,
                            dan suggestion otomatis.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h4>User Management</h4>
                        <p>Kelola pengguna dengan sistem role-based access control, profil terintegrasi, dan tracking
                            aktivitas yang komprehensif.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-screen"></i>
                        </div>
                        <h4>Responsive Design</h4>
                        <p>Akses dari perangkat apapun dengan desain responsif yang optimal untuk desktop, tablet, dan
                            smartphone dengan performa maksimal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <!-- Stats Section - Ganti yang lama dengan ini -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="stat-item fade-in">
                        <span class="stat-number" data-target="50">0+</span>
                        <div class="stat-label">Buku Tersedia</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stat-item fade-in">
                        <span class="stat-number" data-target="10">0+</span>
                        <div class="stat-label">Kategori</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stat-item fade-in">
                        <span class="stat-number" data-target="100">0+</span>
                        <div class="stat-label">Active Users</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="about" class="cta-section">
        <div class="container">
            <div class="cta-content fade-in">
                <h2>Siap Memulai <span class="text-gradient">Transformasi Digital?</span></h2>
                <p>Bergabunglah dengan ribuan perpustakaan yang telah mempercayai sistem kami untuk mengelola koleksi
                    mereka dengan lebih efisien dan modern.</p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-gradient btn-lg">
                        <i class="fas fa-rocket me-2"></i>
                        Daftar Sekarang
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-gradient btn-lg">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Akses Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <div class="footer-brand">
                    <i class="fas fa-book-open me-2"></i>
                    Perpustakaan Gamelab
                </div>
                <p class="footer-text">
                    Sistem manajemen perpustakaan modern yang menghadirkan solusi digital
                    terdepan untuk transformasi perpustakaan masa depan.
                </p>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Perpustakaan Gamelab. All rights reserved. Built with ❤️ for better education.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 detik
                const frameDuration = 1000 / 60; // 60 FPS
                const totalFrames = Math.round(duration / frameDuration);
                const easeOutQuad = t => t * (2 - t);

                let frame = 0;
                const countTo = target;

                const timer = setInterval(() => {
                    frame++;
                    const progress = easeOutQuad(frame / totalFrames);
                    const currentCount = Math.round(countTo * progress);

                    counter.textContent = currentCount + '+';

                    if (frame === totalFrames) {
                        clearInterval(timer);
                        counter.textContent = target + '+';
                    }
                }, frameDuration);
            });
        }

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.stats-section');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Preloader effect
        window.addEventListener('load', function () {
            document.body.classList.add('loaded');
        });
    </script>
</body>

</html>