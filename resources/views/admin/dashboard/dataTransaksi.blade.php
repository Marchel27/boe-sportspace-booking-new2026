<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <header class="mb-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center justify-between md:justify-start gap-4 flex-1">
                    <div class="relative">
                        <div class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-[#1265A8] to-transparent rounded-full opacity-50 hidden md:block"></div>
                        <h2 class="text-2xl md:text-3xl font-black tracking-tight text-slate-800 flex items-center gap-3">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-[#1265A8] to-[#4292DC]">
                                Data Harga Sewa
                            </span>
                            <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest animate-pulse">
                                Live
                            </span>
                        </h2>
                        <p class="mt-1 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Selamat datang di <span class="text-slate-600 font-semibold mx-1">manajemen data transaksi</span>.
                        </p>
                    </div>

                    <button onclick="toggleSidebar()" class="md:hidden p-3 bg-white rounded-xl border border-slate-100 text-[#1265A8] hover:bg-blue-50 transition-all active:scale-95 group">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                @include('admin.dashboard.search.searchBar')
            </div>
        </header>

        {{-- Filter Section --}}
        <section class="mb-8 flex flex-wrap items-center justify-between gap-6 bg-white px-6 py-4 rounded-3xl border border-slate-200/60 shadow-sm">
            <div class="flex items-center gap-4">
                {{-- Tambahkan ID filterForm untuk JavaScript --}}
                <form id="filterForm" method="GET" action="{{ route('admin.riwayat.index') }}" class="flex items-center gap-4">
                    <div class="relative group">
                        <input type="date" name="tanggal" id="filterTanggal"
                            class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 uppercase tracking-wider focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-[#1265A8]/50 transition-all cursor-pointer"
                            value="{{ request('tanggal') }}">
                    </div>

                    <div class="relative group">
                        <select name="lapangan_id" id="filterLapangan"
                            class="pl-4 pr-10 py-2.5 bg-white border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 uppercase tracking-wider focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-[#1265A8]/50 transition-all cursor-pointer appearance-none">
                            <option value="">Semua Lapangan</option>
                            @if(isset($lapangans))
                            @foreach($lapangans as $lp)
                            <option value="{{ $lp->id_lap }}" {{ request('lapangan_id') == $lp->id_lap ? 'selected' : '' }}>
                                {{ $lp->nama_lapangan }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    {{-- Tombol filter disembunyikan karena sudah otomatis, atau biarkan sebagai fallback --}}
                    <button type="submit" class="hidden px-5 py-2.5 text-xs font-bold text-white bg-[#1265A8] rounded-2xl hover:bg-blue-700 transition-all">
                        Filter
                    </button>

                    <a href="{{ route('dashboardDataTransaksi') }}" id="resetBtn" class="px-5 py-2.5 text-xs font-bold text-red-500 border border-red-500 rounded-2xl hover:bg-red-50 transition-all">
                        Reset
                    </a>
                </form>
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-3 cursor-pointer group">
                    <span id="selectLabel" class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.15em] group-hover:text-slate-600 transition-colors">Pilih Semua</span>
                    <div class="relative flex items-center">
                        <input type="checkbox" id="selectAll" class="peer appearance-none w-5 h-5 border-2 border-slate-200 rounded-lg checked:bg-[#1265A8] checked:border-[#1265A8] transition-all cursor-pointer">
                        <svg class="absolute w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 left-0.5 pointer-events-none transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </label>

                <div id="bulkActions" class="hidden items-center animate-in fade-in slide-in-from-left-4 duration-300">
                    <button onclick="triggerBulkConfirm()" class="flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-xl text-xs font-bold shadow-lg shadow-red-200 hover:bg-red-600 transition-all uppercase tracking-widest">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus (<span id="selectedCount">0</span>) Data
                    </button>
                </div>
            </div>
        </section>

        @foreach($transaksi as $trx)
        <section class="max-w-5xl mx-auto my-10 px-4 group/card" data-id="{{ $trx->id }}">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] overflow-hidden transition-all duration-300 hover:border-blue-200">
                <div class="px-8 py-7 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <div class="flex items-center gap-4">
                            <div class="relative flex items-center">
                                <input type="checkbox" class="itemCheckbox peer appearance-none w-5 h-5 border-2 border-slate-200 rounded-lg checked:bg-[#1265A8] checked:border-[#1265A8] transition-all cursor-pointer focus:ring-4 focus:ring-blue-50">
                                <svg class="absolute w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 left-[3px] pointer-events-none transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3.5">
                                    <path d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#1265A8] border border-slate-200 shadow-sm transition-transform group-hover/card:scale-105">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-xl font-bold text-slate-800 tracking-tight leading-tight">
                                {{ $trx->lapangan->nama_lapangan}}
                            </h3>
                            <p class="text-slate-400 text-[11px] uppercase tracking-wider">
                                ID Transaksi: #TRX{{ $trx->id }}<span class="mx-1 opacity-50">•</span> {{ $trx->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    <button class="delete-single p-2.5 text-red-500 bg-red-50 border border-red-100 rounded-xl transition-all hover:bg-red-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    <div class="p-8">
                        <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-8 flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div> Data Sebelumnya
                        </h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Harga Sewa</span>
                            <span class="text-sm font-bold text-slate-700">Rp {{ number_format($trx->harga_lama) }}</span>
                        </div>
                    </div>

                    <div class="p-8 bg-blue-50/20">
                        <h4 class="text-[11px] font-bold text-[#1265A8] uppercase tracking-[0.2em] mb-8 flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#1265A8]"></div> Data Terbaru
                        </h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Harga Sewa Baru</span>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-black text-[#1265A8]">Rp {{ number_format($trx->harga_baru) }}</span>
                                @php
                                $hargaLama = $trx->harga_lama;
                                $hargaBaru = $trx->harga_baru;
                                $persen = $hargaLama > 0 ? round((($hargaBaru - $hargaLama) / $hargaLama) * 100) : 0;
                                $color = $persen >= 0 ? 'green' : 'red';
                                $prefix = $persen >= 0 ? '+' : '';
                                @endphp
                                <span class="text-[9px] font-bold text-{{ $color }}-600 bg-{{ $color }}-100 px-1.5 py-0.5 rounded-md">
                                    {{ $prefix }}{{ $persen }}%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach

        <button id="backToTop" class="fixed bottom-8 right-8 z-50 p-4 rounded-2xl bg-white/80 backdrop-blur-lg border border-slate-200 text-[#1265A8] shadow-2xl transition-all duration-500 translate-y-20 opacity-0 hover:bg-[#1265A8] hover:text-white group">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterForm = document.getElementById('filterForm');
                const filterTanggal = document.getElementById('filterTanggal');
                const filterLapangan = document.getElementById('filterLapangan');
                const selectAllBtn = document.getElementById('selectAll');
                const selectLabel = document.getElementById('selectLabel');
                const bulkActions = document.getElementById('bulkActions');
                const selectedCount = document.getElementById('selectedCount');
                const backToTopBtn = document.getElementById('backToTop');

                // --- LOGIKA OTOMATIS FILTER ---
                const autoSubmit = () => {
                    // Opsional: tambahkan efek loading visual
                    document.body.style.opacity = '0.6';
                    document.body.style.pointerEvents = 'none';
                    filterForm.submit();
                };

                if (filterTanggal) filterTanggal.addEventListener('change', autoSubmit);
                if (filterLapangan) filterLapangan.addEventListener('change', autoSubmit);

                // --- LOGIKA CHECKBOX & UI ---
                const getItemCheckboxes = () => document.querySelectorAll('.itemCheckbox');

                function toggleBulkActions() {
                    const count = Array.from(getItemCheckboxes()).filter(cb => cb.checked).length;
                    selectedCount.innerText = count;
                    bulkActions.classList.toggle('hidden', count === 0);
                    bulkActions.classList.toggle('flex', count > 0);
                }

                function updateCardUI(checkbox) {
                    const innerBox = checkbox.closest('section').querySelector('.bg-white.rounded-3xl');
                    if (checkbox.checked) {
                        innerBox.classList.add('ring-2', 'ring-[#1265A8]/20', 'border-[#1265A8]/30', 'bg-blue-50/5');
                    } else {
                        innerBox.classList.remove('ring-2', 'ring-[#1265A8]/20', 'border-[#1265A8]/30', 'bg-blue-50/5');
                    }
                }

                if (selectAllBtn) {
                    selectAllBtn.addEventListener('change', function() {
                        getItemCheckboxes().forEach(checkbox => {
                            checkbox.checked = this.checked;
                            updateCardUI(checkbox);
                        });
                        selectLabel.innerText = this.checked ? "Batalkan Semua" : "Pilih Semua";
                        toggleBulkActions();
                    });
                }

                document.addEventListener('change', (e) => {
                    if (e.target.classList.contains('itemCheckbox')) {
                        updateCardUI(e.target);
                        toggleBulkActions();
                    }
                });

                // --- LOGIKA DELETE ---
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.delete-single')) {
                        const card = e.target.closest('section');
                        const id = card.dataset.id;
                        if (confirm("Yakin ingin menghapus transaksi ini?")) {
                            fetch(`/admin/riwayat/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            }).then(res => res.json()).then(data => {
                                if (data.success) {
                                    card.remove();
                                    alert(data.message);
                                }
                            });
                        }
                    }
                });

                // --- BACK TO TOP ---
                window.addEventListener('scroll', () => {
                    const isVisible = window.scrollY > 400;
                    backToTopBtn.classList.toggle('translate-y-0', isVisible);
                    backToTopBtn.classList.toggle('opacity-100', isVisible);
                    backToTopBtn.classList.toggle('translate-y-20', !isVisible);
                    backToTopBtn.classList.toggle('opacity-0', !isVisible);
                });

                backToTopBtn.addEventListener('click', () => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </main>
</body>

</html>