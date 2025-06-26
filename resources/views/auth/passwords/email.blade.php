<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - Perpustakaan Gamelab</title>
    <meta name="description" content="Reset password sistem manajemen perpustakaan modern Gamelab">

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
            --success: #38a169;
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
            max-width: 450px;
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: var(--transition);
            background: #f8fafc;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: var(--white);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
            background: #fef5f5;
        }

        .invalid-feedback {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            background: none;
            border: none;
            z-index: 5;
            font-size: 1.1rem;
        }

        .input-group .form-control {
            padding-left: 3rem;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            opacity: 0.95;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-link:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .auth-footer {
            text-align: center;
            padding: 1.5rem 2rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .auth-footer p {
            color: var(--text-light);
            margin-bottom: 0;
        }

        .auth-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .auth-footer a:hover {
            color: #5a67d8;
            text-decoration: underline;
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

        .floating-book {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            animation: float 6s ease-in-out infinite;
        }

        .floating-book:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-book:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-book:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-book:nth-child(4) {
            bottom: 10%;
            right: 10%;
            animation-delay: 1s;
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

            .floating-book {
                display: none;
            }
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .alert-success {
            background: #f0fff4;
            color: var(--success);
            border-left: 4px solid var(--success);
        }

        .alert-success i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }

        .info-text {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 12px;
            padding: 1rem;
            color: #0369a1;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .info-text i {
            color: #0284c7;
            margin-right: 0.5rem;
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
        <div class="floating-book"><i class="fas fa-book"></i></div>
        <div class="floating-book"><i class="fas fa-bookmark"></i></div>
        <div class="floating-book"><i class="fas fa-book-open"></i></div>
        <div class="floating-book"><i class="fas fa-graduation-cap"></i></div>
    </div>

    <!-- Main Content -->
    <div class="auth-container">
        <div class="container">
            <div class="auth-card">
                <!-- Header -->
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <h1 class="auth-title">Reset Password</h1>
                    <p class="auth-subtitle">Masukkan email Anda untuk reset password</p>
                </div>

                <!-- Body -->
                <div class="auth-body">
                    <!-- Success Message -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Info Text -->
                    <div class="info-text">
                        <i class="fas fa-info-circle"></i>
                        Masukkan alamat email yang terdaftar. Kami akan mengirimkan link untuk reset password ke email
                        Anda.
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>
                                {{ __('Email Address') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Masukkan email Anda">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>
                            {{ __('Send Password Reset Link') }}
                        </button>

                        <!-- Back to Login -->
                        <div class="text-center mt-3">
                            <a class="btn-link" href="{{ route('login') }}">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali ke Login
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>
                        Ingat password Anda?
                        <a href="{{ route('login') }}">
                            Login sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form validation enhancement
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const emailInput = form.querySelector('input[type="email"]');

            // Email validation
            emailInput.addEventListener('blur', function () {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value.trim() === '' || !emailRegex.test(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });

            emailInput.addEventListener('input', function () {
                if (this.classList.contains('is-invalid') && this.value.trim() !== '') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (emailRegex.test(this.value)) {
                        this.classList.remove('is-invalid');
                    }
                }
            });
        });

        // Add loading state to submit button
        document.querySelector('form').addEventListener('submit', function () {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
            submitBtn.disabled = true;

            // Re-enable after 10 seconds as fallback
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 10000);
        });

        // Auto hide success message after 5 seconds
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
    </script>
</body>

</html>