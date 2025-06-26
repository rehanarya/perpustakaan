@extends('user.layouts.app')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <style>
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

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 1.5rem 2rem;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
        }

        .filter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            border-radius: 16px 16px 0 0;
        }

        .filter-form {
            display: flex;
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            flex: 1;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1e293b;
            font-size: 0.9rem;
        }

        .filter-group .form-control {
            border-radius: 10px;
            border: 2px solid rgba(226, 232, 240, 0.8);
            padding: 12px 16px;
            font-size: 0.95rem;
            min-height: 50px;
            transition: all 0.3s ease;
            background: rgba(248, 250, 252, 0.8);
        }

        .filter-group .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
            background-color: white;
        }

        .filter-button {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
            white-space: nowrap;
        }

        .filter-button:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(99, 102, 241, 0.3);
        }

        .reset-button {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(100, 116, 139, 0.2);
            white-space: nowrap;
        }

        .reset-button:hover {
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(100, 116, 139, 0.3);
        }

        /* Table Container */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
            opacity: 1;
            visibility: visible;
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

        .table-header-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .table-header-subtitle {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Table Styling */
        .table {
            margin-bottom: 0;
            width: 100%;
            visibility: visible;
            opacity: 1;
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
            opacity: 1;
            visibility: visible;
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

        /* Category Icon */
        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.2);
            transition: all 0.3s ease;
        }

        .category-icon:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(99, 102, 241, 0.3);
        }

        /* Category Content */
        .category-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.1rem;
            line-height: 1.4;
            margin-bottom: 4px;
        }

        .category-description {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 0;
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
            animation: fadeIn 0.8s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Prevent flash/flicker */
        .table-container,
        .table,
        .table tbody tr {
            opacity: 1 !important;
            visibility: visible !important;
        }

        /* Loading state */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container-fluid {
                padding: 0 0.75rem;
            }

            .content-header h1 {
                font-size: 1.75rem;
            }

            .filter-section {
                padding: 1.25rem 1.5rem;
            }

            .filter-form {
                flex-direction: column;
                gap: 15px;
            }

            .filter-group {
                flex: none;
            }

            .table-header {
                padding: 1.25rem 1.5rem;
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

            .category-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .filter-group .form-control {
                padding: 10px 14px;
                font-size: 0.9rem;
            }

            .filter-button,
            .reset-button {
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

            .category-name {
                font-size: 1rem;
            }

            .category-description {
                font-size: 0.85rem;
            }
        }
    </style>
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Ensure table is visible first
            $('.table-container, .table').css({
                'opacity': '1',
                'visibility': 'visible'
            });

            // Initialize DataTable with improved settings
            var table = $("#data-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false,
                "pageLength": 5,
                "dom": 'rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ kategori",
                    "infoEmpty": "Tidak ada kategori tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total kategori)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "initComplete": function () {
                    // Ensure table remains visible after initialization
                    $('.table-container, .table, .table tbody tr').css({
                        'opacity': '1',
                        'visibility': 'visible'
                    });
                }
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
            $('.btn, .filter-button, .reset-button').on('click', function () {
                var $btn = $(this);
                $btn.css('transform', 'scale(0.98)');
                setTimeout(function () {
                    $btn.css('transform', '');
                }, 150);
            });

            // Improved staggered animation for table rows with delay
            setTimeout(function () {
                $('.table tbody tr').each(function (index) {
                    var $row = $(this);
                    $row.css({
                        'opacity': '0',
                        'transform': 'translateY(20px)'
                    });
                    setTimeout(function () {
                        $row.css({
                            'transition': 'all 0.4s ease',
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }, index * 100);
                });
            }, 300);

            // Container fade-in animation with delay
            setTimeout(function () {
                $('.filter-section').addClass('fade-in');
            }, 100);

            setTimeout(function () {
                $('.table-container').addClass('fade-in');
            }, 200);

            // Prevent any hiding of table elements
            setInterval(function () {
                $('.table-container, .table, .table tbody tr').css({
                    'opacity': '1',
                    'visibility': 'visible'
                });
            }, 1000);
        });
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Daftar <span class="text-gradient">Kategori</span></h1>
                <p class="subtitle">Jelajahi kategori-kategori buku perpustakaan digital</p>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Filter Section -->
                <div class="filter-section">
                    <form method="GET" action="{{ route('user.daftarKategori') }}" class="filter-form">
                        <div class="filter-group">
                            <label for="search">Cari Kategori</label>
                            <input type="text" class="form-control" id="search" name="search" value="{{ $search ?? '' }}"
                                placeholder="Cari berdasarkan nama kategori atau deskripsi...">
                        </div>
                        <div class="filter-group">
                            <button type="submit" class="filter-button">
                                <i class="fas fa-search mr-2"></i>
                                Cari
                            </button>
                            <a href="{{ route('user.daftarKategori') }}" class="reset-button ml-2">
                                <i class="fas fa-refresh mr-2"></i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Table Container -->
                <div class="table-container">
                    <!-- Table Header -->
                    <div class="table-header">
                        <h2 class="table-header-title">
                            <i class="fas fa-tags mr-2 text-primary"></i>
                            Daftar Kategori
                        </h2>
                        <p class="table-header-subtitle">
                            @if($search ?? '')
                                Hasil pencarian untuk "<strong>{{ $search }}</strong>" -
                                Ditemukan {{ isset($kategori) ? $kategori->total() : 0 }} kategori
                            @else
                                Menampilkan semua kategori buku perpustakaan
                            @endif
                        </p>
                    </div>

                    <!-- Data Table -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">No.</th>
                                        <th style="width: 80px;">Icon</th>
                                        <th style="width: 250px;">Nama Kategori</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($kategori) && $kategori->count() > 0)
                                        @foreach ($kategori as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <span
                                                        class="row-number">{{ ($kategori->currentPage() - 1) * $kategori->perPage() + $loop->iteration }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="category-icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="category-name">
                                                        {{ $item->nama_kategori ?? 'Tanpa Nama' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="category-description">
                                                        @if($item->deskripsi)
                                                            {{ $item->deskripsi }}
                                                        @else
                                                            <span class="text-muted font-italic">Tidak ada deskripsi tersedia</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <div class="empty-state">
                                                    <i class="fas fa-tags"></i>
                                                    <h3>Tidak Ada Kategori Ditemukan</h3>
                                                    <p>
                                                        @if($search ?? '')
                                                            Maaf, tidak ada kategori yang sesuai dengan kriteria pencarian Anda.
                                                        @else
                                                            Belum ada kategori yang tersedia di perpustakaan.
                                                        @endif
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    @if(isset($kategori) && $kategori->count() > 0)
                        <div class="footer-info">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <small>
                                        <i class="fas fa-tags mr-1 text-primary"></i>
                                        @if($search ?? '')
                                            Menampilkan <strong>{{ $kategori->count() }}</strong> dari
                                            <strong>{{ $kategori->total() }}</strong> kategori
                                        @else
                                            Total <strong>{{ $kategori->total() }}</strong> kategori tersedia
                                        @endif
                                    </small>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <small>
                                        <i class="fas fa-clock mr-1 text-info"></i>
                                        Diperbarui:
                                        <strong>{{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}
                                            WIB</strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                @if(isset($kategori) && $kategori->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $kategori->appends(['search' => $search])->links() }}
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection