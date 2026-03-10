<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Schedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .modal-active {
            overflow: hidden;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen p-4 md:p-8">

    <div id="confirmModal" class="fixed inset-0 z-[999] hidden">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white w-full max-w-sm rounded-[32px] p-8 shadow-2xl transform transition-all scale-95 opacity-0 duration-300">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-amber-50 mb-6">
                        <svg class="h-8 w-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Tinggalkan Halaman?</h3>
                    <p class="text-sm text-slate-500 mb-8 leading-relaxed">Pastikan perubahan Anda telah disimpan.</p>
                    <div class="flex flex-col gap-3">
                        <button onclick="executeBack(this)" class="w-full py-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-2xl shadow-lg transition-all active:scale-95">Ya, Tinggalkan</button>
                        <button onclick="toggleModal(false)" class="w-full py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <button onclick="toggleModal(true)" class="group flex items-center gap-3 px-5 py-2.5 bg-white border border-slate-200 rounded-2xl shadow-sm hover:border-red-200 transition-all">
                <div class="p-1 bg-slate-50 group-hover:bg-red-50 rounded-lg">
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-slate-600 group-hover:text-red-600">Kembali</span>
            </button>
        </div>

        <div class="flex items-center gap-3">
            <div class="bg-[#1265A8] p-1.5 rounded-full shadow-lg">
                <svg class="w-3.5 h-3.5 text-white fill-current" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </div>
            <h2 class="text-[#1265A8] font-extrabold text-lg uppercase tracking-wider">Schedule Pembookingan</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-4 flex flex-col md:flex-row items-center justify-between gap-6">
            <div id="dateList" class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-2 md:pb-0 max-w-full lg:max-w-[700px]">
                <div id="dateDivider" class="h-10 w-px bg-slate-100 mx-2 flex-shrink-0"></div>
                <div class="relative w-10 h-10 flex-shrink-0 group">
                    <input type="date" id="calendarPicker"
                        value="{{ $date ?? date('Y-m-d') }}"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                        onchange="handleDateChange(this.value)">
                    <div class="absolute inset-0 p-2 border border-slate-200 rounded-xl bg-white flex items-center justify-center group-hover:bg-slate-50 transition-colors z-10">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-6 w-full md:w-auto border-t md:border-t-0 md:border-l border-slate-100 pt-4 md:pt-0 md:pl-6">
                <div class="relative inline-block text-left" x-data="{ open: false }" @mouseleave="open = false">
                    <button
                        @mouseenter="open = true"
                        class="group flex items-center gap-3 px-4 py-2 bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md hover:border-[#1265A8]/30 transition-all duration-300 active:scale-95">

                        <div class="flex items-center justify-center w-8 h-8 rounded-xl bg-blue-50 group-hover:bg-[#1265A8] transition-colors duration-300">
                            <svg class="w-4 h-4 text-[#1265A8] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>

                        <div class="flex flex-col items-start leading-none">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Cabor</span>
                            <span class="text-sm font-extrabold text-slate-700 group-hover:text-[#1265A8]">
                                {{ $lapangan->nama_lapangan ?? 'Pilih' }}
                            </span>
                        </div>

                        <div class="ml-2 pl-3 border-l border-slate-100">
                            <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        class="absolute right-0 mt-2 w-56 origin-top-right bg-white/90 backdrop-blur-xl border border-slate-100 rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 z-50 overflow-hidden"
                        @mouseenter="open = true">
                        <div class="py-2">
                            <div class="px-4 py-2 border-b border-slate-50 mb-1">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Daftar Lapangan</p>
                            </div>
                            @foreach($allLapangan as $l)
                            <a href="?id_lap={{ $l->id_lap }}&date={{ $date }}"
                                class="group/item flex items-center px-4 py-3 text-xs font-bold transition-all duration-300 
                                {{ ($lapangan->id_lap ?? 0) == $l->id_lap 
                                    ? 'text-[#1265A8] bg-blue-50/80 pl-6' 
                                    : 'text-slate-600 hover:bg-slate-50 hover:text-[#1265A8] hover:pl-6' }}">

                                <span class="w-1.5 h-1.5 rounded-full mr-3 transition-all duration-300 
                                    {{ ($lapangan->id_lap ?? 0) == $l->id_lap 
                                        ? 'bg-[#1265A8] scale-100' 
                                        : 'bg-slate-300 scale-0 group-hover/item:scale-100 group-hover/item:bg-[#1265A8]' }}">
                                </span>

                                {{ $l->nama_lapangan }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[40px] shadow-xl overflow-hidden border border-slate-100 flex flex-col lg:flex-row min-h-[500px]">

            <div class="lg:w-[45%] relative p-6">
                <div class="w-full h-full min-h-[300px] lg:min-h-full relative overflow-hidden rounded-[30px] group">
                    @if($lapangan && $lapangan->thumbnail)
                    <img src="{{ asset('storage/' . $lapangan->thumbnail) }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        alt="{{ $lapangan->nama_lapangan }}">
                    @else
                    <img src="{{ asset('image/pictures/football.png') }}"
                        class="w-full h-full object-cover"
                        alt="Default Image">
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>

                    <div class="absolute bottom-6 left-6">
                        <span class="px-4 py-2 bg-white/20 backdrop-blur-md border border-white/30 rounded-full text-white text-[10px] font-bold uppercase tracking-widest">
                            ID: #LPG-{{ str_pad($lapangan->id_lap ?? $lapangan->id, 4, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="lg:w-[55%] p-8 md:p-10 flex flex-col justify-between">
                <div class="space-y-6">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 leading-tight">
                                {{ $lapangan->nama_lapangan }}
                            </h1>
                            <span class="flex-shrink-0 px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-bold uppercase rounded-lg">
                                Lantai {{ $lapangan->lantai ?? '1' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-[#1265A8]"></div>
                            <p class="text-[#9BB7D9] text-[11px] font-bold uppercase tracking-widest">
                                Jadwal Operasional • {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @php
                        $startHour = 8;
                        $endHour = 22;
                        @endphp

                        @for($i = $startHour; $i <= $endHour; $i++)
                            @php
                            $timeStart=str_pad($i, 2, '0' , STR_PAD_LEFT) . ':00' ;
                            $timeEnd=str_pad($i + 1, 2, '0' , STR_PAD_LEFT) . ':00' ;
                            $sessionString="$timeStart - $timeEnd" ;
                            $isBooked=in_array($sessionString, $bookedSlots);
                            @endphp

                            <div class="relative group p-4 border-2 rounded-[24px] transition-all duration-300 
                        {{ $isBooked 
                            ? 'bg-slate-50 border-slate-100 opacity-60 cursor-not-allowed' 
                            : 'bg-white border-slate-50 hover:border-[#1265A8] hover:shadow-lg hover:-translate-y-1 cursor-pointer' }}">

                            <span class="block text-[9px] font-bold mb-1 {{ $isBooked ? 'text-slate-400' : 'text-[#1265A8]' }}">
                                60 MIN
                            </span>

                            <h4 class="font-extrabold text-base text-slate-800">{{ $timeStart }}</h4>
                            <p class="text-[10px] text-slate-400 font-medium mb-2">s/d {{ $timeEnd }}</p>

                            <div class="flex items-center gap-1.5">
                                <div class="w-1.5 h-1.5 rounded-full {{ $isBooked ? 'bg-red-400' : 'bg-green-500' }}"></div>
                                <p class="text-[9px] font-bold uppercase tracking-tighter {{ $isBooked ? 'text-red-400' : 'text-green-600' }}">
                                    {{ $isBooked ? 'Booked' : 'Tersedia' }}
                                </p>
                            </div>

                            @if(!$isBooked)
                            <a href="{{ route('formBooking', ['id_lap' => $lapangan->id_lap]) }}?time={{ urlencode($sessionString) }}&date={{ $date }}"
                                class="absolute inset-0 z-10 rounded-[24px] active:bg-slate-100/50 active:scale-[0.98] transition-all">
                            </a>
                            @endif
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        function toggleModal(show) {
            const modal = document.getElementById('confirmModal');
            const modalContent = modal.querySelector('.relative.bg-white'); // Target box putih

            if (show) {
                modal.classList.remove('hidden');
                document.body.classList.add('modal-active');
                // Trigger animasi masuk
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            } else {
                // Animasi keluar dulu baru sembunyikan
                modalContent.classList.add('scale-95', 'opacity-0');
                modalContent.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.classList.remove('modal-active');
                }, 200);
            }
        }

        function executeBack(btn) {
            btn.innerHTML = "Memuat...";
            // Gunakan URL '/' atau window.history.back()
            window.location.href = "/";
        }

        function handleDateChange(newDate) {
            const params = new URLSearchParams(window.location.search);
            params.set('date', newDate);
            // Pastikan menggunakan id_lap dari variabel PHP
            params.set('id_lap', "{{ $lapangan->id_lap ?? '' }}");
            window.location.href = window.location.pathname + '?' + params.toString();
        }

        function renderDateList() {
            const container = document.getElementById('dateList');
            const divider = document.getElementById('dateDivider');
            const selectedDateStr = "{{ $date }}";
            const today = new Date();

            for (let i = 0; i < 14; i++) {
                const d = new Date();
                d.setDate(today.getDate() + i);
                const iso = d.toISOString().split('T')[0];
                const active = iso === selectedDateStr;

                const div = document.createElement('div');
                div.className = `px-5 py-3 text-center min-w-[85px] rounded-2xl cursor-pointer flex-shrink-0 transition-all ${active ? 'bg-[#1265A8] text-white shadow-lg' : 'hover:bg-slate-100 text-slate-800'}`;
                div.onclick = () => handleDateChange(iso);

                div.innerHTML = `
                    <p class="text-[10px] font-bold uppercase ${active ? 'text-blue-200' : 'text-slate-400'}">${d.toLocaleDateString('id-ID', {weekday: 'short'})}</p>
                    <p class="text-lg font-extrabold">${d.getDate()} ${d.toLocaleDateString('id-ID', {month: 'short'})}</p>
                `;
                container.insertBefore(div, divider);
            }
        }
        renderDateList();
    </script>
</body>

</html>