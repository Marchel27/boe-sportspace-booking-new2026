<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }
    </style>
</head>

<body class="flex min-h-screen">
    @include('admin.dashboard.layouts.sidebar')

    <main class="flex-1 md:ml-64 p-6 md:p-10">
        <header class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <!-- LEFT SIDE -->
                <div class="relative max-w-xl">
                    <div class="absolute -left-4 top-1 bottom-1 w-1 bg-gradient-to-b from-[#1265A8] to-transparent rounded-full opacity-40 hidden md:block"></div>

                    <h2 class="text-2xl md:text-3xl font-black tracking-tight text-slate-800 flex items-center gap-3">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-[#1265A8] to-[#4292DC]">
                            Data Penyewa
                        </span>

                        <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest">
                            Live
                        </span>
                    </h2>

                    <p class="mt-2 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Selamat datang di
                        <span class="text-slate-600 font-semibold mx-1">manajemen data penyewa</span>.
                    </p>
                </div>

                <!-- RIGHT SIDE (FILTER & SEARCH) -->
                <div class="w-full lg:w-auto">
                    <form action="" method="GET"
                        class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 bg-white px-4 py-3 rounded-2xl border border-slate-200 shadow-sm">

                        <!-- Select Lapangan -->
                        <div class="relative w-full sm:w-52">
                            <select name="lapangan_id" onchange="this.form.submit()"
                                class="w-full bg-slate-50 rounded-xl text-xs font-semibold px-4 py-2.5 text-slate-600 focus:ring-2 focus:ring-blue-100 transition-all appearance-none cursor-pointer">
                                <option value="">Semua Lapangan</option>
                                @foreach($lapangans as $lp)
                                <option value="{{ $lp->id_lap }}" {{ request('lapangan_id') == $lp->id_lap ? 'selected' : '' }}>
                                    {{ $lp->nama_lapangan }}
                                </option>
                                @endforeach
                            </select>

                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="hidden sm:block w-px h-6 bg-slate-200"></div>

                        <!-- Search -->
                        <div class="w-full sm:w-56 lg:w-64 flex items-center">
                            @include('admin.dashboard.search.searchBar')
                        </div>

                    </form>
                </div>

            </div>
        </header>

        <section class="mb-12">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-400">No</th>
                                <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-slate-400">Penyewa</th>
                                <th class="px-6 py-6 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Status Jumlah Booking</th>
                                <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach ($penyewas as $index => $penyewa)
                            <tr class="group hover:bg-blue-50/30 transition-all duration-300">
                                <td class="px-8 py-6">
                                    <span class="text-sm font-bold text-slate-400 group-hover:text-[#1265A8]">
                                        {{ sprintf('%02d', $index + 1) }}
                                    </span>
                                </td>

                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-[#1265A8]/10 flex items-center justify-center text-[#1265A8] font-bold text-xs">
                                            {{ strtoupper(substr($penyewa->nama, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-black text-slate-800">{{ $penyewa->nama }}</div>
                                            <div class="text-[10px] text-slate-400 font-medium">{{ $penyewa->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-6 text-center">
                                    <div class="inline-flex flex-col items-center">
                                        <span class="px-4 py-1.5 rounded-full bg-blue-50 text-[#1265A8] text-xs font-black border border-blue-100">
                                            {{ $penyewa->bookings_count ?? 0 }} Kali Booking
                                        </span>
                                        @if($index == 0 && ($penyewa->bookings_count ?? 0) > 0)
                                        <span class="text-[9px] font-bold text-amber-500 uppercase mt-1 tracking-tighter">⭐ Top Pengunjung</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button onclick="confirmDelete(this, {{ $penyewa->id_pey }})"
                                            class="p-2.5 rounded-xl bg-red-50 text-red-400 hover:bg-red-500 hover:text-white transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        <a href="{{ route('admin.detailPenyewa', $penyewa->id_pey) }}"
                                            onclick="handleNavClick(event, this)"
                                            class="px-5 py-2.5 bg-slate-900 text-white rounded-xl font-bold text-[11px] hover:bg-[#1265A8] transition-all decoration-none flex items-center gap-2">
                                            <span class="btn-content flex items-center gap-2">
                                                Detail Penyewa
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
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
        const isBlueBtn = el.classList.contains('bg-[#1265A8]');
        const spinnerColor = (isDarkBtn || isBlueBtn) ? 'text-white' : 'text-blue-500';

        function handleNavClick(event, el) {
            const targetUrl = el.getAttribute('href');
            if (!targetUrl || targetUrl === '#') return;

            event.preventDefault();

            const content = el.querySelector('.btn-content');
            content.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="animate-pulse tracking-wide text-[11px] font-black uppercase">Memuat...</span>
            `;

            el.classList.add('pointer-events-none', 'opacity-80');

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 800);
        }

        function confirmDelete(button, penyewaId) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data penyewa dan booking terkait akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1265A8',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/penyewa/${penyewaId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            const card = button.closest('.group');
                            if (card) card.remove();

                            Swal.fire({
                                title: 'Terhapus!',
                                text: data.message,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                customClass: {
                                    popup: 'rounded-[2rem]'
                                }
                            });
                        })
                        .catch(err => {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus.', 'error');
                        });
                }
            })
        }

        // Logika Back to Top
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                // Tampilkan tombol saat scroll lebih dari 400px
                backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
                backToTopBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                // Sembunyikan tombol saat di atas
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
    </script>
</body>

</html>