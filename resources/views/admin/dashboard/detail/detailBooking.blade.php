<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Detail Booking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body.swal2-shown {
            overflow: unset !important;
            padding-right: 0 !important;
        }

        @keyframes shining {
            100% { 
                transform: translateX(100%); 
            }
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-[#f8fafc] flex items-center justify-center p-4 font-sans text-slate-900">
        <div class="w-full max-w-xl bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-white p-2">
            
            <div class="bg-white rounded-[2.3rem] p-8 sm:p-10 border border-slate-100">
                
                <div class="mb-10 text-center">
                    <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase tracking-[0.2em] px-3 py-1.5 rounded-full mb-3">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                        </span>
                        Administrator
                    </div>

                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Detail Booking</h2>
                    <p class="text-slate-400 text-sm mt-1 font-medium">Lengkapi data reservasi lapangan</p>
                </div>

                <form action="#" id="formBooking" class="grid grid-cols-1 gap-6">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-blue-600 uppercase tracking-wider z-10">Nama Pemesan</label>
                            <input type="text" placeholder="Yanto Sholeh" 
                                class="w-full px-5 py-4 bg-slate-50/50 border-2 border-slate-100 rounded-2xl focus:border-blue-500 focus:bg-white outline-none transition-all duration-300 font-semibold text-slate-700 placeholder:text-slate-300" required>
                        </div>
                        <div class="relative group">
                            <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-blue-600 uppercase tracking-wider z-10">WhatsApp</label>
                            <input type="tel" placeholder="08934678010" 
                                class="w-full px-5 py-4 bg-slate-50/50 border-2 border-slate-100 rounded-2xl focus:border-blue-500 focus:bg-white outline-none transition-all duration-300 font-semibold text-slate-700 placeholder:text-slate-300" required>
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-blue-600 uppercase tracking-wider z-10">Fasilitas / Lapangan</label>
                        <select class="w-full px-5 py-4 bg-slate-50/50 border-2 border-slate-100 rounded-2xl focus:border-blue-500 focus:bg-white outline-none transition-all duration-300 font-semibold text-slate-700 appearance-none cursor-pointer" required>
                            <option>Tennis BOE - Sport Space</option>
                            <option>Volli BOE - Sport Space</option>
                            <option>Football BOE - Sport Space</option>
                            <option>Swimming BOE - Sport Space</option>
                            <option>Badminton BOE - Sport Space</option>
                        </select>
                        <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-emerald-600 uppercase tracking-wider z-10">Total Pembayaran</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-5 text-emerald-600 font-bold">Rp</span>
                            <input type="number" value="200000" 
                                class="w-full pl-12 pr-5 py-4 bg-emerald-50/30 border-2 border-emerald-100/50 rounded-2xl focus:border-emerald-500 focus:bg-white outline-none transition-all duration-300 font-bold text-xl text-emerald-700" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative">
                            <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider z-10">Tanggal</label>
                            <input type="date" value="2026-10-09" 
                                class="w-full px-4 py-4 bg-slate-50/50 border-2 border-slate-100 rounded-2xl focus:border-blue-500 focus:bg-white outline-none transition-all duration-300 font-bold text-slate-600 text-sm" required>
                        </div>
                        <div class="relative">
                            <label class="absolute -top-2.5 left-4 bg-white px-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider z-10">Jam</label>
                            <input type="time" value="14:00" 
                                class="w-full px-4 py-4 bg-slate-50/50 border-2 border-slate-100 rounded-2xl focus:border-blue-500 focus:bg-white outline-none transition-all duration-300 font-bold text-slate-600 text-sm" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-8">
                        <button type="button" onclick="konfirmasiBatal()" 
                            class="order-2 sm:order-1 w-full py-4 rounded-2xl text-slate-500 font-bold tracking-wide border-2 border-slate-100 hover:border-slate-200 hover:bg-slate-50 hover:text-slate-700 transition-all duration-300 active:scale-[0.97] flex items-center justify-center group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            KEMBALI
                        </button>

                        <button type="submit" id="btnSimpan" 
                            class="order-1 sm:order-2 w-full py-4 bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white rounded-2xl font-black tracking-[0.1em] shadow-[0_10px_20px_-5px_rgba(37,99,235,0.3)] hover:shadow-[0_15px_30px_-5px_rgba(37,99,235,0.4)] transition-all duration-300 active:scale-[0.97] flex items-center justify-center gap-3 overflow-hidden relative group">
                            
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shining_1.5s_infinite]"></span>
                            
                            <div id="btnContent" class="flex items-center gap-3 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" x2="12" y1="15" y2="3"/>
                                </svg>
                                <span class="relative">SIMPAN DATA</span>
                            </div>

                            <div id="btnLoader" class="hidden animate-spin">
                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.getElementById('formBooking');

        form.addEventListener('submit', function (e) {
            e.preventDefault(); 
            tanyaKonfirmasi();
        });

        // Popup Pilihan (Ya/Tidak)
        function tanyaKonfirmasi() {
            Swal.fire({
                title: '<span class="text-xl font-black text-slate-800 uppercase tracking-widest">Simpan Data?</span>',
                html: '<p class="text-slate-500 font-medium text-sm">Pastikan data booking sudah sesuai sebelum disimpan ke sistem.</p>',
                icon: 'question',
                iconColor: '#2563eb',
                showCancelButton: true,
                confirmButtonColor: '#2563eb', 
                cancelButtonColor: '#1e293b',  
                confirmButtonText: 'YA, SIMPAN',
                cancelButtonText: 'CEK LAGI',
                reverseButtons: true,
                scrollbarPadding: false,
                borderRadius: '2.5rem',
                padding: '2.5rem',
                customClass: {
                    confirmButton: 'rounded-xl px-8 py-3 font-bold text-xs tracking-wider',
                    cancelButton: 'rounded-xl px-8 py-3 font-bold text-xs tracking-wider text-white'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    jalankanProsesSimpan();
                }
            });
        }

        // Eksekusi Simpan & Animasi Loading
        function jalankanProsesSimpan() {
            const btn = document.getElementById('btnSimpan');
            const content = document.getElementById('btnContent');
            const loader = document.getElementById('btnLoader');

            btn.classList.add('pointer-events-none', 'opacity-90');
            content.classList.add('hidden');
            loader.classList.remove('hidden');

            Swal.fire({
                title: '<span class="text-xl font-black text-slate-800 uppercase tracking-widest">Memproses Data</span>',
                html: `
                    <div class="mt-4 mb-2">
                        <p class="text-slate-500 text-sm font-medium animate-pulse">Mohon tunggu sebentar...</p>
                        <p class="text-slate-400 text-[10px] mt-2 tracking-tight">Sedang mendaftarkan reservasi ke database BOE-Sport</p>
                    </div>
                `,
                allowOutsideClick: false,
                showConfirmButton: false,
                scrollbarPadding: false,
                borderRadius: '2.5rem',
                padding: '3rem',
                didOpen: () => {
                    Swal.showLoading(); 
                }
            });

            // proses server
            setTimeout(() => {
                Swal.fire({
                    title: '<span class="text-2xl font-black text-slate-800">BERHASIL!</span>',
                    html: '<p class="text-slate-500 font-medium">Data booking telah berhasil disimpan ke sistem.</p>',
                    icon: 'success',
                    iconColor: '#10B981',
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    scrollbarPadding: false,
                    customClass: {
                        popup: 'rounded-[2rem] border-none shadow-2xl',
                        timerProgressBar: 'bg-gradient-to-r from-emerald-400 to-cyan-500',
                    },
                    willClose: () => {
                        const container = document.querySelector('.min-h-screen');
                        container.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                        container.style.opacity = '0';
                        container.style.transform = 'scale(0.98) translateY(-15px)';
                        container.style.filter = 'blur(10px)';
                        
                        setTimeout(() => {
                            window.location.href = "/admin/dashboard/historyBooking";
                        }, 500);
                    }
                });
            }, 1500); 
        }

        // Konfirmasi Pembatalan 
        function konfirmasiBatal() {
            Swal.fire({
                title: '<span class="text-xl font-black text-slate-800 uppercase tracking-[0.2em]">Batalkan Sesi?</span>',
                html: '<p class="text-slate-500 font-medium text-sm px-4 leading-relaxed tracking-wide">Data yang telah Anda masukkan akan terhapus. <br> Apakah Anda yakin?</p>',
                icon: 'warning',
                iconColor: '#f43f5e',
                showCancelButton: true,
                confirmButtonColor: '#f43f5e', 
                cancelButtonColor: '#1e293b', 
                confirmButtonText: 'YA, BATALKAN',
                cancelButtonText: 'TIDAK, KEMBALI',
                reverseButtons: true,
                scrollbarPadding: false,
                padding: '3rem 2rem',
                borderRadius: '2.5rem',
                customClass: {
                    confirmButton: 'rounded-2xl px-8 py-4 font-black tracking-widest text-[10px]',
                    cancelButton: 'rounded-2xl px-8 py-4 font-black tracking-widest text-[10px] text-white'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '<span class="text-lg font-black text-slate-800 uppercase tracking-[0.2em]">Membatalkan...</span>',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        borderRadius: '2.5rem',
                        scrollbarPadding: false,
                        didOpen: () => { Swal.showLoading(); }
                    });

                    setTimeout(() => {
                        window.location.href = "/admin/dashboard/historyBooking";
                    }, 800);
                }
            });
        }
    </script>
</body>
</html>