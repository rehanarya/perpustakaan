@extends('adminlte.layouts.app')
@section('addCss')
  <style>
    /* Modern Dashboard Card System */
    .dashboard-card {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(226, 232, 240, 0.8);
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    margin: 1rem 0.5rem;
    backdrop-filter: blur(10px);
    }

    .text-gradient {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    }

    .dashboard-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    border-color: rgba(99, 102, 241, 0.3);
    }

    .dashboard-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
    border-radius: 16px 16px 0 0;
    }

    .dashboard-card .card-header {
    background: transparent;
    border-bottom: 1px solid rgba(226, 232, 240, 0.5);
    padding: 1.25rem 1.5rem 1rem;
    border-radius: 16px 16px 0 0;
    }

    .dashboard-card .card-title {
    color: #1e293b;
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
    display: flex;
    align-items: center;
    }

    .dashboard-card .card-title i {
    color: #6366f1;
    margin-right: 0.5rem;
    font-size: 1rem;
    }

    .dashboard-card .card-body {
    padding: 1.5rem;
    background: transparent;
    }

    /* Container Improvements */
    .content-wrapper {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    min-height: 100vh;
    }

    .container-fluid {
    padding: 0 1rem;
    max-width: 1400px;
    margin: 0 auto;
    }

    /* Info Box Modern Style */
    .info-box {
    display: flex;
    align-items: center;
    background: white;
    border: 1px solid rgba(226, 232, 240, 0.6);
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }

    .info-box:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border-color: rgba(99, 102, 241, 0.3);
    }

    .info-box-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    border-radius: 12px;
    margin-right: 1rem;
    font-size: 1.25rem;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    }

    .info-box-content {
    flex: 1;
    }

    .info-box-text {
    display: block;
    font-size: 0.8rem;
    color: #64748b;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
    }

    .info-box-number {
    display: block;
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.2;
    }

    /* Description Blocks */
    .description-block {
    text-align: center;
    padding: 1.5rem 1rem;
    background: rgba(248, 250, 252, 0.8);
    border: 1px solid rgba(226, 232, 240, 0.5);
    border-radius: 12px;
    margin: 0.25rem;
    transition: all 0.3s ease;
    }

    .description-block:hover {
    background: rgba(239, 246, 255, 0.8);
    border-color: rgba(99, 102, 241, 0.3);
    transform: translateY(-1px);
    }

    .description-percentage {
    color: #1e293b;
    font-weight: 700;
    font-size: 1.5rem;
    display: block;
    margin-bottom: 0.5rem;
    }

    .description-header {
    color: #374151;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.25rem;
    }

    .description-text {
    color: #6b7280;
    font-weight: 400;
    font-size: 0.85rem;
    }

    /* Welcome Section */
    .welcome-section h4 {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    margin-bottom: 1rem;
    }

    .welcome-section p {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    }

    /* Quick Actions */
    .btn {
    border-radius: 10px;
    font-weight: 500;
    padding: 0.625rem 1.25rem;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    }

    .btn-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .btn-info {
    background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
    }

    /* Progress Bar */
    .progress {
    height: 6px;
    border-radius: 6px;
    background-color: rgba(226, 232, 240, 0.8);
    overflow: hidden;
    }

    .progress-bar {
    border-radius: 6px;
    background: linear-gradient(90deg, #10b981 0%, #059669 100%);
    transition: width 0.6s ease;
    }

    /* Statistics Grid */
    .statistics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
    }

    /* Content Header */
    .content-header {
    padding: 2rem 0 1rem;
    text-align: center;
    background: transparent;
    }

    .content-header h1 {
    color: #1e293b;
    font-weight: 700;
    font-size: 2.25rem;
    margin-bottom: 0.5rem;
    }

    .content-header .subtitle {
    color: #64748b;
    font-size: 1.1rem;
    font-weight: 400;
    }

    /* Icon Colors */
    .bg-info {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    }

    .bg-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .bg-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .bg-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    /* Text Colors */
    .text-success {
    color: #059669 !important;
    }

    .text-info {
    color: #0891b2 !important;
    }

    .text-primary {
    color: #6366f1 !important;
    }

    /* System Status */
    .system-status {
    margin-top: 1.5rem;
    padding: 1rem;
    background: rgba(240, 253, 244, 0.8);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: 8px;
    }

    .system-status h6 {
    color: #374151;
    font-weight: 600;
    margin-bottom: 0.75rem;
    }

    .system-status small {
    color: #059669;
    font-weight: 500;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
    .container-fluid {
      padding: 0 0.75rem;
    }

    .dashboard-card {
      margin: 0.75rem 0.25rem;
    }

    .content-header h1 {
      font-size: 1.75rem;
    }

    .statistics-grid {
      grid-template-columns: 1fr;
      gap: 0.75rem;
    }

    .info-box {
      padding: 1rem;
    }

    .info-box-icon {
      width: 48px;
      height: 48px;
      font-size: 1.1rem;
    }

    .description-block {
      padding: 1.25rem 0.75rem;
    }
    }

    @media (max-width: 576px) {
    .statistics-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 0.5rem;
    }

    .info-box-number {
      font-size: 1.1rem;
    }

    .info-box-text {
      font-size: 0.75rem;
    }
    }

    /* Loading Animation */
    .fade-in {
    animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
    }

    /* Remove section decorator for cleaner look */
    .section-decorator {
    display: none;
    }
  </style>
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Dashboard<span class="text-gradient"> Perpustakaan</span></h1>
      <p class="subtitle">Sistem Manajemen Perpustakaan Digital</p>
    </div>
    </div>

    <section class="content">
    <div class="container-fluid">
      <!-- Main Dashboard Content -->
      <div class="row">
      <!-- Welcome Card -->
      <div class="col-lg-8">
        <div class="card dashboard-card fade-in">
        <div class="card-header">
          <h3 class="card-title">
          <i class="fas fa-home"></i>
          Selamat Datang
          </h3>
        </div>
        <div class="card-body">
          <div class="welcome-section">
          <h4>Halo, {{ auth()->user()->name }}!</h4>
          <p>Selamat datang di Sistem Manajemen Perpustakaan Digital. Kelola koleksi buku dan kategori
            perpustakaan dengan mudah dan efisien.</p>

          <div class="row mt-4">
            <div class="col-sm-6">
            <div class="description-block">
              <span class="description-percentage text-primary">
              <i class="fas fa-book mr-1"></i>{{ number_format($totalBuku) }}
              </span>
              <h5 class="description-header">Total Buku</h5>
              <span class="description-text">Koleksi Tersedia</span>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="description-block">
              <span class="description-percentage text-info">
              <i class="fas fa-tags mr-1"></i>{{ $totalKategori }}
              </span>
              <h5 class="description-header">Kategori</h5>
              <span class="description-text">Jenis Buku</span>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="col-lg-4">
        <div class="card dashboard-card fade-in">
        <div class="card-header">
          <h3 class="card-title">
          <i class="fas fa-bolt"></i>
          Aksi Cepat
          </h3>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
          <a href="{{ route('daftarBuku') }}" class="btn btn-primary mb-2">
            <i class="fas fa-book-open mr-2"></i>
            Kelola Buku
          </a>
          <a href="{{ route('daftarKategori') }}" class="btn btn-success mb-2">
            <i class="fas fa-tags mr-2"></i>
            Kelola Kategori
          </a>
          <a href="{{ route('daftarBuku') }}" class="btn btn-info">
            <i class="fas fa-search mr-2"></i>
            Cari Buku
          </a>
          </div>

          <!-- System Status -->
          <div class="system-status">
          <h6>Status Sistem</h6>
          <div class="progress mb-2">
            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100"></div>
          </div>
          <small>
            <i class="fas fa-check-circle mr-1"></i>
            Sistem Berjalan Normal
          </small>
          </div>
        </div>
        </div>
      </div>
      </div>

      <!-- Statistics Section -->
      <div class="row mt-4">
      <div class="col-12">
        <div class="card dashboard-card fade-in">
        <div class="card-header">
          <h3 class="card-title">
          <i class="fas fa-chart-line"></i>
          Ringkasan Statistik
          </h3>
        </div>
        <div class="card-body">
          <div class="statistics-grid">
          <div class="info-box">
            <span class="info-box-icon bg-info">
            <i class="fas fa-star"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Buku Terbanyak</span>
            <span class="info-box-number">{{ $bukuTerbanyak ?? 'Belum Ada Data' }}</span>
            </div>
          </div>

          <div class="info-box">
            <span class="info-box-icon bg-success">
            <i class="fas fa-fire"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Kategori Terbanyak</span>
            <span class="info-box-number">{{ $kategoriTerbanyak ?? 'Belum Ada Data' }}</span>
            </div>
          </div>

          <div class="info-box">
            <span class="info-box-icon bg-warning">
            <i class="fas fa-clock"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Terakhir Update</span>
            <span
              class="info-box-number">{{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}</span>
            </div>
          </div>

          <div class="info-box">
            <span class="info-box-icon bg-danger">
            <i class="fas fa-database"></i>
            </span>
            <div class="info-box-content">
            <span class="info-box-text">Total Data</span>
            <span class="info-box-number">{{ $totalBuku + $totalKategori }}</span>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </section>
  </div>
@endsection

@section('addJavascript')
  <script>
    $(document).ready(function () {
    // Counter animation
    function animateValue(element, start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      const currentValue = Math.floor(progress * (end - start) + start);
      element.innerHTML = currentValue.toLocaleString();
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
      };
      window.requestAnimationFrame(step);
    }

    // Animate statistics numbers
    setTimeout(() => {
      $('.description-percentage').each(function (index) {
      const element = this.querySelector('span') || this;
      const text = $(this).text();
      const number = parseInt(text.replace(/\D/g, ''));

      if (number > 0) {
        $(this).text('0');
        animateValue(this, 0, number, 1200);
      }
      });
    }, 300);

    // Enhanced hover effects
    $('.info-box, .dashboard-card').hover(
      function () {
      $(this).addClass('shadow-lg');
      },
      function () {
      $(this).removeClass('shadow-lg');
      }
    );

    // Button click animation
    $('.btn').on('click', function () {
      $(this).css('transform', 'scale(0.98)');
      setTimeout(() => {
      $(this).css('transform', '');
      }, 150);
    });

    // Add staggered animation to cards
    $('.fade-in').each(function (index) {
      $(this).css({
      'animation-delay': (index * 0.1) + 's'
      });
    });

    // Progress bar animation
    setTimeout(() => {
      $('.progress-bar').css('width', '100%');
    }, 500);
    });
  </script>
@endsection