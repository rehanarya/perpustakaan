@extends('adminlte.layouts.app')

@section('addCss')
    <style>
        /* Base Layout */
        .content-wrapper {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }

        .container-fluid {
            padding: 0 1rem;
            max-width: 1400px;
            margin: 0 auto;
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

        .text-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .content-header .subtitle {
            color: #64748b;
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-top: 1.5rem;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            border-radius: 16px 16px 0 0;
        }

        /* Form Header */
        .form-header {
            background: transparent;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            border-radius: 16px 16px 0 0;
            position: relative;
            z-index: 1;
        }

        .form-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .form-title {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 1rem;
            font-weight: 400;
            margin: 0.5rem 0 0 0;
        }

        /* Form Body */
        .form-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-group label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            display: block;
        }

        .form-group label i {
            color: #6366f1;
            margin-right: 0.5rem;
            width: 16px;
        }

        /* Form Controls - Enhanced sizing for better visibility */
        .form-control {
            border-radius: 12px;
            border: 2px solid rgba(226, 232, 240, 0.8);
            padding: 18px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(248, 250, 252, 0.8);
            backdrop-filter: blur(10px);
            min-height: 64px;
            line-height: 1.5;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
            background-color: white;
            transform: translateY(-1px);
        }

        /* Textarea */
        textarea.form-control {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
            padding: 20px 24px;
            font-size: 1.05rem;
        }

        /* File Upload Hint */
        .file-upload-hint {
            font-size: 0.95rem;
            color: #64748b;
            margin-top: 0.75rem;
            font-weight: 500;
        }

        /* Buttons */
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

        .btn-primary-custom {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 14px 28px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
            font-size: 1rem;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(99, 102, 241, 0.3);
        }

        .btn-warning-custom {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            font-size: 1rem;
        }

        .btn-warning-custom:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            color: white;
        }

        .back-btn {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 4px rgba(100, 116, 139, 0.2);
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(100, 116, 139, 0.3);
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(226, 232, 240, 0.5);
        }

        /* Validation */
        .form-control.is-invalid {
            border-color: #ef4444;
            background-color: rgba(254, 242, 242, 0.8);
        }

        .form-control.is-invalid:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.25);
        }

        .alert-danger {
            border-radius: 8px;
            border: none;
            background: rgba(254, 242, 242, 0.8);
            color: #dc2626;
            border-left: 4px solid #ef4444;
            padding: 0.75rem 1rem;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        /* Animation */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container-fluid {
                padding: 0 0.75rem;
            }

            .content-header h1 {
                font-size: 1.75rem;
            }

            .form-header {
                padding: 1.25rem 1.5rem;
            }

            .form-header-row {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .form-body {
                padding: 1.5rem;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-primary-custom,
            .btn-warning-custom {
                width: 100%;
            }

            .form-control {
                padding: 18px 20px;
                font-size: 1rem;
                min-height: 56px;
            }
        }

        @media (max-width: 576px) {
            .form-title {
                font-size: 1.25rem;
            }

            .form-body {
                padding: 1.25rem;
            }

            .form-control {
                padding: 16px 18px;
                font-size: 0.95rem;
                min-height: 52px;
            }

            .btn-primary-custom,
            .btn-warning-custom {
                padding: 12px 22px;
                font-size: 0.95rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Tambah <span class="text-gradient">Buku</span></h1>
                <p class="subtitle">Lengkapi informasi buku yang akan ditambahkan ke perpustakaan</p>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="form-container fade-in">
                    
                    <!-- Form Header -->
                    <div class="form-header">
                        <div class="form-header-row">
                            <div>
                                <h2 class="form-title">
                                    <i class="fas fa-plus-circle mr-2" style="color: #6366f1;"></i>
                                    Tambah Buku Baru
                                </h2>
                                <p class="form-subtitle">
                                    Isi form di bawah ini dengan informasi buku yang lengkap dan akurat
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('daftarBuku') }}" class="back-btn">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Form Body -->
                    <div class="form-body">
                        <form action="{{ route('admin.storeBuku') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="id_kategori">
                                    <i class="fas fa-tag"></i>
                                    Kategori Buku
                                </label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror" 
                                        name="id_kategori" id="id_kategori" required>
                                    <option value="">Pilih Kategori Buku</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">
                                    <i class="fas fa-image"></i>
                                    Gambar Cover Buku
                                </label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                       name="gambar" id="gambar" accept="image/*">
                                <div class="file-upload-hint">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.
                                </div>
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="judul">
                                    <i class="fas fa-book"></i>
                                    Judul Buku
                                </label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                       name="judul" id="judul" value="{{ old('judul') }}" 
                                       placeholder="Masukkan judul buku yang lengkap dan jelas" required>
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">
                                    <i class="fas fa-align-left"></i>
                                    Deskripsi Buku
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                          name="deskripsi" id="deskripsi" rows="5"
                                          placeholder="Masukkan deskripsi buku, sinopsis, atau ringkasan isi buku"
                                          required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="button-group">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan Buku
                                </button>
                                <button type="reset" class="btn btn-warning-custom">
                                    <i class="fas fa-undo mr-2"></i>
                                    Reset Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('addJavascript')
    <script>
        $(function () {
            // File size validation
            $('input[type="file"]').on('change', function() {
                const file = this.files[0];
                if (file && file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    $(this).val('');
                }
            });

            // Form submission loading state
            $('form').on('submit', function () {
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true);
                submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...');
            });

            // Enhanced button click animation (consistent with index.blade.php)
            $('.btn').on('click', function () {
                $(this).css('transform', 'scale(0.98)');
                setTimeout(() => {
                    $(this).css('transform', '');
                }, 150);
            });

            // Form container fade-in animation
            $('.form-container').addClass('fade-in');

            // Enhanced form interactions with staggered animations
            $('.form-group').each(function (index) {
                $(this).css({
                    'animation': 'fadeIn 0.6s ease-in-out',
                    'animation-delay': (index * 0.1) + 's'
                });
            });

            // Enhanced form control focus animations
            $('.form-control').on('focus', function () {
                $(this).parent().addClass('focused');
                $(this).css('transform', 'translateY(-1px)');
            }).on('blur', function () {
                $(this).parent().removeClass('focused');
                $(this).css('transform', 'translateY(0)');
            });

            // Enhanced hover effects for form elements
            $('.form-control').hover(
                function () {
                    if (!$(this).is(':focus')) {
                        $(this).css('border-color', 'rgba(99, 102, 241, 0.4)');
                    }
                },
                function () {
                    if (!$(this).is(':focus')) {
                        $(this).css('border-color', 'rgba(226, 232, 240, 0.8)');
                    }
                }
            );

            // Back button enhanced animation
            $('.back-btn').hover(
                function () {
                    $(this).css('transform', 'translateY(-2px) scale(1.02)');
                },
                function () {
                    $(this).css('transform', 'translateY(0) scale(1)');
                }
            );

            // Form validation feedback animations
            $('.form-control').on('invalid', function () {
                $(this).css({
                    'animation': 'shake 0.5s ease-in-out',
                    'border-color': '#ef4444'
                });
            });

            // Add shake animation keyframes
            $('<style>@keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }</style>').appendTo('head');
        });
    </script>
@endsection