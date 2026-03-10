<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOE-Sport Space | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }

        #sidebar {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #overlay {
            display: block;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s;
            backdrop-filter: blur(0px);
        }

        #overlay.active {
            opacity: 1;
            visibility: visible;
            backdrop-filter: blur(4px);
        }

        .sidebar-active {
            background: rgba(18, 101, 168, 0.1);
            border-right: 4px solid #1265A8;
            color: #1265A8;
        }

        .btn-close-sidebar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-close-sidebar:hover {
            background-color: #fee2e2;
            color: #ef4444;
            transform: rotate(90deg);
        }
    </style>
</head>

<body>
    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-30 md:pointer-events-none"></div>

    <aside class="w-64 bg-white border-r border-slate-100 flex flex-col fixed h-full z-40 transition-transform -translate-x-full md:translate-x-0" id="sidebar">
        <div class="p-8 relative">
            <h1 class="text-2xl font-black text-[#1265A8] leading-tight tracking-tighter">
                BOE-Sport<br><span class="text-slate-400">Space</span>
            </h1>

            <button onclick="toggleSidebar()"
                class="md:hidden absolute top-6 right-2 btn-close-sidebar w-10 h-10 flex items-center justify-center bg-slate-50 text-slate-400 rounded-xl shadow-sm border border-slate-100"
                aria-label="Close Sidebar">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="flex-1 px-4 space-y-1">
            <p class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Main Menu</p>
            <a href="/admin/dashboard/master" class="{{ request()->is('admin/dashboard/master') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} flex items-center px-4 py-3 rounded-xl font-bold transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                Dashboard
            </a>

            <a href="/admin/dashboard/dataLapangan" class="{{ request()->is('admin/dashboard/dataLapangan') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} flex items-center px-4 py-3 text-slate-500 hover:text-[#1265A8] hover:bg-slate-50 rounded-xl transition-all font-semibold">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Data Fasilitas
            </a>

            <a href="/admin/dashboard/jadwalBooking"
                class="{{ request()->is('admin/dashboard/jadwalBooking') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} 
                flex items-center justify-between px-4 py-3 rounded-xl transition-all font-semibold">

                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Jadwal Booking
                </div>

                @if(isset($totalPending) && $totalPending > 0)
                <span class="bg-red-500 text-white text-[11px] font-bold px-2 py-1 rounded-full animate-pulse">
                    {{ $totalPending }}
                </span>
                @endif
            </a>

            <a href="/admin/dashboard/dataPenyewa" class="{{ request()->is('admin/dashboard/dataPenyewa') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} flex items-center px-4 py-3 text-slate-500 hover:text-[#1265A8] hover:bg-slate-50 rounded-xl transition-all font-semibold">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Data Penyewa
            </a>

            <a href="/admin/dashboard/dataTransaksi" class="{{ request()->is('admin/dashboard/dataTransaksi') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} flex items-center px-4 py-3 text-slate-500 hover:text-[#1265A8] hover:bg-slate-50 rounded-xl transition-all font-semibold">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path>
                </svg>
                Data Harga Sewa
            </a>

            <a href="/admin/dashboard/historyBooking" class="{{ request()->is('admin/dashboard/historyBooking') ? 'sidebar-active' : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }} flex items-center px-4 py-3 text-slate-500 hover:text-[#1265A8] hover:bg-slate-50 rounded-xl transition-all font-semibold">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                History Booking
            </a>

            <a href="{{ route('admin.dashboard.kontrolJadwal') }}"
                class="flex items-center px-4 py-3 rounded-xl transition-all font-semibold 
                {{ request()->routeIs('admin.dashboard.kontrolJadwal') 
                    ? 'bg-[#1265A8]/10 text-[#1265A8] sidebar-active' 
                    : 'text-slate-500 hover:text-[#1265A8] hover:bg-slate-50' }}">

                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>

                <span>Kontrol Jadwal</span>
            </a>

            <div class="pt-4 mt-4 border-t border-slate-50">
                <a href="javascript:void(0)" onclick="confirmLogout(this)" id="btnLogout" class="flex items-center px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-bold group relative overflow-hidden">
                    <svg id="logoutSpinner" class="hidden animate-spin h-5 w-5 mr-3 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <svg id="logoutIcon" class="w-5 h-5 mr-3 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>

                    <span id="logoutText">Keluar Sistem</span>
                </a>
            </div>
        </nav>

        <div class="p-6 mt-auto border-t border-slate-50">
            <div class="flex items-center gap-3 mb-4">
                <img src="/image/logo/tutwuri-logo.svg" class="w-8 h-8 opacity-80" alt="Logo">
                <p class="text-[10px] leading-tight text-slate-400 font-medium">Powered By<br><span class="text-slate-600 font-bold uppercase">BBPPMPV BOE MALANG</span></p>
            </div>
            <p class="text-[10px] text-slate-400">&copy; 2026 BOE. All Rights Reserved.</p>
        </div>
    </aside>

    <script>
        // Sidebar Toggle Logic
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('active');
        }

        // Fungsi Logout
        function confirmLogout(element) {
            const icon = document.getElementById('logoutIcon');
            const spinner = document.getElementById('logoutSpinner');
            const text = document.getElementById('logoutText');

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Keluar Sistem?',
                    text: "Anda harus login kembali untuk mengakses dashboard.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#cbd5e1',
                    confirmButtonText: 'Ya, Keluar',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        startLogoutLoading(element, icon, spinner, text);
                    }
                });
            } else {
                if (confirm("Keluar dari sistem?")) {
                    startLogoutLoading(element, icon, spinner, text);
                }
            }
        }

        function startLogoutLoading(btn, icon, spinner, text) {
            // Nonaktifkan klik
            btn.style.pointerEvents = 'none';

            icon.classList.add('hidden');
            spinner.classList.remove('hidden');

            // Ubah Teks
            text.innerText = "Keluar...";
            btn.classList.add('bg-red-50');

            setTimeout(() => {
                window.location.href = '/admin/formLogin';
            }, 800);
        }
    </script>
</body>

</html>