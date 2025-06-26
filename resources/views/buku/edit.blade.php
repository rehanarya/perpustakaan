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

        /* Select Styling */
        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 15px center;
            background-repeat: no-repeat;
            background-size: 18px 14px;
            padding-right: 50px;
            appearance: none;
            cursor: pointer;
        }

        /* File Input */
        input[type="file"].form-control {
            padding: 18px 20px;
            background: rgba(248, 250, 252, 0.8);
            border-style: dashed;
            border-width: 2px;
            border-color: rgba(99, 102, 241, 0.3);
            min-height: 60px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="file"].form-control:focus {
            background-color: white;
            border-color: #6366f1;
            transform: translateY(-1px);
        }

        input[type="file"].form-control:hover {
            border-color: rgba(99, 102, 241, 0.5);
            background: rgba(255, 255, 255, 0.9);
        }

        .file-upload-hint {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 0.5rem;
            padding-left: 4px;
            font-weight: 500;
        }

        /* Textarea */
        textarea.form-control {
            resize: vertical;
            min-height: 150px;
            line-height: 1.6;
            padding: 20px 24px;
            font-size: 1.05rem;
        }

        /* Current Image Display */
        .current-image {
            padding: 20px;
            background: rgba(248, 250, 252, 0.8);
            border-radius: 12px;
            border: 2px solid rgba(226, 232, 240, 0.5);
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
        }

        .current-image img {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .current-image img:hover {
            transform: scale(1.02);
        }

        /* Image Preview */
        .image-preview {
            padding: 20px;
            background: rgba(248, 250, 252, 0.8);
            border-radius: 12px;
            border: 2px solid rgba(99, 102, 241, 0.2);
            margin-top: 15px;
            backdrop-filter: blur(10px);
            animation: fadeIn 0.3s ease-in-out;
        }

        .image-preview img {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        /* CKEditor Styling */
        .cke {
            border-radius: 12px !important;
            border: 2px solid rgba(226, 232, 240, 0.8) !important;
            margin-top: 5px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .cke_top {
            border-radius: 12px 12px 0 0 !important;
            background: rgba(248, 250, 252, 0.8) !important;
            min-height: 40px !important;
            border-bottom: 1px solid rgba(226, 232, 240, 0.5) !important;
        }

        .cke_bottom {
            border-radius: 0 0 12px 12px !important;
            background: rgba(248, 250, 252, 0.8) !important;
        }

        .cke:focus-within {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25) !important;
            transform: translateY(-1px);
        }

        .cke_contents {
            min-height: 180px !important;
            background: white !important;
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

            select.form-control {
                padding-right: 45px;
                background-size: 16px 12px;
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
                <h1 class="m-0">Edit <span class="text-gradient">Buku</span></h1>
                <p class="subtitle">Perbarui informasi buku yang sudah ada di sistem perpustakaan</p>
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
                                    <i class="fas fa-edit mr-2" style="color: #6366f1;"></i>
                                    Edit Buku
                                </h2>
                                <p class="form-subtitle">
                                    Perbarui informasi buku yang sudah ada di perpustakaan
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
                        <form action="{{ route('admin.updateBuku', $buku) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Kategori Buku -->
                            <div class="form-group">
                                <label for="id_kategori">
                                    <i class="fas fa-tag"></i>
                                    Kategori Buku
                                </label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror" 
                                        name="id_kategori" id="id_kategori" required>
                                    <option value="">Pilih Kategori Buku</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" 
                                                {{ old('id_kategori', $buku->id_kategori) == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gambar Cover -->
                            <div class="form-group">
                                <label>
                                    <i class="fas fa-image"></i>
                                    Gambar Cover Buku
                                </label>
                                @if($buku->gambar)
                                    <div class="current-image">
                                        <label class="text-muted mb-2 d-block" style="font-weight: 500;">Gambar Saat Ini:</label>
                                        <img src="{{ asset('storage/buku/' . $buku->gambar) }}" 
                                             alt="Cover {{ $buku->judul }}" 
                                             class="img-thumbnail" 
                                             style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                       name="gambar" accept="image/*" id="gambar">
                                <div class="file-upload-hint">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Format yang didukung: JPG, PNG, GIF. Maksimal 2MB. 
                                    @if($buku->gambar) Kosongkan jika tidak ingin mengubah gambar. @endif
                                </div>
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Judul Buku -->
                            <div class="form-group">
                                <label for="judul">
                                    <i class="fas fa-book"></i>
                                    Judul Buku
                                </label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                       name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" 
                                       placeholder="Masukkan judul buku yang lengkap dan jelas" required>
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi Buku -->
                            <div class="form-group">
                                <label for="deskripsi">
                                    <i class="fas fa-align-left"></i>
                                    Deskripsi Buku
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                          name="deskripsi" rows="5" id="deskripsi"
                                          placeholder="Masukkan deskripsi buku, sinopsis, atau ringkasan isi buku"
                                          required>{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="button-group">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-save mr-2"></i>
                                    Update Buku
                                </button>
                                <a href="{{ route('daftarBuku') }}" class="btn btn-warning-custom">
                                    <i class="fas fa-times mr-2"></i>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('addJavascript')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        $(function () {
            // CKEditor Configuration
            CKEDITOR.replace('deskripsi', {
                height: 200,
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'tools', items: ['Maximize'] }
                ],
                removePlugins: 'elementspath',
                resize_enabled: false,
                on: {
                    focus: function() {
                        $('.cke').css('transform', 'translateY(-1px)');
                    },
                    blur: function() {
                        $('.cke').css('transform', 'translateY(0)');
                    }
                }
            });

            // Form submission loading state
            $('form').on('submit', function () {
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true);
                submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Memperbarui...');
            });

            // Enhanced button click animation
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

            // File validation and preview with enhanced styling
            const fileInput = $('#gambar');
            if (fileInput.length) {
                fileInput.on('change', function() {
                    const file = this.files[0];
                    
                    // File size validation (2MB)
                    if (file && file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 2MB.');
                        this.value = '';
                        return;
                    }
                    
                    // Image preview with enhanced styling
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Remove existing preview
                            const existingPreview = $('.image-preview');
                            if (existingPreview.length) {
                                existingPreview.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            }
                            
                            // Create new preview with animation
                            setTimeout(() => {
                                const preview = $(`
                                    <div class="image-preview" style="opacity: 0;">
                                        <label class="text-muted mb-2 d-block" style="font-weight: 500;">Preview Gambar Baru:</label>
                                        <img src="${e.target.result}" alt="Preview" class="img-thumbnail" 
                                             style="max-width: 200px; max-height: 200px;">
                                    </div>
                                `);
                                fileInput.parent().append(preview);
                                preview.animate({ opacity: 1 }, 300);
                            }, 300);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Character counter for textarea (before CKEditor initialization)
            const textarea = $('#deskripsi');
            if (textarea.length) {
                // Add character counter
                const counter = $('<div class="text-muted small mt-1" style="text-align: right;"></div>');
                textarea.parent().append(counter);

                function updateCounter() {
                    let length;
                    if (CKEDITOR.instances.deskripsi) {
                        length = CKEDITOR.instances.deskripsi.getData().replace(/<[^>]*>/g, '').length;
                    } else {
                        length = textarea.val().length;
                    }
                    counter.text(`${length} karakter`);

                    // Color coding based on length
                    if (length < 50) {
                        counter.css('color', '#ef4444'); // Red - too short
                    } else if (length > 500) {
                        counter.css('color', '#f59e0b'); // Yellow - getting long
                    } else {
                        counter.css('color', '#10b981'); // Green - good length
                    }
                }

                // Update counter when CKEditor content changes
                if (typeof CKEDITOR !== 'undefined') {
                    CKEDITOR.on('instanceReady', function(ev) {
                        if (ev.editor.name === 'deskripsi') {
                            ev.editor.on('key', updateCounter);
                            ev.editor.on('change', updateCounter);
                            updateCounter(); // Initial count
                        }
                    });
                }

                textarea.on('input', updateCounter);
                updateCounter(); // Initial count
            }

            // Input validation feedback
            $('.form-control').on('blur', function () {
                if ($(this).attr('required') && !$(this).val().trim()) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            }).on('input', function () {
                if ($(this).val().trim()) {
                    $(this).removeClass('is-invalid');
                }
            });

            // Select validation
            $('select.form-control').on('change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                } else if ($(this).attr('required')) {
                    $(this).addClass('is-invalid');
                }
            });

            // Add shake animation keyframes
            $('<style>@keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }</style>').appendTo('head');
        });
    </script>
@endsection