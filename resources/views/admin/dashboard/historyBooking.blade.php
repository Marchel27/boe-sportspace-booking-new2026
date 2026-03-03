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

        @keyframes shimmer {
            0% {
                transform: translateX(-150%) skewX(-12deg);
            }

            100% {
                transform: translateX(250%) skewX(-12deg);
            }
        }

        .animate-shimmer {
            animation: shimmer 1.5s infinite;
        }

        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
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
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-[#1265A8] to-[#4292DC]">History Booking</span>
                        </h2>
                    </div>
                </div>
                @include('admin.dashboard.search.searchBar')
            </div>
        </header>

        <section class="mb-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
                <label for="selectAll" class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl border border-slate-200 shadow-sm hover:border-blue-300 transition-all cursor-pointer">
                    <input type="checkbox" id="selectAll" class="w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] cursor-pointer">
                    <span class="text-xs font-black text-slate-800 uppercase tracking-tight">Pilih Semua</span>
                </label>

                <div class="relative inline-block w-full sm:w-64">
                    <select id="filterLapangan" onchange="filterByLapangan()" class="appearance-none w-full bg-white border border-slate-200 text-slate-700 py-3 px-5 pr-10 rounded-2xl text-xs font-bold focus:outline-none focus:border-blue-400 shadow-sm cursor-pointer">
                        <option value="all">Semua Lapangan</option>
                        @php
                        // Mengambil daftar unik nama lapangan dari koleksi $bookings
                        $daftarLapangan = $bookings->pluck('lapangan.nama_lapangan')->unique();
                        @endphp
                        @foreach($daftarLapangan as $nama)
                        <option value="{{ $nama }}">{{ $nama }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div id="bulkActions" class="hidden opacity-0 scale-95 transition-all duration-300 w-full lg:w-auto">
                <button onclick="confirmBulkDelete()" class="w-full lg:w-auto group relative px-8 py-3 bg-white text-red-600 rounded-2xl border-2 border-red-100 font-bold text-xs hover:bg-red-600 hover:text-white transition-all flex items-center justify-center gap-2 overflow-hidden active:scale-95">
                    <div class="absolute inset-0 w-1/4 h-full bg-white/20 -skew-x-12 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Hapus (<span id="selectedCount">0</span>) Data</span>
                </button>
            </div>
        </section>

        <section class="mb-12">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100">
                                <th class="p-6 w-16 text-center"></th>
                                <th class="p-6 text-[11px] font-black text-slate-400 uppercase tracking-[0.1em]">Info Lapangan</th>
                                <th class="p-6 text-[11px] font-black text-slate-400 uppercase tracking-[0.1em]">Sesi Waktu</th>
                                <th class="p-6 text-[11px] font-black text-slate-400 uppercase tracking-[0.1em] text-center">Status</th>
                                <th class="p-6 text-[11px] font-black text-slate-400 uppercase tracking-[0.1em]">Tanggal</th>
                                <th class="p-6 text-[11px] font-black text-slate-400 uppercase tracking-[0.1em] text-right">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="bookingTableBody" class="divide-y divide-slate-50">
                            @foreach ($bookings as $booking)
                            <tr class="booking-row group hover:bg-slate-50/50 transition-all duration-200" data-lapangan="{{ $booking->lapangan->nama_lapangan }}">
                                <td class="p-6 text-center">
                                    <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] cursor-pointer" value="{{ $booking->id_bok }}">
                                </td>
                                <td class="p-6">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-slate-800 group-hover:text-[#1265A8] transition-colors field-name">{{ $booking->lapangan->nama_lapangan }}</span>
                                        <span class="text-[10px] text-slate-400 font-bold mt-0.5 tracking-tight">#BOE-{{ $booking->id_bok }}</span>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-200 rounded-xl shadow-sm">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500"></div>
                                        <span class="text-xs font-bold text-slate-700">{{ $booking->sesi_waktu }}</span>
                                    </div>
                                </td>
                                <td class="p-6 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase border bg-blue-50 text-[#1265A8] border-blue-100">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="p-6 text-xs text-slate-500 font-semibold italic">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="p-6 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('booking.detail', $booking->id_bok) }}" class="p-2.5 bg-slate-800 text-white rounded-xl hover:bg-slate-900 transition-all active:scale-90 shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <button onclick="confirmDelete(this, {{ $booking->id_bok }})" class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all border border-red-100 active:scale-90 shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
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

    <script>
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const bulkActions = document.getElementById('bulkActions');
        const countBadge = document.getElementById('selectedCount');

        // Fungsi Filter Berdasarkan Nama Lapangan
        function filterByLapangan() {
            const filterValue = document.getElementById('filterLapangan').value;
            const rows = document.querySelectorAll('.booking-row');

            rows.forEach(row => {
                const rowLapangan = row.getAttribute('data-lapangan');
                if (filterValue === 'all' || rowLapangan === filterValue) {
                    row.style.display = ""; // Tampilkan
                } else {
                    row.style.display = "none"; // Sembunyikan
                    // Uncheck jika baris yang dicentang disembunyikan
                    const cb = row.querySelector('.item-checkbox');
                    if (cb.checked) {
                        cb.checked = false;
                        updateRowStyle(cb);
                    }
                }
            });
            toggleBulkActions();
            selectAll.checked = false;
        }

        // Logika Select All (Hanya yang tampil setelah difilter)
        selectAll.addEventListener('change', function() {
            const rows = document.querySelectorAll('.booking-row');
            rows.forEach(row => {
                if (row.style.display !== "none") {
                    const cb = row.querySelector('.item-checkbox');
                    cb.checked = this.checked;
                    updateRowStyle(cb);
                }
            });
            toggleBulkActions();
        });

        // Event Listener Checkbox Satuan
        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                updateRowStyle(cb);
                toggleBulkActions();
                if (!cb.checked) selectAll.checked = false;
            });
        });

        function updateRowStyle(cb) {
            const row = cb.closest('tr');
            if (cb.checked) {
                row.classList.add('bg-blue-50/50', 'border-l-4', 'border-l-[#1265A8]');
            } else {
                row.classList.remove('bg-blue-50/50', 'border-l-4', 'border-l-[#1265A8]');
            }
        }

        function toggleBulkActions() {
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            const count = checkedBoxes.length;
            if (count > 0) {
                countBadge.innerText = count;
                bulkActions.classList.remove('hidden');
                setTimeout(() => bulkActions.classList.add('opacity-100', 'scale-100'), 10);
            } else {
                bulkActions.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => bulkActions.classList.add('hidden'), 300);
            }
        }

        function confirmDelete(btn, id) {
            Swal.fire({
                title: 'Hapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/booking/${id}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(() => {
                            btn.closest('tr').remove();
                            Swal.fire('Terhapus!', '', 'success');
                        });
                }
            });
        }

        function confirmBulkDelete() {
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            const ids = checkedBoxes.map(cb => cb.value);

            Swal.fire({
                title: `Hapus ${ids.length} Data?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/booking/bulk-delete`, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                ids: ids
                            })
                        })
                        .then(res => res.json())
                        .then(() => {
                            checkedBoxes.forEach(cb => cb.closest('tr').remove());
                            toggleBulkActions();
                            Swal.fire('Berhasil!', '', 'success');
                        });
                }
            });
        }
    </script>
</body>

</html>