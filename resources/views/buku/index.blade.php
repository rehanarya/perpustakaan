@extends('adminlte.layouts.app')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
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

        /* Table Container */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-top: 1rem;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
        }

        .table-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            border-radius: 16px 16px 0 0;
        }

        /* Table Header */
        .table-header {
            background: transparent;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            border-radius: 16px 16px 0 0;
            position: relative;
            z-index: 1;
        }

        .table-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .search-section {
            flex: 1;
            max-width: 400px;
        }

        .button-section {
            flex-shrink: 0;
        }

        /* Search Input */
        .search-wrapper {
            position: relative;
        }

        .search-wrapper .form-control {
            border-radius: 25px;
            border: 2px solid rgba(226, 232, 240, 0.8);
            padding: 14px 20px 14px 50px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(248, 250, 252, 0.8);
            backdrop-filter: blur(10px);
        }

        .search-wrapper .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
            background-color: white;
            transform: translateY(-1px);
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .search-wrapper:hover .search-icon {
            color: #6366f1;
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

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .add-book-btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
        }

        .add-book-btn:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(99, 102, 241, 0.3);
        }

        .action-buttons .btn {
            margin-right: 4px;
            border-radius: 8px;
            padding: 8px 12px;
        }

        /* Table Styling */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-weight: 600;
            border: none;
            padding: 18px 20px;
            font-size: 0.95rem;
            color: #1e293b;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border-top: 1px solid rgba(226, 232, 240, 0.5);
        }

        /* Row Number */
        .row-number {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 8px 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: 0 2px 4px rgba(99, 102, 241, 0.2);
        }

        /* Book Image */
        .book-image {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .book-image:hover {
            transform: scale(1.05);
        }

        .book-image-placeholder {
            width: 60px;
            height: 80px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 8px;
            border: 2px dashed rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .book-image-placeholder:hover {
            border-color: rgba(99, 102, 241, 0.5);
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        /* Category Badge */
        .category-badge {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
            border: none;
            box-shadow: 0 2px 4px rgba(99, 102, 241, 0.2);
            transition: all 0.3s ease;
        }

        .category-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(99, 102, 241, 0.3);
        }

        .no-category-badge {
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            color: #64748b;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Book Content */
        .book-title {
            max-width: 200px;
            font-weight: 600;
            color: #1e293b;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .book-description {
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* Footer Info */
        .footer-info {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 0 0 16px 16px;
            padding: 1.25rem 2rem;
            border-top: 1px solid rgba(226, 232, 240, 0.5);
        }

        .footer-info small {
            color: #64748b;
            font-weight: 500;
        }

        /* DataTables Styling */
        .dataTables_wrapper .dataTables_info {
            padding-left: 2rem;
            padding-bottom: 15px;
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding-right: 2rem;
            padding-bottom: 15px;
            text-align: center;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background: white;
            font-size: 0.85rem;
            min-width: 36px;
            height: 36px;
            line-height: 24px;
            text-align: center;
            color: #64748b;
            border-radius: 8px;
            margin: 0 2px;
            transition: all 0.3s ease;
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-color: rgba(99, 102, 241, 0.3);
            color: #1e293b;
            transform: translateY(-1px);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%) !important;
            color: white !important;
            border-color: transparent;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(99, 102, 241, 0.2);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%) !important;
            border-color: transparent;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(99, 102, 241, 0.3);
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

            .table-header {
                padding: 1.25rem 1.5rem;
            }

            .table-header-row {
                flex-direction: column;
                gap: 15px;
            }

            .search-section {
                max-width: 100%;
                order: 2;
            }

            .button-section {
                order: 1;
                align-self: flex-end;
            }

            .table thead th,
            .table tbody td {
                padding: 12px 15px;
            }

            .footer-info {
                padding: 1rem 1.5rem;
            }

            .dataTables_wrapper .dataTables_info {
                padding-left: 1.5rem;
            }

            .dataTables_wrapper .dataTables_paginate {
                padding-right: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .search-wrapper .form-control {
                padding: 12px 15px 12px 45px;
                font-size: 0.9rem;
            }

            .add-book-btn {
                padding: 10px 18px;
                font-size: 0.9rem;
            }

            .table thead th,
            .table tbody td {
                padding: 10px 12px;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button {
                min-width: 32px;
                height: 32px;
                line-height: 20px;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            // Initialize DataTable
            var table = $("#data-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "pageLength": 4,
                "dom": 'rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });

            // Custom search functionality
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });

            // Enhanced interactions
            $('.table tbody tr').hover(
                function () {
                    $(this).addClass('shadow-sm');
                },
                function () {
                    $(this).removeClass('shadow-sm');
                }
            );

            // Button click animation
            $('.btn').on('click', function () {
                $(this).css('transform', 'scale(0.98)');
                setTimeout(() => {
                    $(this).css('transform', '');
                }, 150);
            });

            // Add staggered animation to table rows
            $('.table tbody tr').each(function (index) {
                $(this).css({
                    'animation': 'fadeIn 0.6s ease-in-out',
                    'animation-delay': (index * 0.05) + 's'
                });
            });

            // Table container fade-in animation
            $('.table-container').addClass('fade-in');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        confirmDelete = function (button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangerMode': true,
                'buttons': true
            }).then(function (value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Daftar Koleksi <span class="text-gradient">Buku</span></h1>
                <p class="subtitle">Kelola dan jelajahi koleksi buku perpustakaan digital</p>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="table-container fade-in">

                    <!-- Table Header with Search and Add Button -->
                    <div class="table-header">
                        <div class="table-header-row">
                            <div class="search-section">
                                <div class="search-wrapper">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="form-control" id="customSearch"
                                        placeholder="Cari buku berdasarkan judul, kategori, atau deskripsi...">
                                </div>
                            </div>
                            <div class="button-section">
                                <a href="{{ route('admin.createBuku') }}" class="add-book-btn">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Buku
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th style="width: 25px;">No.</th>
                                        <th style="width: 50px;">Gambar</th>
                                        <th style="width: 125px;">Kategori Buku</th>
                                        <th style="width: 125px;">Judul</th>
                                        <th style="width: 200px;">Deskripsi</th>
                                        <th style="width: 125px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($buku as $item)
                                        <tr>
                                            <td class="text-center">
                                                <span class="row-number">{{ $loop->index + 1 }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($item->gambar)
                                                    <img src="{{ asset('storage/buku/' . $item->gambar) }}" alt="Gambar Buku"
                                                        class="book-image">
                                                @else
                                                    <div class="book-image-placeholder">
                                                        <i class="fas fa-image text-muted" style="font-size: 24px;"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->kategori)
                                                    <span class="category-badge">
                                                        <i class="fas fa-tag mr-1"></i>
                                                        {{ $item->kategori->nama_kategori }}
                                                    </span>
                                                @else
                                                    <span class="no-category-badge">
                                                        <i class="fas fa-question-circle mr-1"></i>
                                                        Tidak ada kategori
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="book-title">{{ $item->judul }}</div>
                                            </td>
                                            <td>
                                                <div class="book-description">
                                                    @if($item->deskripsi)
                                                        {!! Str::limit(strip_tags($item->deskripsi), 80) !!}
                                                    @else
                                                        <span class="text-muted font-italic">Tidak ada deskripsi</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{route('admin.editBuku', $item)}}" class="btn btn-warning btn-sm"
                                                        title="Edit Buku">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button onclick="confirmDelete(this)"
                                                        data-url="{{ route('admin.deleteBuku', $item) }}"
                                                        class="btn btn-danger btn-sm" title="Hapus Buku">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    @if($buku->count() > 0)
                        <div class="footer-info">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <small>
                                        <i class="fas fa-book mr-1 text-primary"></i>
                                        Total <strong>{{ $buku->count() }}</strong> buku dalam perpustakaan
                                    </small>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <small>
                                        <i class="fas fa-clock mr-1 text-info"></i>
                                        Terakhir diperbarui:
                                        <strong>{{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}
                                            WIB</strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection