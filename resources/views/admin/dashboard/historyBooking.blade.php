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
            0% { transform: translateX(-150%) skewX(-12deg); }
            100% { transform: translateX(250%) skewX(-12deg); }
        }

        .animate-shimmer {
            animation: shimmer 1.5s infinite;
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
                                History Booking
                            </span>
                            
                            <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest animate-pulse">
                                Live
                            </span>
                        </h2>
                        
                        <p class="mt-1 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Selamat datang di <span class="text-slate-600 font-semibold mx-1">riwayat booking</span>.
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

        <section class="mb-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div class="relative group">
                <label for="selectAll" class="flex items-center gap-3 bg-white/80 backdrop-blur-md px-5 py-3 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-300 cursor-pointer active:scale-95 select-none group-hover:bg-white">
                    
                    <div class="relative flex items-center justify-center">
                        <input type="checkbox" id="selectAll" class="peer appearance-none w-6 h-6 rounded-lg border-2 border-slate-200 checked:bg-[#1265A8] checked:border-[#1265A8] transition-all duration-300 cursor-pointer">
                        
                        <svg class="absolute w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-xs font-black text-slate-800 tracking-tight group-hover:text-[#1265A8] transition-colors">Pilih Semua</span>
                        <span id="checkSubtitle" class="text-[10px] text-slate-400 font-medium">Kelola riwayat masal</span>
                    </div>

                    <div id="selectionBadge" class="hidden ml-2 px-2 py-0.5 bg-blue-50 text-[#1265A8] text-[9px] font-bold rounded-md border border-blue-100 animate-bounce">
                        AKTIF
                    </div>
                </label>
            </div>
            
            <div id="bulkActions" class="hidden opacity-0 scale-95 transition-all duration-300">
                <button onclick="confirmBulkDelete()" 
                    class="group relative px-6 py-2.5 bg-white text-red-600 rounded-xl border-2 border-red-100 font-bold text-xs hover:bg-red-600 hover:text-white hover:border-red-600 hover:shadow-[0_10px_20px_-10px_rgba(220,38,38,0.5)] transition-all duration-300 flex items-center gap-2 overflow-hidden active:scale-95">
                    
                    <div class="absolute inset-0 w-1/4 h-full bg-white/20 -skew-x-12 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>

                    <svg class="w-4 h-4 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    
                    <span>Hapus <span id="selectedCount" class="bg-red-100 text-red-600 px-1.5 py-0.5 rounded-md mx-1 group-hover:bg-white/20 group-hover:text-white transition-colors">0</span> Data Terpilih</span>
                </button>
            </div>
        </section>

        <section class="mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- 1 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">24 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Tennis BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1001</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">09.00 - 11.30</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">25 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Voli BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1002</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">11.30 - 14.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">26 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Football BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1003</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">07.30 - 09.30</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">27 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Swimming BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1004</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">08.00 - 12.30</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">28 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Badminton BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1005</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">15.00 - 17.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- 6 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 transition-all duration-500 hover:-translate-y-2 flex flex-col relative overflow-hidden">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <button class="group/status flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-[#1265A8] rounded-full text-[10px] font-bold uppercase tracking-wider border border-blue-100 hover:bg-[#1265A8] hover:text-white transition-all duration-300 active:scale-95">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 group-hover/status:bg-white"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#1265A8] group-hover/status:bg-white"></span>
                                </span>
                                Selesai
                            </button>
                            <span class="text-[9px] text-slate-400 font-medium italic">29 Jan 2026</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Voli BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">ID Transaksi: #BOE-1006</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                                    <span class="text-xs font-extrabold text-slate-700">09.00 - 13.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-100 group-hover:bg-white transition-colors">
                            <input type="checkbox" class="item-checkbox w-5 h-5 rounded border-slate-300 text-[#1265A8] focus:ring-[#1265A8] transition-all cursor-pointer">
                        </div>

                        <button onclick="confirmDelete(this)" class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm border border-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailBooking" 
                        id="btn-invoice"
                        onclick="handleInvoiceClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-slate-800 text-white rounded-xl font-bold text-sm shadow-lg hover:bg-slate-900 transition-all active:scale-95">
                            
                            <div id="btn-content" class="flex items-center gap-2">
                                <span id="text-btn" class="hidden sm:inline">Detail Booking</span>
                            </div>
                        </a>
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
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const bulkActions = document.getElementById('bulkActions');
        const subtitle = document.getElementById('checkSubtitle');
        const badge = document.getElementById('selectionBadge');
        const countBadge = document.getElementById('selectedCount');

        // Logika Select All 
        selectAll.addEventListener('change', function() {
            const isChecked = this.checked;
            
            // Label Pilih Semua
            if (isChecked) {
                subtitle.innerText = "Semua data terpilih";
                subtitle.classList.replace('text-slate-400', 'text-blue-500');
                badge.classList.remove('hidden');
            } else {
                subtitle.innerText = "Kelola riwayat masal";
                subtitle.classList.replace('text-blue-500', 'text-slate-400');
                badge.classList.add('hidden');
            }

            checkboxes.forEach(cb => {
                cb.checked = isChecked;
                updateRowStyle(cb);
            });
            
            toggleBulkActions();
        });

        // Logika Checkbox 
        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                updateRowStyle(cb);
                toggleBulkActions();
                
                // Auto uncheck "Select All" jika salah satu item tidak dicentang
                if (!cb.checked) {
                    selectAll.checked = false;
                    subtitle.innerText = "Kelola riwayat masal";
                    subtitle.classList.replace('text-blue-500', 'text-slate-400');
                    badge.classList.add('hidden');
                }
            });
        });

        // Style Baris/Card
        function updateRowStyle(cb) {
            if(cb.checked) {
                cb.parentElement.classList.add('bg-blue-50', 'border-blue-200');
            } else {
                cb.parentElement.classList.remove('bg-blue-50', 'border-blue-200');
            }
        }

        // Tampilkan atau Sembunyikan Bulk Actions
        function toggleBulkActions() {
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            const count = checkedBoxes.length;
            
            if (count > 0) {
                countBadge.innerText = count;
                bulkActions.classList.remove('hidden', 'opacity-0', 'scale-95');
                bulkActions.classList.add('flex', 'opacity-100', 'scale-100');
            } else {
                bulkActions.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    if (Array.from(checkboxes).filter(cb => cb.checked).length === 0) {
                        bulkActions.classList.remove('flex');
                        bulkActions.classList.add('hidden');
                    }
                }, 300);
            }
        }

        // Konfirmasi Hapus Massal 
        function confirmBulkDelete() {
            // Mencari semua checkbox yang sedang dicentang
            const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
            const count = checkedBoxes.length;
            
            if (count === 0) return; // Guard clause jika tidak ada yang terpilih

            Swal.fire({
                title: `Hapus ${count} Riwayat?`,
                text: "Semua data yang dipilih akan dihapus permanen dari tampilan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus Semua',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    checkedBoxes.forEach((cb, index) => {
                        const card = cb.closest('.group'); // Mencari container card
                        
                        setTimeout(() => {
                            card.style.transform = 'scale(0.8) translateY(20px)';
                            card.style.opacity = '0';
                            card.style.transition = 'all 0.4s ease';
                            
                            // Hapus elemen dari DOM setelah animasi selesai
                            setTimeout(() => {
                                card.remove();
                                // Update status Bulk Action & Select All setelah penghapusan
                                if (index === checkedBoxes.length - 1) {
                                    toggleBulkActions();
                                    selectAll.checked = false;
                                    subtitle.innerText = "Kelola riwayat masal";
                                    subtitle.classList.replace('text-blue-500', 'text-slate-400');
                                    badge.classList.add('hidden');
                                }
                            }, 400);
                        }, index * 100); 
                    });

                    // Tampilkan pesan sukses
                    Swal.fire({
                        title: 'Berhasil!',
                        text: `${count} data telah dibersihkan.`,
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        customClass: { popup: 'rounded-[2rem]' }
                    });
                }
            });
        }

        function confirmDelete(btn) {
            btn.classList.add('animate-bounce');
            setTimeout(() => btn.classList.remove('animate-bounce'), 500);

            Swal.fire({
                title: 'Hapus Riwayat?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444', 
                cancelButtonColor: '#64748b', 
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInUp animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                },
                customClass: {
                    popup: 'rounded-[2.5rem] p-8',
                    confirmButton: 'rounded-2xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-2xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const card = btn.closest('.group'); 
                    card.style.transform = 'scale(0.9) opacity(0)';
                    card.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        card.remove();
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data berhasil disingkirkan.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                            customClass: { popup: 'rounded-[2rem]' }
                        });
                    }, 500);
                }
            });
        }

        function handleInvoiceClick(event, el) {
            event.preventDefault();
            const targetUrl = el.getAttribute('href');
            const content = el.querySelector('#btn-content');
            
            // Gunakan text-xs agar saat loading ukurannya tetap ramping
            content.innerHTML = `
                <svg class="animate-spin h-3.5 w-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-[10px] tracking-tight animate-pulse uppercase">Memproses...</span>
            `;
            
            el.classList.add('pointer-events-none', 'opacity-90');

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 800); 
        }

        // Back to Top Logic
        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
                backToTopBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                backToTopBtn.classList.add('translate-y-20', 'opacity-0');
                backToTopBtn.classList.remove('translate-y-0', 'opacity-100');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>