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

        .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
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
                                Data Lapangan
                            </span>
                            
                            <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest animate-pulse">
                                Live
                            </span>
                        </h2>
                        
                        <p class="mt-1 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Selamat datang di <span class="text-slate-600 font-semibold mx-1">manajemen data lapangan</span>.
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

        <section>
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-lg font-bold text-slate-700">Daftar Lapangan</h3>
                    <p class="text-sm text-slate-500">Total 6 Lapangan tersedia</p>
                </div>
                <a href="/admin/dashboard/create/createLapangan" 
                    id="btnTambah"
                    class="group relative inline-flex items-center gap-2 px-6 py-3 bg-[#1265A8] text-white rounded-xl font-semibold text-sm overflow-hidden transition-all duration-300 hover:bg-[#0d4d82] hover:ring-4 hover:ring-blue-100 shadow-lg active:scale-95">
                    
                    <svg id="spinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <svg id="iconPlus" class="w-5 h-5 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    
                    <span id="btnText">Tambah Lapangan</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    
                {{-- Tenis --}}
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-52 overflow-hidden">
                        <img src="/image/pictures/tenis-boe.svg" 
                            alt="Tennis Court" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-700 shadow-sm uppercase">
                                Outdoor
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-[#1265A8] transition-colors">
                                Tennis Court
                            </h4>
                            <p class="text-xs uppercase tracking-[0.15em] text-slate-500 font-medium mt-1">
                                BOE-Sport space
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-50">
                            <button onclick="confirmDelete(this)" class="p-3 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 active:scale-90" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <a href="/admin/dashboard/edit/editDataLapangan" class="btn-edit inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:border-[#1265A8] hover:text-[#1265A8] transition-all duration-300 active:scale-90 font-medium text-sm min-w-[110px]" title="Edit">
                                
                                <span class="button-content flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </span>

                                <span class="loading-spinner hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#1265A8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Voli --}}
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-52 overflow-hidden">
                        <img src="/image/pictures/voli-boe.svg" 
                             alt="Voli Arena" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-700 shadow-sm uppercase">
                                Outdoor
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-[#1265A8] transition-colors">
                                Voli Arena
                            </h4>
                            <p class="text-xs uppercase tracking-[0.15em] text-slate-500 font-medium mt-1">
                                BOE-Sport space
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-50">
                            <button onclick="confirmDelete(this)" class="p-3 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 active:scale-90" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <a href="/admin/dashboard/edit/editDataLapangan" class="btn-edit inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:border-[#1265A8] hover:text-[#1265A8] transition-all duration-300 active:scale-90 font-medium text-sm min-w-[110px]" title="Edit">
                                
                                <span class="button-content flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </span>

                                <span class="loading-spinner hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#1265A8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Football --}}
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-52 overflow-hidden">
                        <img src="/image/pictures/football.png" 
                            alt="Football Stadium" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-700 shadow-sm uppercase">
                                Outdoor
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-[#1265A8] transition-colors">
                                Football Stadium
                            </h4>
                            <p class="text-xs uppercase tracking-[0.15em] text-slate-500 font-medium mt-1">
                                BOE-Sport space
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-50">
                            <button onclick="confirmDelete(this)" class="p-3 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 active:scale-90" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <a href="/admin/dashboard/edit/editDataLapangan" class="btn-edit inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:border-[#1265A8] hover:text-[#1265A8] transition-all duration-300 active:scale-90 font-medium text-sm min-w-[110px]" title="Edit">
                                
                                <span class="button-content flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </span>

                                <span class="loading-spinner hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#1265A8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Swimming --}}
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-52 overflow-hidden">
                        <img src="/image/pictures/kolamRenang.svg" 
                             alt="Swimming Pool" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-700 shadow-sm uppercase">
                                Outdoor
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-[#1265A8] transition-colors">
                                Swimming Pool 
                            </h4>
                            <p class="text-xs uppercase tracking-[0.15em] text-slate-500 font-medium mt-1">
                                BOE-Sport space
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-50">
                            <button onclick="confirmDelete(this)" class="p-3 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 active:scale-90" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <a href="/admin/dashboard/edit/editDataLapangan" class="btn-edit inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:border-[#1265A8] hover:text-[#1265A8] transition-all duration-300 active:scale-90 font-medium text-sm min-w-[110px]" title="Edit">
                                
                                <span class="button-content flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </span>

                                <span class="loading-spinner hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#1265A8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Badminton --}}
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-52 overflow-hidden">
                        <img src="/image/pictures/bulutangkis.png" 
                             alt="Badminton Court" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-700 shadow-sm uppercase">
                                Indoor
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6 group">
                            <h4 class="text-lg font-bold text-slate-800 mb-0 group-hover:text-[#1265A8] transition-colors">
                                Badminton Court
                            </h4>
                            <p class="text-xs uppercase tracking-[0.15em] text-slate-500 font-medium mt-1">
                                BOE-Sport space
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-50">
                            <button onclick="confirmDelete(this)" class="p-3 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 active:scale-90" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            <a href="/admin/dashboard/edit/editDataLapangan" class="btn-edit inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 text-slate-600 hover:border-[#1265A8] hover:text-[#1265A8] transition-all duration-300 active:scale-90 font-medium text-sm min-w-[110px]" title="Edit">
                                
                                <span class="button-content flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </span>

                                <span class="loading-spinner hidden">
                                    <svg class="animate-spin h-5 w-5 text-[#1265A8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
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
        function confirmDelete(button) {
            const card = button.closest('.group');
            const title = card.querySelector('h4').innerText;

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: `Data lapangan "${title}" akan dihapus permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444', 
                cancelButtonColor: '#64748B', 
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true, 
                borderRadius: '1.5rem',
                customClass: {
                    popup: 'rounded-[2rem] font-sans',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulasi penghapusan (Jika sudah pakai backend, ganti dengan logic Form Submit atau Fetch API)
                    card.classList.add('scale-95', 'opacity-0');
                    
                    setTimeout(() => {
                        card.remove();
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data lapangan berhasil dibersihkan.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                            borderRadius: '1.5rem'
                        });
                    }, 500);
                }
            })
        }

        document.getElementById('btnTambah').addEventListener('click', function(e) {
            const btn = this;
            const icon = document.getElementById('iconPlus');
            const spinner = document.getElementById('spinner');
            const text = document.getElementById('btnText');

            // efek ripple
            const ripple = document.createElement('span');
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.classList.add('ripple');
            
            btn.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);

            // efek loading
            e.preventDefault(); 
            const targetUrl = btn.getAttribute('href');

            icon.classList.add('hidden');
            spinner.classList.remove('hidden');
            text.innerText = 'Memuat...';
            btn.classList.add('opacity-80', 'cursor-wait');

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 500); 
        });

        // Ambil semua elemen dengan class btn-edit
        const editButtons = document.querySelectorAll('.btn-edit');

        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Stop pindah halaman instan
                
                const targetUrl = this.getAttribute('href');
                const content = this.querySelector('.button-content');
                const spinner = this.querySelector('.loading-spinner');

                // Tampilkan loading
                content.classList.add('hidden');
                spinner.classList.remove('hidden');
                this.classList.add('opacity-70', 'cursor-wait');

                // Simulasi delay sedikit agar user melihat animasi loading (500ms)
                // Setelah itu baru pindah halaman
                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 600);
            });
        });

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