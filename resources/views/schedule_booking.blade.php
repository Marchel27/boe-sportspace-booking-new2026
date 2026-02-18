<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-800 mb-2">Tinggalkan Halaman?</h3>
                    <p class="text-sm text-slate-500 mb-8 leading-relaxed">Pastikan perubahan Anda telah disimpan. Apakah Anda yakin ingin kembali?</p>
                    <div class="flex flex-col gap-3">
                        <button onclick="executeBack(this)" class="w-full py-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-2xl shadow-lg shadow-red-200 transition-all active:scale-95 flex items-center justify-center">
                            Ya, Tinggalkan
                        </button>
                        <button onclick="toggleModal(false)" class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto space-y-6">
        
        <div class="flex items-center justify-between">
            <button onclick="toggleModal(true)" class="group flex items-center gap-3 px-5 py-2.5 bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md hover:border-red-200 transition-all duration-300">
                <div class="p-1 bg-slate-50 group-hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-5 h-5 text-slate-500 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </div>
                <span class="text-sm font-bold text-slate-600 group-hover:text-red-600">Kembali</span>
            </button>
        </div>

        <div class="flex items-center gap-3">
            <div class="bg-[#1265A8] p-1.5 rounded-full shadow-lg shadow-blue-100">
                <svg class="w-3.5 h-3.5 text-white fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </div>
            <h2 class="text-[#1265A8] font-extrabold text-lg uppercase tracking-wider">Schedule Pembookingan</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-4 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-2 md:pb-0 w-full md:w-auto">
                <div class="bg-[#1265A8] text-white px-5 py-3 rounded-2xl text-center min-w-[85px] shadow-lg shadow-blue-200">
                    <p class="text-[10px] font-bold uppercase opacity-80">Sel</p>
                    <p class="text-lg font-extrabold leading-tight">02 Feb</p>
                </div>
                <div class="px-5 py-3 text-center min-w-[85px] hover:bg-slate-50 rounded-2xl transition-colors cursor-pointer group">
                    <p class="text-[10px] font-bold text-slate-400 group-hover:text-slate-600 uppercase">Sel</p>
                    <p class="text-lg font-extrabold text-slate-800 leading-tight">02 Feb</p>
                </div>
                <div class="px-5 py-3 text-center min-w-[85px] hover:bg-slate-50 rounded-2xl transition-colors cursor-pointer group">
                    <p class="text-[10px] font-bold text-slate-400 group-hover:text-slate-600 uppercase">Rab</p>
                    <p class="text-lg font-extrabold text-slate-800 leading-tight">03 Feb</p>
                </div>
                <div class="px-5 py-3 text-center min-w-[85px] hover:bg-slate-50 rounded-2xl transition-colors cursor-pointer group">
                    <p class="text-[10px] font-bold text-slate-400 group-hover:text-slate-600 uppercase">Kam</p>
                    <p class="text-lg font-extrabold text-slate-800 leading-tight">04 Feb</p>
                </div>
                <div class="px-5 py-3 text-center min-w-[85px] hover:bg-slate-50 rounded-2xl transition-colors cursor-pointer group">
                    <p class="text-[10px] font-bold text-slate-400 group-hover:text-slate-600 uppercase">Jum</p>
                    <p class="text-lg font-extrabold text-slate-800 leading-tight">05 Feb</p>
                </div>
                <div class="h-10 w-px bg-slate-100 mx-2"></div>
                <div class="relative w-10 h-10"> <input type="date" id="calendarPicker" 
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" 
                        onchange="handleDateChange(this.value)"
                        onclick="this.showPicker()"> <div class="absolute inset-0 p-2 border border-slate-200 rounded-xl bg-white flex items-center justify-center group-hover:bg-slate-50 transition-colors z-10">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-6 w-full md:w-auto border-t md:border-t-0 md:border-l border-slate-100 pt-4 md:pt-0 md:pl-6">
                <button class="flex items-center gap-2 text-slate-500 font-bold text-xs uppercase tracking-widest hover:text-[#1265A8]">
                    Filter Waktu <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </button>
                <button class="flex items-center gap-2 text-slate-500 font-bold text-xs uppercase tracking-widest hover:text-[#1265A8]">
                    Cabor <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 flex flex-col lg:row lg:flex-row">
            <div class="lg:w-[45%] h-72 lg:h-auto relative p-6">
                <img src="/image/pictures/tenis-boe.svg" alt="Tennis Court" class="w-full h-full object-cover rounded-[30px] shadow-inner">
            </div>

            <div class="lg:w-[55%] p-8 md:p-10 space-y-6">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">Tennis BOE-Sport space</h1>
                        <span class="text-slate-400 text-[10px] font-bold uppercase flex items-center gap-1">Court 1 <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
                    </div>
                    <p class="text-[#9BB7D9] text-[11px] font-medium uppercase tracking-[0.18em] flex items-center">
                        ID TRANSAKSI: #TRX-90231 <span class="mx-2 opacity-60">•</span> 18 FEBRUARY 2026
                    </p>
                    <p class="text-slate-400 text-xs mt-2 italic">Outdoor - bersebelahan dengan lapangan 1</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-1.5 bg-[#1265A8] text-white text-[10px] font-bold rounded-lg uppercase tracking-wider flex items-center gap-1.5 shadow-sm shadow-blue-100">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M6.7 6.7a10 10 0 0 1 10.6 10.6"></path>
                            <path d="M17.3 6.7a10 10 0 0 0-10.6 10.6"></path>
                        </svg>
                        Tennis
                    </span>
                    <span class="px-4 py-1.5 bg-[#1265A8] text-white text-[10px] font-bold rounded-lg uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg> Outdoor
                    </span>
                    <span class="px-4 py-1.5 bg-[#1265A8] text-white text-[10px] font-bold rounded-lg uppercase tracking-wider">Hard Courtx</span>
                    <button class="px-4 py-1.5 bg-[#1265A8] text-white text-[10px] font-bold rounded-lg uppercase tracking-wider flex items-center gap-1.5 hover:brightness-110 transition-all">
                        Jadwal Tersedia <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                </div>

                <div class="h-px bg-slate-100 w-full"></div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>

                    <div class="p-3 border-2 border-slate-800 rounded-2xl text-center relative bg-white shadow-md transform -translate-y-1 transition-transform">
                        <p class="text-[9px] font-bold text-slate-500 uppercase">60 Menit</p>
                        <p class="font-extrabold text-slate-900 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-900 uppercase mt-1">Booked</p>
                    </div>

                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>

                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>
                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>
                    <div class="p-3 border-2 border-slate-800 rounded-2xl text-center relative bg-white shadow-md">
                        <p class="text-[9px] font-bold text-slate-500 uppercase">60 Menit</p>
                        <p class="font-extrabold text-slate-900 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-900 uppercase mt-1">Booked</p>
                    </div>
                    <div class="p-3 border border-slate-100 rounded-2xl text-center opacity-40 grayscale">
                        <p class="text-[9px] font-bold text-slate-400 uppercase">60 Menit</p>
                        <p class="font-bold text-slate-700 text-sm">14.00 - 15.00</p>
                        <p class="text-[9px] font-black text-slate-400 uppercase mt-1">Booked</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('confirmModal');
        const modalContent = modal.querySelector('.relative');

        function toggleModal(show) {
            if (show) {
                modal.classList.remove('hidden');
                document.body.classList.add('modal-active');
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            } else {
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.classList.remove('modal-active');
                }, 300);
            }
        }

        function executeBack(btn) {
            btn.innerHTML = `<svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>`;
            setTimeout(() => {
                window.history.back();
            }, 600);
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal.firstElementChild) toggleModal(false);
        });

        function handleDateChange(date) {
            if(date) {
                console.log("Tanggal terpilih:", date);
            }
        }
    </script>
</body>
</html>