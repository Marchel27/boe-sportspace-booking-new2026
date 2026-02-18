@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="icon" href="/image/logo/tutwuri-logo.svg">
<title>BOE-SportSpace</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes shine {
        100% { transform: translateX(100%); }
    }
</style>

    <main class="min-h-screen -mt-23 flex flex-col items-center justify-start bg-gradient-to-br from-slate-50 to-gray-100 pt-24 pb-12 px-4 font-['Poppins']">
    
        <div class="w-full max-w-xl mt-12 animate-fade-in-up"> 
            
            <div class="bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-white/40 transition-all duration-500 hover:shadow-[0_30px_60px_rgba(0,0,0,0.08)]">
                
                <div class="mb-10 text-center relative">
                    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-32 h-32 bg-blue-100/30 blur-3xl rounded-full -z-10"></div>

                    <div class="inline-flex items-center gap-2 px-3 py-1 mb-4 text-[10px] font-bold tracking-[0.2em] text-[#1265A8] uppercase bg-white shadow-[0_2px_10px_rgba(18,101,168,0.08)] border border-blue-50 rounded-full">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8]"></span>
                        </span>
                        Reservasi Online
                    </div>

                    <h2 class="text-3xl font-[900] tracking-tight bg-clip-text text-transparent bg-gradient-to-b from-gray-900 via-gray-800 to-gray-600">
                        Booking Lapangan
                    </h2>

                    <div class="flex justify-center items-center gap-3 mt-3">
                        <div class="h-[1px] w-8 bg-gradient-to-r from-transparent to-gray-200"></div>
                        <p class="text-[11px] text-gray-400 font-medium tracking-wide uppercase italic">
                            Secure Your Session
                        </p>
                        <div class="h-[1px] w-8 bg-gradient-to-l from-transparent to-gray-200"></div>
                    </div>
                    
                    <p class="mt-2 text-[11px] text-gray-400/80 leading-relaxed max-w-[250px] mx-auto">
                        Lengkapi formulir dengan benar untuk pengalaman olahraga terbaik.
                    </p>
                </div>

                <form action="#" method="POST" class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Nama Lengkap
                            </label>
                            
                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>

                                <input type="text" placeholder="Masukkan nama Anda" 
                                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm placeholder:text-gray-300 placeholder:font-light" required>
                            </div>
                        </div>

                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Nomor WhatsApp
                            </label>

                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>

                                <input type="number" placeholder="Contoh: 081234567xxx" 
                                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm placeholder:text-gray-300 placeholder:font-light" required>
                            </div>
                        </div>
                    </div>

                    <div class="group relative">
                        <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                            Fasilitas Olahraga
                        </label>

                        <div class="relative overflow-hidden rounded-2xl transition-all duration-300 shadow-sm group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                            <div class="absolute -right-4 -top-4 w-12 h-12 bg-gradient-to-br from-[#1265A8]/10 to-transparent rounded-full blur-2xl group-focus-within:bg-[#1265A8]/20 transition-all"></div>

                            <select class="w-full px-5 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] appearance-none bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 text-gray-700 font-medium outline-none text-sm cursor-pointer hover:bg-white/60" required>
                                <option value="" disabled selected>Pilih Lapangan Favoritmu</option>
                                <option value="tenis" class="py-2">🎾 &nbsp; Tennis Court</option>
                                <option value="voli" class="py-2">🏐 &nbsp; Volley Ball</option>
                                <option value="football" class="py-2">⚽ &nbsp; Football Field</option>
                                <option value="swimming" class="py-2">🏊 &nbsp; Swimming Pool</option>
                                <option value="badminton" class="py-2">🏸 &nbsp; Badminton</option>
                            </select>

                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <div class="p-1.5 rounded-xl bg-gray-50 text-gray-400 transition-all duration-500 group-focus-within:bg-[#1265A8] group-focus-within:text-white group-focus-within:rotate-180">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <p class="mt-2 ml-1 text-[10px] text-gray-400 transition-opacity duration-300 opacity-0 group-focus-within:opacity-100">
                            *Pilihan lapangan menentukan harga sewa per jam.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Tanggal Main
                            </label>
                            
                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>

                                <input type="date" 
                                    class="w-full pl-11 pr-4 py-3.5 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm text-gray-700 cursor-pointer hover:bg-white/60" required>
                            </div>
                        </div>

                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Sesi Waktu
                            </label>

                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>

                                <select class="w-full pl-11 pr-12 py-3.5 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] appearance-none bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 text-gray-700 font-medium outline-none text-sm cursor-pointer hover:bg-white/60" required>
                                    <option value="" disabled selected>Pilih Jam Main</option>
                                    <option>08:00 - 09:00</option>
                                    <option>09:00 - 10:00</option>
                                    <option>16:00 - 17:00</option>
                                    <option>19:00 - 20:00</option>
                                </select>

                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <div class="p-1 rounded-lg bg-gray-50 text-gray-400 transition-all duration-500 group-focus-within:bg-[#1265A8] group-focus-within:text-white group-focus-within:rotate-180">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 pt-6">
                        <a href="/" 
                            id="btn-batal"
                            class="group flex-1 inline-flex items-center justify-center gap-2 py-4 px-6 bg-slate-50 text-slate-400 font-bold rounded-2xl hover:bg-red-50 hover:text-red-500 transition-all duration-300 active:scale-[0.98] text-[13px] tracking-[0.15em] uppercase border border-transparent hover:border-red-100 decoration-none relative overflow-hidden">
                            
                            <div id="loader-batal" class="absolute inset-0 flex items-center justify-center bg-red-50 opacity-0 invisible transition-all duration-300">
                                <svg class="animate-spin h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>

                            <div id="text-batal" class="flex items-center gap-2 transition-all duration-300">
                                <svg class="w-4 h-4 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Batal</span>
                            </div>
                        </a>
                        <button type="submit" 
                            id="btn-booking"
                            class="group flex-[2.5] relative overflow-hidden inline-flex items-center justify-center gap-3 py-4 px-6 bg-[#1265A8] text-white font-extrabold rounded-2xl shadow-[0_10px_25px_-5px_rgba(18,101,168,0.4)] hover:shadow-[0_15px_30px_-5px_rgba(18,101,168,0.5)] hover:-translate-y-1 transition-all duration-300 active:scale-[0.98] text-[13px] tracking-[0.2em] uppercase cursor-pointer decoration-none">
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_infinite]"></div>
                            
                            <span>Lanjut Booking</span>
                            
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            
            <p class="text-center mt-6 text-gray-400 text-[12px] tracking-wide uppercase font-medium">
                Butuh Bantuan? <a href="/#contact" class="text-[#1265A8] font-bold hover:underline transition-all underline-offset-4">Hubungi Kami</a>
            </p>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.getElementById('btn-batal').addEventListener('click', function(e) {
        e.preventDefault();
        const btn = this;
        const targetUrl = btn.getAttribute('href');
        const loader = document.getElementById('loader-batal');
        const content = document.getElementById('text-batal');

        Swal.fire({
            title: 'Konfirmasi',
            text: "Anda yakin membatalkannya?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444', 
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Batal!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                content.classList.add('opacity-0', 'scale-90');
                loader.classList.remove('invisible', 'opacity-0');
                btn.classList.add('pointer-events-none');
                
                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 800);
            }
        });
    });

    // Logika Booking 
    const bookingForm = document.querySelector('form');

    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault(); 

        Swal.fire({
            title: 'Verifikasi Data',
            text: "Apakah data booking Anda sudah benar?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1d6fa5', 
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Sudah Benar',
            cancelButtonText: 'Cek Kembali',
            reverseButtons: true 
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan Loading
                Swal.fire({
                    title: 'Sedang Memproses...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulasi proses
                setTimeout(() => {
                    // Notifikasi Sukses 
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Reservasi Anda telah berhasil dicatat.',
                        icon: 'success',
                        iconColor: '#22c55e',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    }).then(() => {
                        window.location.href = "/"; 
                    });
                }, 1500);
            }
        });
    });
</script>
