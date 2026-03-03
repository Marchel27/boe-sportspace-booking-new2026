<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <title>BOE-Sport Space | Add Lapangan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(10px); 
            }

            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        @keyframes shining {
            0% { 
                transform: translateX(-100%); 
            }

            100% { 
                transform: translateX(100%); 
            }
        }
        
        .swal2-shown {
            padding-right: 0 !important;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] font-sans antialiased text-slate-800">
    <div class="fixed top-0 left-0 w-full h-full -z-10 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-100 blur-[120px] rounded-full opacity-50"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-indigo-100 blur-[120px] rounded-full opacity-50"></div>
    </div>

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex justify-center items-center">
        <div class="w-full max-w-5xl bg-white/80 backdrop-blur-xl rounded-[3rem] shadow-[0_32px_64px_-15px_rgba(0,0,0,0.08)] border border-white overflow-hidden transition-all duration-500 hover:shadow-blue-200/40">
            
            <div class="pt-10 pb-6 px-10 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 mb-4 bg-blue-50/50 rounded-full border border-blue-100 shadow-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1d6fa5]"></span>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-[#1d6fa5]">
                        Management Portal
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight uppercase">
                    Add <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1d6fa5] to-blue-400">Venue</span> Data
                </h2>
                <div class="h-1 w-12 bg-gradient-to-r from-[#1d6fa5] to-blue-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <form action="{{ route('lapangan.store') }}" method="POST" enctype="multipart/form-data" class="p-8 lg:p-12 pt-4">
                    @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    
                    <div class="lg:col-span-7 space-y-8">
                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 transition-colors group-focus-within:text-[#1d6fa5]">Nama Fasilitas</label>
                                <input name="nama_lapangan" type="text" placeholder="Enter venue name..." 
                                    class="w-full px-6 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-[#1d6fa5] outline-none transition-all duration-300 shadow-sm" required>
                            </div>

                            <div class="group">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1 transition-colors group-focus-within:text-[#1d6fa5]">Deskripsi Fasilitas</label>
                                <textarea name="deskripsi" rows="4" placeholder="Describe the premium features..." 
                                    class="w-full px-6 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-[#1d6fa5] outline-none transition-all duration-300 shadow-sm resize-none" required></textarea>
                            </div>
                        </div>

                        <div class="relative group max-w-md">
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Main Thumbnail</label>
                            
                            <div id="dropzone" class="relative overflow-hidden rounded-[2.5rem] border-2 border-dashed border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1d6fa5] transition-all duration-500 h-72 flex flex-col items-center justify-center group/drop">
                                
                                <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden z-0" src="" />

                                <div id="ui-content" class="relative z-10 flex flex-col items-center justify-center pointer-events-none">
                                    <div class="p-5 bg-white rounded-3xl shadow-lg mb-4 transform group-hover/drop:scale-110 group-hover/drop:rotate-6 transition-all duration-500">
                                        <svg class="w-8 h-8 text-[#1d6fa5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-bold text-slate-500 text-center">Drop image or <span class="text-[#1d6fa5] underline">browse</span></p>
                                    <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-tighter font-semibold">Max size 2MB (JPG, PNG)</p>
                                </div>

                                <input name="thumbnail" type="file" id="fileInput" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-20" required>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 space-y-8">
                        <div class="bg-slate-50/80 p-6 rounded-[2rem] border border-slate-100 space-y-5">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Harga / Sesi</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-1/2 -translate-y-1/2 font-black text-[#1d6fa5]">Rp</span>
                                    <input name="harga" type="number" class="w-full pl-12 pr-6 py-4 rounded-xl border-none focus:ring-2 focus:ring-[#1d6fa5] shadow-sm font-bold" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Kategori</label>
                                        <select name="kategori" class="w-full px-4 py-4 rounded-xl border-none focus:ring-2 focus:ring-[#1d6fa5] shadow-sm font-bold text-sm appearance-none bg-white" required>
                                        <option value="Futsal">Futsal</option>
                                        <option value="Badminton">Badminton</option>
                                        <option value="Voli">Voli</option>
                                        <option value="Renang">Renang</option>
                                        <option value="Tennis">Tennis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                Gallery Preview
                            </label>
                            
                            <div class="grid grid-cols-3 gap-4">
                                @for ($i = 1; $i <= 3; $i++)
                                <div class="gallery-container aspect-square rounded-2xl border-2 border-dashed border-slate-200 bg-white hover:border-[#1d6fa5] transition-all flex items-center justify-center relative group cursor-pointer overflow-hidden">
                                    
                                    <img class="preview-target absolute inset-0 w-full h-full object-cover hidden z-0" src="" />
                                    
                                    <div class="ui-wrapper flex flex-col items-center justify-center pointer-events-none z-10">
                                        <span class="text-slate-300 group-hover:text-[#1d6fa5] font-black text-xl transition-colors">+</span>
                                    </div>
                                    
                                    <input type="file" 
                                        name="gallery[]" 
                                        accept="image/*"
                                        class="gallery-input absolute inset-0 opacity-0 cursor-pointer z-20"
                                        required>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row-reverse gap-4 pt-6 mt-4 border-t border-slate-100/50">
                            <button type="submit" id="btnSimpan"
                                class="group relative w-full sm:w-2/3 overflow-hidden rounded-2xl bg-[#1d6fa5] px-8 py-5 transition-all duration-300 hover:bg-slate-800 hover:shadow-[0_20px_40px_-12px_rgba(29,111,165,0.35)] active:scale-[0.98]">
                                
                                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent transition-transform duration-500 group-hover:translate-x-full"></div>
                                
                                <div class="relative flex items-center justify-center gap-3">
                                    <svg id="spinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>

                                    <span id="btnText" class="text-sm font-black uppercase tracking-[0.2em] text-white">Simpan Data</span>
                                    
                                    <svg id="btnIcon" class="h-5 w-5 text-blue-400 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </button>

                            <div class="w-full sm:w-1/3 relative">
                                <button type="button" id="btn-batal-venue"
                                    class="group w-full flex items-center justify-center gap-2 py-5 px-8 rounded-2xl border-2 border-slate-100 bg-white transition-all duration-300 hover:border-red-100 hover:bg-red-50 active:scale-[0.98] relative overflow-hidden cursor-pointer">
                                    
                                    {{-- Loader --}}
                                    <div id="loader-batal-venue" class="absolute inset-0 flex items-center justify-center bg-red-50 opacity-0 invisible transition-all duration-300">
                                        <svg class="animate-spin h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </div>

                                    <div id="text-batal-venue" class="flex items-center gap-2 transition-all duration-300">
                                        <span class="text-xs font-black uppercase tracking-widest text-slate-400 group-hover:text-red-500">Batal</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="loadingOverlay" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-slate-50/60 backdrop-blur-sm transition-all duration-500">
        <div class="flex flex-col items-center">
            <div class="relative w-16 h-16 mb-8">
                <div class="absolute inset-0 border-4 border-slate-200 rounded-full"></div>
                <div class="absolute inset-0 border-4 border-[#1d6fa5] border-t-transparent rounded-full animate-spin"></div>
            </div>

            <div class="text-center">
                <h3 id="loadingStatus" class="text-lg font-medium text-slate-800 tracking-tight transition-all duration-300">
                    Memproses data
                </h3>
                <div class="flex justify-center gap-1 mt-2">
                    <span class="w-1.5 h-1.5 bg-[#1d6fa5] rounded-full animate-bounce [animation-delay:-0.3s]"></span>
                    <span class="w-1.5 h-1.5 bg-[#1d6fa5] rounded-full animate-bounce [animation-delay:-0.15s]"></span>
                    <span class="w-1.5 h-1.5 bg-[#1d6fa5] rounded-full animate-bounce"></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnSimpan = document.getElementById('btnSimpan');
            const btnText = document.getElementById('btnText');
            const btnIcon = document.getElementById('btnIcon');
            const spinner = document.getElementById('spinner');
            const btnBatal = document.getElementById('btnBatal');
            const btnBatalTidak = document.getElementById('btnBatalTidak');
            const confirmMenu = document.getElementById('confirmMenu');
            const fileInput = document.getElementById('fileInput');
            const preview = document.getElementById('preview');
            const uiContent = document.getElementById('ui-content');

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        uiContent.classList.add('opacity-0'); 
                    }
                    reader.readAsDataURL(file);
                }
            });

            // logika preview
            document.querySelectorAll('.gallery-input').forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const container = this.closest('.gallery-container');
                    const preview = container.querySelector('.preview-target');
                    const ui = container.querySelector('.ui-wrapper');

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            preview.src = event.target.result;
                            preview.classList.remove('hidden');
                            ui.classList.add('opacity-0');
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });

            // logika simpan data

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Simpan Data?',
                    text: "Pastikan semua informasi venue sudah benar.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#1d6fa5',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // ← langsung submit normal
                    }
                });
            });

            // memproses loading dan sukses
            function eksekusiSimpanData() {
                const overlay = document.getElementById('loadingOverlay');
                const statusText = document.getElementById('loadingStatus');
                
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');

                const sequences = [
                    "Memvalidasi input...",
                    "Mengamankan koneksi...",
                    "Menyimpan perubahan..."
                ];

                let step = 0;
                const interval = setInterval(() => {
                    if (step < sequences.length) {
                        statusText.classList.add('opacity-0', 'translate-y-2');
                        
                        setTimeout(() => {
                            statusText.innerText = sequences[step];
                            statusText.classList.remove('opacity-0', 'translate-y-2');
                            step++;
                        }, 300);
                    }
                }, 800);

                // selesai
                setTimeout(() => {
                    clearInterval(interval);
                    overlay.classList.add('opacity-0');
                    
                    setTimeout(() => {
                        overlay.classList.add('hidden');
                        overlay.classList.remove('flex', 'opacity-0');

                        Swal.fire({
                            title: 'Berhasil Disimpan',
                            text: 'Data venue telah diperbarui.',
                            icon: 'success',
                            iconColor: '#22c55e', 
                            showConfirmButton: false,
                            timer: 2000, 
                            customClass: {
                                popup: 'rounded-3xl border-none shadow-xl',
                            }
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer || result.isConfirmed || true) {
                                // Efek Fade Out Body
                                document.body.style.transition = "opacity 0.5s ease"; 
                                document.body.style.opacity = '0';
                                
                                setTimeout(() => {
                                    window.history.back();
                                }, 500);
                            }
                        });
                    }, 500);
                }, 3000);
            }

            // logika konfirmasi batal
            btnBatal.addEventListener('click', () => {
                btnBatal.classList.add('hidden');
                confirmMenu.classList.remove('hidden');
                confirmMenu.classList.add('flex');
            });

            btnBatalTidak.addEventListener('click', () => {
                confirmMenu.classList.add('hidden');
                confirmMenu.classList.remove('flex');
                btnBatal.classList.remove('hidden');
            });
        });

        const btnBatalVenue = document.getElementById('btn-batal-venue');
        const loaderBatal = document.getElementById('loader-batal-venue');
        const textBatal = document.getElementById('text-batal-venue');

        if (btnBatalVenue) {
            btnBatalVenue.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Batalkan Pengisian?',
                    text: "Data yang sudah diisi tidak akan tersimpan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444', 
                    cancelButtonColor: '#94a3b8', 
                    confirmButtonText: 'Ya, Batalkan',
                    cancelButtonText: 'Kembali',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-[2rem]',
                        confirmButton: 'rounded-xl',
                        cancelButton: 'rounded-xl'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Tampilkan loader di dalam tombol
                        textBatal.classList.add('opacity-0', 'scale-95');
                        loaderBatal.classList.remove('invisible', 'opacity-0');
                        btnBatalVenue.classList.add('pointer-events-none');

                        // Redirect ke halaman daftar lapangan
                        setTimeout(() => {
                            // Gunakan URL statis agar lebih aman jika referrer kosong
                            window.location.href = '/admin/dashboard/dataLapangan';
                        }, 600);
                    }
                });
            });
        }
    </script>
</body>
</html>