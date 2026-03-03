<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }

        .chart-wrapper {
            width: 100%;
            overflow-x: auto;
            scrollbar-width: thin;
        }

        .chart-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .chart-wrapper::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .chart-area {
            min-width: 600px;
            height: 250px;
        }

        .btn-shadow {
            box-shadow: 0 4px 14px 0 rgba(18, 101, 168, 0.39);
        }

        .action-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .action-card:hover {
            transform: translateY(-8px);
        }

        .icon-container {
            background: linear-gradient(135deg, #1265A8 0%, #4292DC 100%);
        }
    </style>
</head>

<body class="flex min-h-screen">
    @include('admin.dashboard.layouts.sidebar')

    <main class="flex-1 md:ml-64 p-6 md:p-10">
        @if($totalPending > 0)
        <div class="mb-6 p-4 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-between shadow-sm animate-pulse">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                    ⚠️
                </div>
                <div>
                    <p class="font-bold text-amber-700">
                        Ada {{ $totalPending }} Jadwal Booking Belum Disetujui
                    </p>
                    <p class="text-xs text-amber-600">
                        Segera lakukan approval untuk menghindari keterlambatan.
                    </p>
                </div>
            </div>

            <a href="/admin/dashboard/jadwalBooking"
                class="px-4 py-2 bg-amber-500 text-white text-xs font-bold rounded-xl hover:bg-amber-600 transition">
                Review Sekarang
            </a>
        </div>
        @endif
        <header class="mb-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                <div class="flex items-center justify-between md:justify-start gap-4 flex-1">
                    <div class="relative">
                        <div class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-[#1265A8] to-transparent rounded-full opacity-50 hidden md:block"></div>

                        <h2 class="text-2xl md:text-3xl font-black tracking-tight text-slate-800 flex items-center gap-3">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-[#1265A8] to-[#4292DC]">
                                Admin Dashboard
                            </span>

                            <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest animate-pulse">
                                Live
                            </span>
                        </h2>

                        <p class="mt-1 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Selamat datang di <span class="text-slate-600 font-semibold mx-1">pusat kendali</span> operasional anda.
                        </p>
                    </div>

                    <button onclick="toggleSidebar()"
                        class="md:hidden p-3 bg-white rounded-xl border border-slate-100 text-[#1265A8] 
                        transition-all duration-300 ease-out
                        hover:bg-blue-50 hover:border-blue-200 hover:text-[#4292DC] 
                        hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] 
                        active:scale-95 group">

                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-180"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                {{-- search --}}
                @include('admin.dashboard.search.searchBar')

            </div>
        </header>

        {{-- Dashboard Summary --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="glass-card p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all border border-white/50 relative group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest">Data Lapangan</h3>
                </div>

                <div class="flex items-baseline gap-2 mb-6">
                    <p class="stat-value text-4xl font-black text-slate-800" data-target="{{ $totalLapangan }}">0</p>
                    <span class="text-slate-400 font-medium text-sm">Units</span>
                </div>

                <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                    <p class="text-[10px] text-slate-400 font-medium tracking-tight">Total pertumbuhan data</p>
                    <a href="/admin/dashboard/dataLapangan" class="text-[#1265A8] text-[10px] font-bold hover:underline flex items-center gap-1 group-hover:gap-2 transition-all">
                        Detail
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all border border-white/50 relative group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest">Jadwal Booking</h3>
                </div>

                <div class="flex items-baseline gap-2 mb-6">
                    <p class="stat-value text-4xl font-black text-slate-800" data-target="{{ $totalBooking }}">0</p>
                    <span class="text-slate-400 font-medium text-sm">Schedules</span>
                </div>

                <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                    <p class="text-[10px] text-slate-400 font-medium tracking-tight">Total jadwal terdaftar</p>
                    <a href="/admin/dashboard/jadwalBooking" class="text-[#1265A8] text-[10px] font-bold hover:underline flex items-center gap-1 group-hover:gap-2 transition-all">
                        Detail
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="glass-card p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all border border-white/50 relative group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest">Data Penyewa</h3>
                </div>

                <div class="flex items-baseline gap-2 mb-6">
                    <p class="stat-value text-4xl font-black text-slate-800" data-target="{{ $totalPenyewa }}">0</p>
                    <span class="text-slate-400 font-medium text-sm">People</span>
                </div>

                <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                    <p class="text-[10px] text-slate-400 font-medium tracking-tight">Total pertumbuhan penyewa</p>
                    <a href="/admin/dashboard/dataPenyewa" class="text-[#1265A8] text-[10px] font-bold hover:underline flex items-center gap-1 group-hover:gap-2 transition-all">
                        Detail
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Analytics --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <div class="bg-white p-6 md:p-8 rounded-[2.5rem] shadow-sm border border-slate-100 searchable-section">
                <h4 class="text-sm font-bold text-slate-700 mb-6 flex items-center">
                    <span class="w-2 h-2 bg-[#1265A8] rounded-full mr-2"></span> Data Pengunjung (Jan - Des)
                </h4>
                <div class="chart-wrapper">
                    <div class="chart-area">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2.5rem] shadow-sm border border-slate-100 searchable-section">
                <h4 class="text-sm font-bold text-slate-700 mb-6 flex items-center">
                    <span class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></span> Data Lapangan
                </h4>
                <div class="chart-wrapper flex justify-center items-center">
                    <div class="relative h-[300px] w-full">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Control Panel Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Card Kelola Tempat --}}
            <div class="action-card group bg-white rounded-[2.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700"></div>

                <div class="relative z-10">
                    <div class="icon-container w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-200">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Kelola Tempat</h3>
                    <p class="text-slate-400 text-sm mb-8">Atur ketersediaan, fasilitas, dan detail operasional lapangan Anda.</p>

                    <div class="flex flex-col gap-3">
                        <a href="/admin/dashboard/create/createLapangan" onclick="handleNavClick(event, this)" class="nav-btn-loading flex items-center justify-center w-full px-6 py-4 bg-white text-slate-600 border-2 border-slate-100 rounded-2xl font-bold text-sm hover:border-[#4292DC] hover:text-[#4292DC] transition-all">
                            <span class="btn-text flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Lapangan Baru
                            </span>
                        </a>

                        <a href="/admin/dashboard/dataLapangan" onclick="handleNavClick(event, this)" class="nav-btn-loading group/btn flex items-center justify-between w-full px-6 py-4 bg-slate-900 text-white rounded-2xl font-bold text-sm transition-all hover:bg-[#1265A8] active:scale-95 shadow-lg shadow-slate-200">
                            <span class="btn-text">Lihat Semua Lapangan</span>
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Card Manajemen Admin --}}
            <div class="action-card group bg-white rounded-[2.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700"></div>

                <div class="relative z-10">
                    <div class="icon-container w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-indigo-200">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Manajemen Admin</h3>
                    <p class="text-slate-400 text-sm mb-8">Kelola hak akses dan pantau aktivitas administrator sistem.</p>

                    <div class="flex flex-col gap-3">
                        <a href="/admin/dashboard/management/add_new_admin" onclick="handleNavClick(event, this)" class="nav-btn-loading flex items-center justify-center w-full px-6 py-4 bg-white text-slate-600 border-2 border-slate-100 rounded-2xl font-bold text-sm hover:border-[#4292DC] hover:text-[#4292DC] transition-all">
                            <span class="btn-text flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Tambah Admin Baru
                            </span>
                        </a>
                        <a href="/admin/dashboard/management/admin_active_control" onclick="handleNavClick(event, this)" class="nav-btn-loading group/btn flex items-center justify-between w-full px-6 py-4 bg-slate-900 text-white rounded-2xl font-bold text-sm transition-all hover:bg-[#1265A8] active:scale-95 shadow-lg shadow-slate-200">
                            <span class="btn-text">Lihat Daftar Admin Aktif</span>
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    {{-- Back to Top Button --}}
    <button id="backToTop"
        class="fixed bottom-8 right-8 z-50 p-4 rounded-2xl bg-white/80 backdrop-blur-lg border border-slate-200 text-[#1265A8] shadow-2xl transition-all duration-500 translate-y-20 opacity-0 hover:bg-[#1265A8] hover:text-white hover:-translate-y-1 active:scale-90 group"
        aria-label="Back to Top">

        <div class="relative">
            <div class="absolute inset-0 bg-blue-400 blur-lg opacity-0 group-hover:opacity-40 transition-opacity"></div>

            <svg class="w-6 h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path>
            </svg>
        </div>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            initCharts();
            animateCounters();
        });

        function initCharts() {
            const ctxLine = document.getElementById('lineChart')?.getContext('2d');
            const ctxDoughnut = document.getElementById('doughnutChart')?.getContext('2d');
            // Pastikan ctxBar ada di HTML jika ingin digunakan, jika tidak, Chart Bar tidak akan jalan
            const ctxBar = document.getElementById('barChart')?.getContext('2d');

            // Data dari Laravel
            const labelsLapangan = @json($labelsLapangan ?? []);
            const dataStatistik = @json($dataBookingPerLapangan ?? []);
            const dataPengunjung = @json($dataPengunjung ?? array_fill(0, 12, 0));

            // --- 1. LINE CHART (DATA PENGUNJUNG) ---
            if (ctxLine) {
                const gradient = ctxLine.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(18, 101, 168, 0.2)');
                gradient.addColorStop(1, 'rgba(18, 101, 168, 0)');

                new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            label: 'Pengunjung',
                            data: dataPengunjung,
                            borderColor: '#1265A8',
                            borderWidth: 3,
                            backgroundColor: gradient,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#1265A8',
                            pointBorderWidth: 2,
                            pointRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    borderDash: [5, 5],
                                    color: '#e2e8f0'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // --- 2. DOUGHNUT CHART ---
            if (ctxDoughnut) {
                new Chart(ctxDoughnut, {
                    type: 'doughnut',
                    data: {
                        labels: labelsLapangan,
                        datasets: [{
                            data: dataStatistik,
                            backgroundColor: ['#1265A8', '#4292DC', '#6366f1', '#8b5cf6', '#ec4899'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20
                                }
                            }
                        }
                    }
                });
            }

            // --- 3. BAR CHART (OPSIONAL) ---
            if (ctxBar) {
                new Chart(ctxBar, {
                    type: 'bar',
                    data: {
                        labels: labelsLapangan,
                        datasets: [{
                            label: 'Total Booking',
                            data: dataStatistik,
                            backgroundColor: '#1265A8',
                            borderRadius: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        } // Akhir fungsi initCharts

        // --- FUNGSI ANIMASI ANGKA ---
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-value');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsedTime = currentTime - startTime;
                    const progress = Math.min(elapsedTime / duration, 1);
                    const easeOutQuad = (t) => t * (2 - t);

                    counter.innerText = Math.floor(easeOutQuad(progress) * target);

                    if (progress < 1) requestAnimationFrame(updateCount);
                    else counter.innerText = target;
                };
                requestAnimationFrame(updateCount);
            });
        }

        // --- FUNGSI LOADING NAVIGASI ---
        function handleNavClick(event, el) {
            const targetUrl = el.getAttribute('href');
            if (!targetUrl || targetUrl === '#') return;

            event.preventDefault();
            const isDarkBtn = el.classList.contains('bg-slate-900');
            const spinnerColor = isDarkBtn ? 'text-white' : 'text-blue-500';

            el.innerHTML = `
            <div class="flex items-center justify-center gap-3">
                <svg class="animate-spin h-5 w-5 ${spinnerColor}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="animate-pulse tracking-wide">MENYIAPKAN...</span>
            </div>`;

            el.classList.add('pointer-events-none', 'opacity-90');
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 800);
        }

        // --- LOGIKA BACK TO TOP ---
        const backToTopBtn = document.getElementById('backToTop');
        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 400) {
                    backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
                    backToTopBtn.classList.add('translate-y-0', 'opacity-100');
                } else {
                    backToTopBtn.classList.add('translate-y-20', 'opacity-0');
                    backToTopBtn.classList.remove('translate-y-0', 'opacity-100');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    </script>

</body>

</html>