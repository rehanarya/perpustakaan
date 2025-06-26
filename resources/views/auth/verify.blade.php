<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email - Perpustakaan Gamelab</title>
    <meta name="description" content="Verifikasi alamat email Anda untuk melanjutkan ke sistem perpustakaan Gamelab">

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
            --success-gradient: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --white: #ffffff;
            --success-color: #38a169;
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
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .auth-container {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 2rem 0;
        }

        .auth-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            max-width: 500px;
            margin: 0 auto;
            animation: slideUp 0.8s ease-out;
        }

        .auth-header {
            background: var(--primary-gradient);
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            color: var(--white);
            position: relative;
        }

        .auth-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 20px;
            background: var(--white);
            border-radius: 20px 20px 0 0;
        }

        .auth-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            backdrop-filter: blur(10px);
            animation: pulse 2s infinite;
        }

        .auth-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .auth-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            opacity: 0.9;
            font-size: 0.95rem;
            font-weight: 400;
        }

        .auth-body {
            padding: 2rem;
        }

        .verification-content {
            text-align: center;
        }

        .verification-icon {
            width: 120px;
            height: 120px;
            background: var(--success-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: bounce 1s ease-out;
        }

        .verification-icon i {
            font-size: 3rem;
            color: var(--white);
        }

        .verification-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .verification-text {
            color: var(--text-light);
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .email-highlight {
            background: linear-gradient(135deg, #667eea20, #764ba220);
            padding: 1rem;
            border-radius: 12px;
            border-left: 4px solid #667eea;
            margin: 1.5rem 0;
            text-align: left;
        }

        .email-highlight i {
            color: #667eea;
            margin-right: 0.5rem;
        }

        .resend-section {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 12px;
            margin: 1.5rem 0;
            text-align: center;
        }

        .resend-text {
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            color: var(--white);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.95;
            color: var(--white);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: var(--white);
            border: 2px solid #e2e8f0;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            color: var(--text-dark);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 1rem;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #667eea;
            color: #667eea;
            text-decoration: none;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .alert-success {
            background: linear-gradient(135deg, #38a16920, #68d39120);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }

        .back-home {
            position: fixed;
            top: 2rem;
            left: 2rem;
            z-index: 1000;
        }

        .back-home a {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .back-home a:hover {
            background: rgba(255, 255, 255, 0.3);
            color: var(--white);
            transform: translateX(-5px);
        }

        .back-home i {
            margin-right: 0.5rem;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-email {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            animation: float 6s ease-in-out infinite;
        }

        .floating-email:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-email:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-email:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-email:nth-child(4) {
            bottom: 10%;
            right: 10%;
            animation-delay: 1s;
        }

        .steps {
            text-align: left;
            margin: 1.5rem 0;
        }

        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding: 0.5rem;
        }

        .step-number {
            width: 30px;
            height: 30px;
            background: var(--primary-gradient);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .step-content {
            flex: 1;
            padding-top: 0.25rem;
        }

        .step-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }

        .step-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
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

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes bounce {

            0%,
            20%,
            53%,
            80%,
            100% {
                transform: translateY(0);
            }

            40%,
            43% {
                transform: translateY(-10px);
            }

            70% {
                transform: translateY(-5px);
            }

            90% {
                transform: translateY(-2px);
            }
        }

        @media (max-width: 768px) {
            .auth-card {
                margin: 1rem;
                max-width: none;
            }

            .auth-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .auth-body {
                padding: 1.5rem;
            }

            .back-home {
                top: 1rem;
                left: 1rem;
            }

            .floating-email {
                display: none;
            }

            .btn-secondary {
                margin-left: 0;
                margin-top: 0.5rem;
                width: 100%;
            }

            .verification-icon {
                width: 100px;
                height: 100px;
            }

            .verification-icon i {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Back to Home -->
    <div class="back-home">
        <a href="{{ route('home') }}">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>
    </div>

    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="floating-email"><i class="fas fa-envelope"></i></div>
        <div class="floating-email"><i class="fas fa-envelope-open"></i></div>
        <div class="floating-email"><i class="fas fa-paper-plane"></i></div>
        <div class="floating-email"><i class="fas fa-check-circle"></i></div>
    </div>

    <!-- Main Content -->
    <div class="auth-container">
        <div class="container">
            <div class="auth-card">
                <!-- Header -->
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h1 class="auth-title">Verifikasi Email</h1>
                    <p class="auth-subtitle">Konfirmasi alamat email Anda untuk melanjutkan</p>
                </div>

                <!-- Body -->
                <div class="auth-body">
                    <!-- Success Alert -->
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="verification-content">
                        <div class="verification-icon">
                            <i class="fas fa-mail-bulk"></i>
                        </div>

                        <h2 class="verification-title">Cek Email Anda</h2>

                        <p class="verification-text">
                            Kami telah mengirimkan link verifikasi ke alamat email Anda.
                            Silakan periksa inbox dan klik link tersebut untuk melanjutkan.
                        </p>

                        <div class="email-highlight">
                            <i class="fas fa-info-circle"></i>
                            <strong>Langkah Verifikasi:</strong>
                        </div>

                        <div class="steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <div class="step-title">Buka Email Anda</div>
                                    <div class="step-text">Periksa inbox email yang Anda daftarkan</div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <div class="step-title">Cari Email Verifikasi</div>
                                    <div class="step-text">Cari email dari Perpustakaan Gamelab dengan subjek verifikasi
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <div class="step-title">Klik Link Verifikasi</div>
                                    <div class="step-text">Klik tombol atau link verifikasi dalam email tersebut</div>
                                </div>
                            </div>
                        </div>

                        <div class="resend-section">
                            <p class="resend-text">
                                <i class="fas fa-question-circle me-1"></i>
                                Tidak menerima email verifikasi?
                            </p>

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    {{ __('Kirim Ulang Email') }}
                                </button>
                            </form>

                            <a href="{{ route('login') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke Login
                            </a>
                        </div>

                        <div class="email-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <small>
                                <strong>Tips:</strong> Jika tidak menemukan email, periksa folder spam atau junk mail
                                Anda.
                                Email mungkin memerlukan beberapa menit untuk sampai.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add loading state to resend button
        document.querySelector('form').addEventListener('submit', function () {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
            submitBtn.disabled = true;

            // Re-enable after 5 seconds as fallback
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 5000);
        });

        // Auto-hide success alert
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.opacity = '0';
                successAlert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 300);
            }, 5000);
        }

        // Add smooth scroll to top when page loads
        window.addEventListener('load', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>