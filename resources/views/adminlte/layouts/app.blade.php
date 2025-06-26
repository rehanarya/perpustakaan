<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Perpustakaan Gamelab Dashboard" }} | Dashboard</title>

  <!-- External Stylesheets -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Custom Professional Styles -->
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      --accent-gradient: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 100%);
      --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --info-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      --text-dark: #2d3748;
      --text-light: #718096;
      --text-muted: #a0aec0;
      --bg-light: #f7fafc;
      --bg-card: #ffffff;
      --border-color: #e2e8f0;
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07), 0 1px 3px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
      --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.06);
      --border-radius: 12px;
      --border-radius-lg: 16px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      color: var(--text-dark);
      font-weight: 400;
      line-height: 1.6;
      min-height: 100vh;
    }

    /* ===== HEADER STYLING ===== */
    .main-header {
      background: var(--bg-card);
      border-bottom: 1px solid var(--border-color);
      box-shadow: var(--shadow-sm);
      backdrop-filter: blur(20px);
      z-index: 1000;
    }

    .main-header .navbar-nav .nav-link {
      color: var(--text-dark) !important;
      font-weight: 500;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      margin: 0 0.25rem;
      transition: var(--transition);
      position: relative;
      display: flex;
      align-items: center;
    }

    .main-header .navbar-nav .nav-link:hover {
      background: rgba(102, 126, 234, 0.1);
      color: #667eea !important;
      transform: translateY(-1px);
      text-decoration: none;
    }

    .main-header .navbar-nav .nav-link i {
      margin-right: 0.5rem;
      width: 16px;
      text-align: center;
    }

    /* Styling khusus untuk logout button agar konsisten */
    .navbar-nav .nav-link.logout-btn {
      background: rgba(255, 107, 107, 0.1);
      color: #ff6b6b !important;
      border: 1px solid rgba(255, 107, 107, 0.2);
    }

    .navbar-nav .nav-link.logout-btn:hover {
      background: rgba(255, 107, 107, 0.2);
      color: #e53e3e !important;
      transform: translateY(-1px);
    }

    /* ===== BRAND & SIDEBAR ===== */
    .brand-link {
      background: var(--bg-card);
      border-bottom: 1px solid var(--border-color);
      padding: 1rem 0.75rem;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .brand-text {
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700 !important;
      font-size: 1rem !important;
      line-height: 1.2;
      text-align: center;
      margin-top: 0.25rem;
      margin-bottom: -1rem;
    }

    .brand-icon {
      font-size: 1.5rem;
      color: #667eea;
    }

    .main-sidebar {
      background: var(--bg-card);
      box-shadow: var(--shadow-md);
      z-index: 999;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link {
      color: var(--text-dark);
      padding: 0.75rem 1rem;
      margin: 0.25rem 0.75rem;
      border-radius: var(--border-radius);
      transition: var(--transition);
      font-weight: 500;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link:hover {
      background: rgba(102, 126, 234, 0.1);
      color: #667eea;
      transform: translateX(4px);
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-dark-primary .nav-sidebar>.nav-item.menu-open>.nav-link {
      background: var(--primary-gradient);
      color: white;
      box-shadow: var(--shadow-md);
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
      transform: translateX(0);
    }

    .nav-icon {
      margin-right: 0.75rem !important;
      width: 20px;
      text-align: center;
    }

    /* ===== USER PANEL ===== */
    .user-panel {
      background: rgba(102, 126, 234, 0.1);
      border-radius: var(--border-radius);
      margin: 1rem 0.75rem;
      padding: 0.75rem;
      border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .user-panel .info {
      flex: 1;
      min-width: 0;
    }

    .user-panel .info a {
      color: var(--text-dark);
      font-weight: 600;
      text-decoration: none;
      font-size: 0.9rem;
      display: block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .user-panel .info a:hover {
      color: #667eea;
    }

    .user-panel .info small {
      color: var(--text-muted);
      font-size: 0.75rem;
      display: block;
      margin-top: 0.1rem;
    }

    /* ===== SIDEBAR SEARCH ===== */
    .sidebar-search-results .list-group-item {
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      color: var(--text-dark);
    }

    .form-control-sidebar {
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      color: var(--text-dark);
    }

    .btn-sidebar {
      background: var(--primary-gradient);
      border: none;
      color: white;
    }

    /* ===== CONTENT WRAPPER ===== */
    .content-wrapper {
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      min-height: calc(100vh - 56px);
      position: relative;
      overflow: hidden;
    }

    .content-wrapper::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background:
        radial-gradient(circle at 25% 25%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(56, 239, 125, 0.05) 0%, transparent 50%),
        linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      z-index: 0;
      background-image:
        linear-gradient(rgba(102, 126, 234, 0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(102, 126, 234, 0.02) 1px, transparent 1px),
        linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      background-size: 50px 50px, 50px 50px, 100% 100%;
    }

    .content-wrapper .floating-element {
      position: absolute;
      color: rgba(102, 126, 234, 0.08);
      font-size: clamp(1.5rem, 3vw, 2.5rem);
      animation: float 8s ease-in-out infinite;
      pointer-events: none;
      z-index: 1;
    }

    .content-wrapper .floating-element:nth-child(1) {
      top: 15%;
      left: 8%;
      animation-delay: 0s;
      color: rgba(102, 126, 234, 0.06);
    }

    .content-wrapper .floating-element:nth-child(2) {
      top: 25%;
      right: 12%;
      animation-delay: 2s;
      color: rgba(56, 239, 125, 0.06);
    }

    .content-wrapper .floating-element:nth-child(3) {
      bottom: 35%;
      left: 15%;
      animation-delay: 4s;
      color: rgba(255, 107, 107, 0.06);
    }

    .content-wrapper .floating-element:nth-child(4) {
      top: 45%;
      left: 45%;
      animation-delay: 1s;
      color: rgba(102, 126, 234, 0.04);
    }

    .content-wrapper .floating-element:nth-child(5) {
      bottom: 20%;
      right: 20%;
      animation-delay: 3s;
      color: rgba(56, 239, 125, 0.05);
    }

    .content-wrapper .floating-element:nth-child(6) {
      top: 65%;
      right: 45%;
      animation-delay: 5s;
      color: rgba(255, 107, 107, 0.04);
    }

    .content-wrapper::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-image: radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(56, 239, 125, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(255, 107, 107, 0.03) 0%, transparent 50%);
      animation: backgroundMove 20s ease-in-out infinite;
      z-index: 0;
    }

    /* ===== CONTENT HEADER ===== */
    .content-header {
      background: var(--primary-gradient);
      color: white;
      padding: 2rem 0 3rem 0;
      margin-bottom: 0;
      position: relative;
      overflow: hidden;
    }

    .content-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
      opacity: 0.3;
    }

    .content-header .container-fluid {
      position: relative;
      z-index: 2;
    }

    .content-header h1 {
      color: white;
      font-weight: 700;
      font-size: clamp(2rem, 4vw, 2.5rem);
      margin-bottom: 0.5rem;
      text-align: center;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .content-header .subtitle {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.1rem;
      text-align: center;
      font-weight: 400;
    }

    /* ===== MAIN CONTENT ===== */
    .content {
      position: relative;
      z-index: 2;
      margin-top: -2rem;
      background: transparent;
      min-height: calc(100vh - 200px);
      padding-bottom: 2rem;
    }

    .stats-cards {
      padding: 0 1rem;
    }

    /* ===== CARDS & BOXES ===== */
    .small-box {
      border-radius: var(--border-radius-lg);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      transition: var(--transition);
      margin-bottom: 2rem;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(20px);
      position: relative;
      z-index: 3;
    }

    .small-box:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-xl);
    }

    .small-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: inherit;
      opacity: 0.9;
      z-index: 1;
    }

    .small-box .inner {
      padding: 2rem 1.5rem;
      position: relative;
      z-index: 2;
    }

    .small-box .inner h3 {
      font-size: clamp(2.5rem, 5vw, 3.5rem);
      font-weight: 800;
      margin-bottom: 0.5rem;
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .small-box .inner p {
      font-size: 1.1rem;
      font-weight: 500;
      color: rgba(255, 255, 255, 0.95);
      margin-bottom: 0;
    }

    .small-box .icon {
      position: absolute;
      top: 1.5rem;
      right: 1.5rem;
      font-size: 3.5rem;
      color: rgba(255, 255, 255, 0.3);
      z-index: 2;
    }

    .small-box-footer {
      background: rgba(0, 0, 0, 0.2);
      color: white;
      padding: 1rem 1.5rem;
      text-decoration: none;
      font-weight: 500;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      z-index: 2;
    }

    .small-box-footer:hover {
      background: rgba(0, 0, 0, 0.3);
      color: white;
      text-decoration: none;
      transform: translateY(-2px);
    }

    .small-box-footer i {
      transition: var(--transition);
    }

    .small-box-footer:hover i {
      transform: translateX(4px);
    }

    /* ===== BACKGROUND GRADIENTS - Disesuaikan agar tidak menabrak background ===== */
    .bg-primary {
      background: linear-gradient(135deg, #4c63d2 0%, #5a67d8 100%) !important;
    }

    .bg-info {
      background: linear-gradient(135deg, #3182ce 0%, #2b77cb 100%) !important;
    }

    .bg-success {
      background: linear-gradient(135deg, #38a169 0%, #2f855a 100%) !important;
    }

    .bg-warning {
      background: linear-gradient(135deg, #d69e2e 0%, #b7791f 100%) !important;
    }

    .bg-secondary {
      background: linear-gradient(135deg, #718096 0%, #4a5568 100%) !important;
    }

    /* ===== INFO BOXES (Alternative Style) ===== */
    .info-box {
      background: rgba(255, 255, 255, 0.95);
      border-radius: var(--border-radius-lg);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
      backdrop-filter: blur(20px);
      transition: var(--transition);
      margin-bottom: 2rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
      overflow: hidden;
      position: relative;
      z-index: 3;
    }

    .info-box:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
    }

    .info-box-icon {
      border-radius: var(--border-radius-lg) 0 0 var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      width: 120px;
      position: relative;
    }

    .info-box-icon i {
      font-size: 2.5rem;
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .info-box-content {
      padding: 1.5rem;
    }

    .info-box-number {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0.25rem;
    }

    .info-box-text {
      font-size: 1rem;
      font-weight: 500;
      color: var(--text-light);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* ===== CARD COMPONENTS ===== */
    .card {
      border-radius: var(--border-radius-lg);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      transition: var(--transition);
      position: relative;
      z-index: 3;
    }

    .card:hover {
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
      transform: translateY(-4px);
    }

    .card-header {
      background: var(--primary-gradient);
      color: white;
      border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
      border-bottom: none;
      padding: 1rem 1.5rem;
      font-weight: 600;
    }

    .card-body {
      padding: 1.5rem;
    }

    /* ===== TABLE STYLING ===== */
    .table {
      color: var(--text-dark);
    }

    .table th {
      background: var(--bg-light);
      font-weight: 600;
      color: var(--text-dark);
      border-color: var(--border-color);
      padding: 1rem 0.75rem;
    }

    .table td {
      padding: 0.875rem 0.75rem;
      border-color: var(--border-color);
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background: rgba(102, 126, 234, 0.02);
    }

    /* ===== BUTTONS ===== */
    .btn-primary {
      background: var(--primary-gradient);
      border: none;
      font-weight: 500;
      padding: 0.5rem 1.5rem;
      border-radius: 8px;
      transition: var(--transition);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-success {
      background: var(--secondary-gradient);
      border: none;
    }

    .btn-warning {
      background: var(--warning-gradient);
      border: none;
    }

    /* ===== FLOATING ACTION ELEMENTS ===== */
    .floating-element {
      position: absolute;
      color: rgba(255, 255, 255, 0.1);
      font-size: 2rem;
      animation: float 6s ease-in-out infinite;
      pointer-events: none;
    }

    .floating-element:nth-child(1) {
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
      top: 30%;
      right: 15%;
      animation-delay: 2s;
    }

    .floating-element:nth-child(3) {
      bottom: 30%;
      left: 20%;
      animation-delay: 4s;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0px) rotate(0deg);
      }

      25% {
        transform: translateY(-15px) rotate(5deg);
      }

      50% {
        transform: translateY(-25px) rotate(0deg);
      }

      75% {
        transform: translateY(-10px) rotate(-3deg);
      }
    }

    @keyframes backgroundMove {

      0%,
      100% {
        transform: translateX(0) translateY(0);
      }

      25% {
        transform: translateX(-20px) translateY(-10px);
      }

      50% {
        transform: translateX(10px) translateY(-20px);
      }

      75% {
        transform: translateX(-10px) translateY(10px);
      }
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
      .content-header {
        padding: 2rem 0 3rem 0;
      }

      .content-header h1 {
        font-size: 1.8rem;
      }

      .content {
        margin-top: -1rem;
      }

      .small-box .inner {
        padding: 1.5rem 1rem;
      }

      .small-box .inner h3 {
        font-size: 2.5rem;
      }

      .small-box .icon {
        font-size: 2.5rem;
        top: 1rem;
        right: 1rem;
      }

      .stats-cards {
        padding: 0 0.5rem;
      }

      .brand-text {
        font-size: 0.9rem !important;
      }

      .user-panel {
        padding: 0.5rem;
        margin: 0.75rem 0.5rem;
      }

      .user-panel .info a {
        font-size: 0.8rem;
      }
    }

    @media (max-width: 576px) {
      .main-header .navbar-nav .nav-link {
        padding: 0.5rem 0.75rem;
        margin: 0 0.125rem;
      }

      .brand-text {
        font-size: 0.8rem !important;
      }

      .user-panel {
        margin: 0.5rem;
        padding: 0.5rem;
      }

      .user-panel .info a {
        font-size: 0.75rem;
      }

      .user-panel .info small {
        font-size: 0.7rem;
      }
    }

    /* ===== UTILITY CLASSES ===== */
    .text-gradient {
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .shadow-custom {
      box-shadow: var(--shadow-lg);
    }

    .border-radius-custom {
      border-radius: var(--border-radius-lg);
    }

    /* ===== LOADING & ANIMATION ===== */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.6s ease-out forwards;
    }

    .fade-in:nth-child(1) {
      animation-delay: 0.1s;
    }

    .fade-in:nth-child(2) {
      animation-delay: 0.2s;
    }

    .fade-in:nth-child(3) {
      animation-delay: 0.3s;
    }

    .fade-in:nth-child(4) {
      animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ===== DARK MODE SUPPORT (Optional) ===== */
    @media (prefers-color-scheme: dark) {
      :root {
        --text-dark: #f7fafc;
        --text-light: #e2e8f0;
        --bg-light: #2d3748;
        --bg-card: #4a5568;
        --border-color: #4a5568;
      }
    }
  </style>

  @yield('addCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="fas fa-home"></i>Home
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i>Dashboard
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link logout-btn">
            <i class="fas fa-sign-out-alt"></i>Logout
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link">
        <i class="fas fa-book-open brand-icon"></i>
        <span class="brand-text">Perpustakaan<br>Gamelab</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            <small>Administrator</small>
          </div>
        </div>

        <!-- Sidebar Search Form -->
        <div class="form-inline mb-3">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search menu..."
              aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('daftarKategori') }}"
                class="nav-link {{ request()->routeIs('daftarKategori') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags"></i>
                <p>Daftar Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('daftarBuku') }}"
                class="nav-link {{ request()->routeIs('daftarBuku') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-open"></i>
                <p>Daftar Buku</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    @yield('content')

    <!-- Scripts -->
    @include('sweetalert::alert')
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>
      // Initialize fade-in animations
      document.addEventListener('DOMContentLoaded', function () {
        const fadeElements = document.querySelectorAll('.fade-in');
        fadeElements.forEach((el, index) => {
          setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
          }, index * 100);
        });
      });

      // Enhanced navbar interactions
      $(document).ready(function () {
        // Smooth hover effects for nav links
        $('.nav-link').hover(
          function () {
            $(this).addClass('animate__animated animate__pulse');
          },
          function () {
            $(this).removeClass('animate__animated animate__pulse');
          }
        );

        // Card hover effects
        $('.small-box, .info-box, .card').hover(
          function () {
            $(this).addClass('shadow-lg');
          },
          function () {
            $(this).removeClass('shadow-lg');
          }
        );
      });
    </script>

    @yield('addJavascript')

  </div>
</body>

</html>