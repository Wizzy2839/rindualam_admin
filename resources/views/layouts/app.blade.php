<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Manajemen - Rindu Alam Coffee</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,ital,wght@6..96,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    
    <style> 
        body { font-family: 'Inter', sans-serif; } 
        .font-serif { font-family: 'Bodoni Moda', serif; }
        
        /* Modifikasi Scrollbar agar selaras dengan tema terang */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e4e4e7; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4d4d8; }

        /* DataTables Custom Overrides */
        .dataTables_wrapper {
            padding: 1.5rem 1rem;
        }
        
        /* Area Header DataTables (Search & Length) */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1.5rem;
            color: #52525b; /* zinc-600 */
        }
        
        /* Custom Input Search DataTables */
        .dataTables_wrapper .dataTables_filter label {
            position: relative;
            display: inline-flex;
            align-items: center;
        }
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e4e4e7;
            padding: 0.6rem 1rem 0.6rem 2.5rem !important; /* padding for icon */
            border-radius: 0.5rem;
            outline: none;
            font-size: 0.875rem;
            color: #18181b;
            background-color: #fafafa;
            transition: all 0.2s ease;
            width: 250px !important;
            margin-left: 0;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #18181b;
            box-shadow: 0 0 0 1px #18181b;
            background-color: #ffffff;
        }
        
        /* Custom Length Select */
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #e4e4e7;
            padding: 0.4rem 2rem 0.4rem 1rem !important;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            color: #18181b;
            background-color: #fafafa;
            margin: 0 0.5rem;
            outline: none;
            transition: all 0.2s ease;
        }
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #18181b;
            box-shadow: 0 0 0 1px #18181b;
        }

        /* Table Borders adjustments */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e4e4e7 !important;
            margin-top: 0.5rem !important;
            margin-bottom: 1.5rem !important;
        }
        table.dataTable thead th, table.dataTable thead td {
            border-bottom: 1px solid #e4e4e7 !important;
        }

        /* Sort indicators — ganti ikon bawaan DataTables dengan CSS custom */
        table.dataTable thead th {
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
            position: relative;
            padding-right: 1.75rem !important;
        }
        table.dataTable thead th.sorting::after,
        table.dataTable thead th.sorting_asc::after,
        table.dataTable thead th.sorting_desc::after {
            content: '';
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
        }
        /* Default (unsorted) — double arrow */
        table.dataTable thead th.sorting::after {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-bottom: 4px solid #d4d4d8;
            box-shadow: 0 5px 0 -1px transparent, 0 6px 0 0 #d4d4d8;
        }
        /* Ascending */
        table.dataTable thead th.sorting_asc::after {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-bottom: 5px solid #18181b;
        }
        /* Descending */
        table.dataTable thead th.sorting_desc::after {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 5px solid #18181b;
        }
        /* Hover pada header sortable */
        table.dataTable thead th.sorting:hover,
        table.dataTable thead th.sorting_asc:hover,
        table.dataTable thead th.sorting_desc:hover {
            background-color: #f4f4f5 !important;
            color: #18181b !important;
        }

        /* Footer Info & Pagination Layout */
        .dataTables_wrapper .dataTables_info {
            padding-top: 1rem !important;
            font-size: 0.875rem;
            color: #71717a; /* zinc-500 */
        }
        
        /* ===== PAGINATION REWORK ===== */
        /* Reset segala styling bawaan DataTables untuk pagination */
        .dataTables_wrapper .dataTables_paginate,
        .dataTables_wrapper .dataTables_paginate span {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 2px !important;
        }

        /* Semua tombol pagination */
        .dataTables_paginate .paginate_button {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 2rem !important;
            height: 2rem !important;
            min-width: 2rem !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 1px solid #e4e4e7 !important; /* zinc-200 */
            border-radius: 0 !important;
            background: #ffffff !important;
            color: #52525b !important; /* zinc-600 */
            font-size: 0.8rem !important;
            font-weight: 600 !important;
            line-height: 1 !important;
            cursor: pointer !important;
            box-shadow: none !important;
            transition: all 0.15s ease !important;
            text-decoration: none !important;
        }

        /* Hover state */
        .dataTables_paginate .paginate_button:not(.current):not(.disabled):hover {
            background: #f4f4f5 !important; /* zinc-100 */
            color: #18181b !important; /* zinc-900 */
            border-color: #d4d4d8 !important; /* zinc-300 */
            box-shadow: none !important;
        }

        /* Halaman aktif */
        .dataTables_paginate .paginate_button.current,
        .dataTables_paginate .paginate_button.current:hover {
            background: #18181b !important; /* zinc-900 */
            color: #ffffff !important;
            border-color: #18181b !important;
            box-shadow: none !important;
        }

        /* Tombol disabled (Previous/Next di ujung) */
        .dataTables_paginate .paginate_button.disabled,
        .dataTables_paginate .paginate_button.disabled:hover {
            background: #fafafa !important;
            color: #d4d4d8 !important; /* zinc-300 */
            border-color: #e4e4e7 !important;
            cursor: default !important;
            box-shadow: none !important;
        }

        /* Ellipsis (...) */
        .dataTables_paginate .paginate_button.ellipsis {
            border: none !important;
            background: transparent !important;
            color: #a1a1aa !important;
            cursor: default !important;
            width: auto !important;
            min-width: 1.5rem !important;
        }
    </style>

    <!-- DataTables & jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-zinc-50 flex h-screen overflow-hidden text-zinc-800 antialiased selection:bg-zinc-900 selection:text-white">

    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-zinc-900/60 z-40 hidden backdrop-blur-sm transition-opacity lg:hidden"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white flex flex-col transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:flex-shrink-0 shadow-[4px_0_24px_rgba(0,0,0,0.02)] border-r border-zinc-200">
        
        <div class="h-24 flex items-center justify-between px-8 border-b border-zinc-100 flex-shrink-0">
            <div class="flex items-center justify-start gap-4">
                <div class="flex flex-col justify-center translate-y-px">
                    <h1 class="font-sans font-black text-xl leading-none text-zinc-900 tracking-tight uppercase">Rindu Alam</h1>
                    <p class="text-[8px] font-bold tracking-[0.15em] uppercase text-zinc-500 mt-1">Coffee & Roastery</p>
                </div>
            </div>
            <button id="close-sidebar" class="lg:hidden text-zinc-400 hover:text-zinc-900 transition focus:outline-none">
                <i class="ph ph-x text-2xl"></i>
            </button>
        </div>
        
        <nav class="flex-1 py-8 px-4 space-y-1.5 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-squares-four text-xl"></i> Ringkasan Dasbor
            </a>
            
            <p class="px-4 pt-8 pb-3 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Halaman Publik</p>

            <a href="{{ route('pages.home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('pages.home*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-house text-xl"></i> Beranda
            </a>
            <a href="{{ route('pages.about') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('pages.about*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-book-open-text text-xl"></i> Cerita Kami
            </a>
            <a href="{{ route('pages.visit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('pages.visit*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-map-pin text-xl"></i> Kunjungi Kami
            </a>

            <p class="px-4 pt-8 pb-3 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Manajemen Konten</p>
            
            <a href="{{ route('menu-categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu-categories.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-tag text-xl"></i> Kategori Produk
            </a>
            <a href="{{ route('menu-items.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu-items.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-coffee text-xl"></i> Katalog Menu
            </a>
            <a href="{{ route('galleries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('galleries.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-image text-xl"></i> Galeri Aset
            </a>
            <a href="{{ route('team-members.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('team-members.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-users text-xl"></i> Direktori Tim
            </a>
            
            <p class="px-4 pt-8 pb-3 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Sistem</p>
            
            <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('settings.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-gear text-xl"></i> Pengaturan Global
            </a>
        </nav>

        <div class="p-6 border-t border-zinc-100 bg-zinc-50/50 flex-shrink-0">
            <div class="flex items-center gap-3 opacity-70 hover:opacity-100 transition-opacity duration-300">
                <div class="w-8 h-8 rounded-md bg-zinc-200 flex items-center justify-center">
                    <i class="ph ph-code text-zinc-600"></i>
                </div>
                <div>
                    <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-0.5">Dikembangkan oleh</p>
                    <p class="text-[11px] font-bold text-zinc-900 tracking-wide">TEAM WARAWIRI 04</p>
                </div>
            </div>
        </div>

    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="h-24 bg-zinc-50 border-b border-zinc-200 flex items-center justify-between px-6 lg:px-12 flex-shrink-0 z-20">
            <div class="flex items-center gap-5">
                <button id="open-sidebar" class="lg:hidden text-zinc-500 hover:text-zinc-900 focus:outline-none transition bg-white p-2.5 rounded-lg border border-zinc-200 shadow-sm">
                    <i class="ph ph-list text-xl"></i>
                </button>
                <div>
                    <h2 class="text-xl font-serif font-bold text-zinc-900 tracking-tight">@yield('header', 'Dashboard')</h2>
                    <p class="hidden sm:block text-[10px] text-zinc-500 uppercase tracking-widest font-medium mt-1">Sistem Manajemen Internal</p>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm font-bold text-zinc-900">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Administrator</span>
                </div>
                <div class="h-8 w-px bg-zinc-300 hidden sm:block"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-xs font-bold text-zinc-600 hover:text-zinc-900 hover:bg-zinc-200 px-4 py-2.5 rounded-lg uppercase tracking-widest transition-all duration-300 border border-transparent hover:border-zinc-300">
                        <span class="hidden sm:inline">Keluar</span> <i class="ph ph-sign-out text-lg"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-12 relative">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const openBtn = document.getElementById('open-sidebar');
            const closeBtn = document.getElementById('close-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');

            // Nonaktifkan history input (autocomplete) untuk semua form di admin
            document.querySelectorAll('form, input, textarea').forEach(function(el) {
                el.setAttribute('autocomplete', 'off');
            });

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('opacity-0');
                setTimeout(() => backdrop.classList.add('hidden'), 300);
            }

            openBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            backdrop.addEventListener('click', closeSidebar);
        });

        // Initialize DataTables
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "dom": "<'flex flex-col sm:flex-row items-center justify-between gap-4 mb-4'<'text-sm text-zinc-500 font-medium flex items-center gap-2'l><'relative w-full sm:w-auto'f>>" +
                       "<'overflow-x-auto w-full border border-zinc-200 rounded-lg shadow-sm'tr>" +
                       "<'flex flex-col md:flex-row items-center justify-between gap-4 mt-6 pt-4 border-t border-zinc-200'<'text-sm text-zinc-500 font-medium'i><'flex items-center gap-2'p>>",
                "language": {
                    "emptyTable":     "Tidak ada data yang tersedia pada tabel ini",
                    "info":           "Menampilkan <span class='font-bold text-zinc-900'>_START_</span> sampai <span class='font-bold text-zinc-900'>_END_</span> dari <span class='font-bold text-zinc-900'>_TOTAL_</span> data",
                    "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered":   "<span class='text-xs ml-1 text-zinc-400'>(disaring dari _MAX_ data)</span>",
                    "lengthMenu":     "Tampilkan _MENU_ baris",
                    "loadingRecords": "Memuat...",
                    "processing":     "Sedang memproses...",
                    "search":         "<span class='relative flex items-center'><i data-feather='search' class='absolute left-3 text-zinc-400 w-4 h-4 z-10'></i> _INPUT_</span>",
                    "searchPlaceholder": "Cari data...",
                    "zeroRecords":    "Tidak ditemukan data yang sesuai",
                    "paginate": {
                        "first":      "<i data-feather='chevrons-left' class='w-4 h-4'></i>",
                        "last":       "<i data-feather='chevrons-right' class='w-4 h-4'></i>",
                        "next":       "<i data-feather='chevron-right' class='w-4 h-4'></i>",
                        "previous":   "<i data-feather='chevron-left' class='w-4 h-4'></i>"
                    }
                },
                "pageLength": 10,
                "responsive": true,
                "ordering": true,
                "columnDefs": [
                    { "orderable": false, "targets": -1 }
                ],
                "drawCallback": function(settings) {
                    if (typeof feather !== 'undefined') {
                        feather.replace();
                    }
                }
            });
        });

        // Initialize SweetAlert Flash Messages
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: false,
            background: '#18181b',
            color: '#f4f4f5',
            iconColor: '#a1a1aa',
            customClass: {
                popup: 'text-sm font-medium tracking-wide rounded-none shadow-2xl border border-zinc-700',
                title: 'text-sm font-semibold'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(session('success'))
            Toast.fire({ icon: 'success', iconColor: '#a1a1aa', title: 'Tersimpan' });
        @endif
        @if(session('error'))
            Toast.fire({ icon: 'error', iconColor: '#f87171', title: 'Terjadi Kesalahan' });
        @endif

        // Global Delete Confirmation using SweetAlert2
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Hapus Data?',
                        text: 'Tindakan ini tidak dapat dibatalkan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#18181b',
                        cancelButtonColor: '#e4e4e7',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            popup: 'rounded-none text-sm',
                            confirmButton: 'text-white text-xs font-bold uppercase tracking-widest',
                            cancelButton: 'text-zinc-700 text-xs font-bold uppercase tracking-widest'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>