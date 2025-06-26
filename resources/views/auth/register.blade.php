<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Perpustakaan Gamelab</title>
    <meta name="description" content="Daftar akun baru di sistem manajemen perpustakaan modern Gamelab">

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
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
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
            margin-top: 1rem;
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

        .floating-book:nth-child(5) {
            top: 40%;
            left: 5%;
            animation-delay: 3s;
        }

        .floating-book:nth-child(6) {
            top: 80%;
            right: 25%;
            animation-delay: 5s;
        }

        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .password-strength.weak {
            color: #e53e3e;
        }

        .password-strength.medium {
            color: #f6ad55;
        }

        .password-strength.strong {
            color: #38a169;
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
            body {
                padding: 1rem 0;
            }

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
        }

        .alert-danger {
            background: #fef5f5;
            color: #e53e3e;
            border-left: 4px solid #e53e3e;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        @media (max-width: 576px) {
            .form-row {
                flex-direction: column;
                gap: 0;
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
        <div class="floating-book"><i class="fas fa-book"></i></div>
        <div class="floating-book"><i class="fas fa-bookmark"></i></div>
        <div class="floating-book"><i class="fas fa-book-open"></i></div>
        <div class="floating-book"><i class="fas fa-graduation-cap"></i></div>
        <div class="floating-book"><i class="fas fa-user-graduate"></i></div>
        <div class="floating-book"><i class="fas fa-library"></i></div>
    </div>

    <!-- Main Content -->
    <div class="auth-container">
        <div class="container">
            <div class="auth-card">
                <!-- Header -->
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h1 class="auth-title">Daftar Akun Baru</h1>
                    <p class="auth-subtitle">Bergabunglah dengan Perpustakaan Gamelab</p>
                </div>

                <!-- Body -->
                <div class="auth-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i>
                                {{ __('Nama Lengkap') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Masukkan nama lengkap Anda">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>
                                {{ __('Alamat Email') }}
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Masukkan alamat email Anda">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Fields Row -->
                        <div class="form-row">
                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>
                                    {{ __('Password') }}
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Masukkan password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div id="password-strength" class="password-strength"></div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password-confirm" class="form-label">
                                    <i class="fas fa-lock me-2"></i>
                                    {{ __('Konfirmasi Password') }}
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Konfirmasi password">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('Daftar Sekarang') }}
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="auth-footer">
                    <p>
                        Sudah punya akun?
                        <a href="{{ route('login') }}">
                            Masuk di sini
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
            const inputs = form.querySelectorAll('input[required]');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password-confirm');
            const passwordStrengthDiv = document.getElementById('password-strength');

            // Input validation
            inputs.forEach(input => {
                input.addEventListener('blur', function () {
                    if (this.value.trim() === '') {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });

                input.addEventListener('input', function () {
                    if (this.classList.contains('is-invalid') && this.value.trim() !== '') {
                        this.classList.remove('is-invalid');
                    }
                });
            });

            // Password strength checker
            if (passwordInput) {
                passwordInput.addEventListener('input', function () {
                    const password = this.value;
                    const strength = checkPasswordStrength(password);

                    passwordStrengthDiv.textContent = strength.text;
                    passwordStrengthDiv.className = `password-strength ${strength.class}`;
                });
            }

            // Password confirmation checker
            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', function () {
                    const password = passwordInput.value;
                    const confirmPassword = this.value;

                    if (confirmPassword && password !== confirmPassword) {
                        this.classList.add('is-invalid');

                        // Remove existing feedback
                        const existingFeedback = this.parentNode.querySelector('.invalid-feedback');
                        if (existingFeedback) {
                            existingFeedback.remove();
                        }

                        // Add new feedback
                        const feedback = document.createElement('div');
                        feedback.className = 'invalid-feedback';
                        feedback.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i>Password tidak sama';
                        this.parentNode.appendChild(feedback);
                    } else {
                        this.classList.remove('is-invalid');
                        const existingFeedback = this.parentNode.querySelector('.invalid-feedback');
                        if (existingFeedback) {
                            existingFeedback.remove();
                        }
                    }
                });
            }

            function checkPasswordStrength(password) {
                if (password.length === 0) {
                    return { text: '', class: '' };
                }

                let score = 0;

                // Length check
                if (password.length >= 8) score += 1;
                if (password.length >= 12) score += 1;

                // Character variety
                if (/[a-z]/.test(password)) score += 1;
                if (/[A-Z]/.test(password)) score += 1;
                if (/[0-9]/.test(password)) score += 1;
                if (/[^A-Za-z0-9]/.test(password)) score += 1;

                if (score < 3) {
                    return { text: 'Password lemah', class: 'weak' };
                } else if (score < 5) {
                    return { text: 'Password sedang', class: 'medium' };
                } else {
                    return { text: 'Password kuat', class: 'strong' };
                }
            }
        });

        // Add loading state to submit button
        document.querySelector('form').addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;

            // Final validation
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak sama!');
                return;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            submitBtn.disabled = true;

            // Re-enable after 5 seconds as fallback
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 5000);
        });
    </script>
</body>

</html>