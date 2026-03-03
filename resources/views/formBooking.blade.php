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
        
            <div class="w-full max-w-2xl mt-12 animate-fade-in-up"> 
                
                <div class="bg-white/80 backdrop-blur-xl p-10 rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-white/40 transition-all duration-500 hover:shadow-[0_30px_60px_rgba(0,0,0,0.08)]">
                    
                    <div class="mb-10 text-center relative">
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-40 h-40 bg-blue-100/30 blur-3xl rounded-full -z-10"></div>
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 mb-4 text-[10px] font-bold tracking-[0.2em] text-[#1265A8] uppercase bg-white shadow-sm border border-blue-50 rounded-full">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8]"></span>
                            </span>
                            Reservasi Online
                        </div>
                        <h2 class="text-4xl font-[900] tracking-tight bg-clip-text text-transparent bg-gradient-to-b from-gray-900 via-gray-800 to-gray-600">
                            Booking Lapangan
                        </h2>
                        <p class="mt-3 text-sm text-gray-400 font-medium italic">Secure Your Session</p>
                    </div>

                    <form action="{{route('formBooking') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Nama Lengkap
                            </label>
                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" 
                                    class="w-full pl-12 pr-4 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm placeholder:text-gray-300" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group relative">
                                <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                    Nomor WhatsApp
                                </label>
                                <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input type="number" name="no_hp" placeholder="081234xxx" 
                                        class="w-full pl-12 pr-4 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm placeholder:text-gray-300" required>
                                </div>
                            </div>

                            <div class="group relative">
                                <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                    Alamat Email
                                </label>
                                <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-gray-400 transition-colors group-focus-within:text-[#1265A8]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" placeholder="nama@email.com" 
                                        class="w-full pl-12 pr-4 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm placeholder:text-gray-300" required>
                                </div>
                            </div>
                        </div>

                        <div class="group relative">
                            <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                Pilih Fasilitas
                            </label>
                            <div class="relative overflow-hidden rounded-2xl shadow-sm transition-all duration-300 group-focus-within:shadow-[0_8px_30px_rgb(18,101,168,0.12)]">
                                <select name="nama_lapangan" class="w-full px-6 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] appearance-none bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 text-sm cursor-pointer outline-none" required>
                                    <option value="" disabled selected>Pilih Lapangan</option>
                                        @foreach($lapangan as $lap)
                                            <option value="{{ $lap->id_lap }}">
                                                {{ $lap->nama_lapangan }}
                                            </option>
                                        @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group relative">
                                <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                    Tanggal Main
                                </label>
                                <input type="date" name="tanggal" class="w-full px-6 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 outline-none text-sm cursor-pointer" required>
                            </div>

                            <div class="group relative">
                                <label class="inline-flex items-center px-2 py-0.5 mb-2 ml-1 text-[9px] font-bold text-[#1265A8] uppercase tracking-[0.15em] bg-blue-50/50 rounded-md border border-blue-100 transition-all duration-300 group-focus-within:bg-[#1265A8] group-focus-within:text-white">
                                    Sesi Waktu
                                </label>
                                <select id="sesiWaktu" name="sesi_waktu" class="w-full px-6 py-4 rounded-2xl border-none ring-1 ring-gray-200 focus:ring-2 focus:ring-[#1265A8] appearance-none bg-white/40 backdrop-blur-md focus:bg-white transition-all duration-500 text-sm cursor-pointer outline-none" required>
                                   <option value="" disabled selected>Pilih Jam</option>
                                    <option value="08:00 - 09:00">08:00 - 09:00</option>
                                    <option value="09:00 - 10:00">09:00 - 10:00</option>
                                    <option value="10:00 - 11:00">10:00 - 11:00</option>
                                    <option value="11:00 - 12:00">11:00 - 12:00</option>
                                    <option value="13:00 - 14:00">13:00 - 14:00</option>
                                    <option value="14:00 - 15:00">14:00 - 15:00</option>
                                    <option value="15:00 - 16:00">15:00 - 16:00</option>
                                    <option value="17:00 - 18:00">17:00 - 18:00</option>
                                    <option value="18:00 - 19:00">18:00 - 19:00</option>
                                    <option value="19:00 - 20:00">19:00 - 20:00</option>
                                    <option value="20:00 - 21:00">20:00 - 21:00</option>
                                    <option value="21:00 - 22:00">21:00 - 22:00</option>
                                    <option value="23:00 - 24:00">23:00 - 24:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                            <a href="/" id="btn-batal" class="w-full sm:flex-1 inline-flex items-center justify-center gap-2 py-4 px-6 bg-slate-50 text-slate-400 font-bold rounded-2xl hover:bg-red-50 hover:text-red-500 transition-all duration-300 text-[12px] tracking-widest uppercase border border-transparent hover:border-red-100 relative overflow-hidden group">
                                <div id="loader-batal" class="absolute inset-0 flex items-center justify-center bg-red-50 opacity-0 invisible transition-all">
                                    <svg class="animate-spin h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                </div>
                                <span id="text-batal">Batal</span>
                            </a>
                            
                            <button type="submit" id="btn-booking" class="w-full sm:flex-[2] relative overflow-hidden inline-flex items-center justify-center gap-3 py-4 px-6 bg-[#1265A8] text-white font-extrabold rounded-2xl shadow-lg hover:shadow-[#1265A8]/30 hover:-translate-y-1 transition-all duration-300 text-[12px] tracking-widest uppercase">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_infinite]"></div>
                                <span>Lanjut Booking</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-6 text-gray-400 text-[12px] tracking-wide uppercase font-medium">
                Butuh Bantuan? <a href="/#contact" class="text-[#1265A8] font-bold hover:underline transition-all underline-offset-4">Hubungi Kami</a>
            </p>
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

      // ELEMENT
const tanggalInput = document.querySelector('input[name="tanggal"]');
const lapanganSelect = document.querySelector('select[name="nama_lapangan"]');
const sesiSelect = document.getElementById('sesiWaktu');

const semuaSesi = [
    "08:00 - 09:00",
    "09:00 - 10:00",
    "10:00 - 11:00",
    "11:00 - 12:00",
    "13:00 - 14:00",
    "14:00 - 15:00",
    "15:00 - 16:00",
    "17:00 - 18:00",
    "18:00 - 19:00",
    "19:00 - 20:00",
    "20:00 - 21:00",
    "21:00 - 22:00",
    "23:00 - 24:00",
];

// Fungsi ambil booking yang sudah ada
async function cekSesi() {
    const tanggal = tanggalInput.value;
    const lapanganId = lapanganSelect.value;

    if (!tanggal || !lapanganId) return;

    try {
        const res = await fetch(`/booking/sesi-terpakai?lapangan_id=${lapanganId}&tanggal=${tanggal}`);
        const terpakai = await res.json();

        // Kosongkan select dulu
        sesiSelect.innerHTML = '<option value="" disabled selected>Pilih Jam</option>';

        // Loop semua sesi
        semuaSesi.forEach(sesi => {
            const option = document.createElement('option');
            option.value = sesi;
            option.textContent = sesi;

            if (terpakai.includes(sesi)) {
                option.disabled = true;
                option.style.backgroundColor = "#e5e7eb";
                option.textContent = sesi + " (Sudah Terpakai)";
            }

            sesiSelect.appendChild(option);
        });

    } catch (err) {
        console.error(err);
    }
}
// Event listener untuk cek sesi ketika tanggal atau lapangan berubah
tanggalInput.addEventListener('change', cekSesi);
lapanganSelect.addEventListener('change', cekSesi);

// SUBMIT FORM
const bookingForm = document.querySelector('form');

bookingForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Cek sesi valid
    const selectedOption = sesiSelect.selectedOptions[0];
    if (!selectedOption || selectedOption.disabled) {
        Swal.fire({
            title: 'Sesi Tidak Valid!',
            text: 'Sesi yang dipilih sudah dibooking, silakan pilih sesi lain.',
            icon: 'warning',
            confirmButtonText: 'Oke'
        });
        return; // hentikan submit
    }

    // Konfirmasi user sebelum booking
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
            const formData = new FormData(bookingForm);

            fetch(bookingForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json().catch(() => null);
                if (!response.ok) {
                    Swal.fire({
                        title: 'Gagal Booking!',
                        text: data?.message || 'Terjadi error, silakan coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'Tutup'
                    });
                    throw new Error('Booking gagal');
                }
                return data;
            })
            .then(data => {
                Swal.fire({
                    title: 'Booking Berhasil!',
                    html: `Booking untuk <strong>${data.booking.penyewa.nama}</strong> berhasil.<br>Mohon tunggu konfirmasi via email.`,
                    icon: 'success',
                    confirmButtonText: 'Oke'
                }).then(() => window.location.href = '/');
            })
            .catch(error => console.error(error));
        }
    });
});

    </script>
