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
                                Data Transaksi
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

        <section class="mb-8 flex flex-wrap items-center justify-between gap-6 bg-white px-6 py-4 rounded-3xl border border-slate-200/60 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="relative group">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#1265A8] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input type="date" id="filterTanggal" 
                        class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 uppercase tracking-wider focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-[#1265A8]/50 transition-all cursor-pointer">
                </div>
                
                <button id="resetBtn" class="px-5 py-2.5 text-xs font-bold text-slate-400 uppercase tracking-[0.1em] hover:text-red-500 transition-colors flex items-center gap-2 group">
                    <svg id="resetIcon" class="w-3.5 h-3.5 transition-transform duration-500 group-active:rotate-[-180deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filter
                </button>
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

        {{-- Data 1 --}}
        <section class="max-w-5xl mx-auto my-10 px-4 group/card">
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
                            <div class="flex items-center">
                                <h3 class="text-xl font-bold text-slate-800 tracking-tight leading-tight">
                                    Tennis BOE-Sport Space
                                </h3>
                            </div>
                            <p class="text-slate-400 text-[11px] uppercase tracking-wider">
                                ID Transaksi: #TRX-90231 <span class="mx-1 opacity-50">•</span> 18 February 2026
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-bold transition-colors hover:bg-slate-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Detail
                        </button>
                        <button onclick="triggerConfirm()" class="p-2.5 text-red-500 bg-red-50 border border-red-100 rounded-xl transition-all hover:bg-red-500 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                            <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Data Sebelumnya</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa</span>
                                <span class="text-sm font-bold text-slate-700">Rp 150.000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu</span>
                                <span class="text-sm font-bold text-slate-700">09.00 - 10.30 WIB</span>
                            </div>
                            
                            <div class="pt-6 mt-6 border-t border-slate-50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+1&background=f1f5f9&color=64748b" class="w-8 h-8 rounded-full border border-slate-100" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Dicatat oleh</p>
                                    <p class="font-bold text-slate-600 uppercase">Admin_One</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-blue-50/20">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#1265A8]"></div>
                            <h4 class="text-[11px] font-bold text-[#1265A8] uppercase tracking-[0.2em]">Data Terbaru</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa Baru</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-black text-[#1265A8]">Rp 200.000</span>
                                    <span class="text-[9px] font-bold text-green-600 bg-green-100 px-1.5 py-0.5 rounded-md leading-none">+33%</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu Baru</span>
                                <span class="text-sm font-black text-[#1265A8]">08.00 - 09.00 WIB</span>
                            </div>

                            <div class="pt-6 mt-6 border-t border-blue-100/50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+2&background=1265A8&color=fff" class="w-8 h-8 rounded-full border border-white shadow-sm" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Diperbarui oleh</p>
                                    <p class="font-bold text-[#1265A8] uppercase">Admin_Two</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="px-8 py-4 bg-white border-t border-slate-100 flex justify-between items-center">
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider">Terverifikasi oleh Sistem</span>
                    </div>
                    <div class="text-[10px] text-slate-300 font-medium">Ref ID: BOE-2026-X1</div>
                </div>
            </div>
        </section>

        {{-- Data 2 --}}
        <section class="max-w-5xl mx-auto my-10 px-4 group/card">
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
                            <div class="flex items-center">
                                <h3 class="text-xl font-bold text-slate-800 tracking-tight leading-tight">
                                    Tennis BOE-Sport Space
                                </h3>
                            </div>
                            <p class="text-slate-400 text-[11px] uppercase tracking-wider">
                                ID Transaksi: #TRX-90231 <span class="mx-1 opacity-50">•</span> 18 February 2026
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-bold transition-colors hover:bg-slate-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Detail
                        </button>
                        <button onclick="triggerConfirm()" class="p-2.5 text-red-500 bg-red-50 border border-red-100 rounded-xl transition-all hover:bg-red-500 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                            <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Data Sebelumnya</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa</span>
                                <span class="text-sm font-bold text-slate-700">Rp 150.000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu</span>
                                <span class="text-sm font-bold text-slate-700">09.00 - 10.30 WIB</span>
                            </div>
                            
                            <div class="pt-6 mt-6 border-t border-slate-50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+1&background=f1f5f9&color=64748b" class="w-8 h-8 rounded-full border border-slate-100" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Dicatat oleh</p>
                                    <p class="font-bold text-slate-600 uppercase">Admin_One</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-blue-50/20">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#1265A8]"></div>
                            <h4 class="text-[11px] font-bold text-[#1265A8] uppercase tracking-[0.2em]">Data Terbaru</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa Baru</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-black text-[#1265A8]">Rp 200.000</span>
                                    <span class="text-[9px] font-bold text-green-600 bg-green-100 px-1.5 py-0.5 rounded-md leading-none">+33%</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu Baru</span>
                                <span class="text-sm font-black text-[#1265A8]">08.00 - 09.00 WIB</span>
                            </div>

                            <div class="pt-6 mt-6 border-t border-blue-100/50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+2&background=1265A8&color=fff" class="w-8 h-8 rounded-full border border-white shadow-sm" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Diperbarui oleh</p>
                                    <p class="font-bold text-[#1265A8] uppercase">Admin_Two</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="px-8 py-4 bg-white border-t border-slate-100 flex justify-between items-center">
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider">Terverifikasi oleh Sistem</span>
                    </div>
                    <div class="text-[10px] text-slate-300 font-medium">Ref ID: BOE-2026-X1</div>
                </div>
            </div>
        </section>

        {{-- Data 3 --}}
        <section class="max-w-5xl mx-auto my-10 px-4 group/card">
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
                            <div class="flex items-center">
                                <h3 class="text-xl font-bold text-slate-800 tracking-tight leading-tight">
                                    Tennis BOE-Sport Space
                                </h3>
                            </div>
                            <p class="text-slate-400 text-[11px] uppercase tracking-wider">
                                ID Transaksi: #TRX-90231 <span class="mx-1 opacity-50">•</span> 18 February 2026
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-bold transition-colors hover:bg-slate-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Detail
                        </button>
                        <button onclick="triggerConfirm()" class="p-2.5 text-red-500 bg-red-50 border border-red-100 rounded-xl transition-all hover:bg-red-500 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-100">
                    
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                            <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Data Sebelumnya</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa</span>
                                <span class="text-sm font-bold text-slate-700">Rp 150.000</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu</span>
                                <span class="text-sm font-bold text-slate-700">09.00 - 10.30 WIB</span>
                            </div>
                            
                            <div class="pt-6 mt-6 border-t border-slate-50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+1&background=f1f5f9&color=64748b" class="w-8 h-8 rounded-full border border-slate-100" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Dicatat oleh</p>
                                    <p class="font-bold text-slate-600 uppercase">Admin_One</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-blue-50/20">
                        <div class="flex items-center gap-2 mb-8">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#1265A8]"></div>
                            <h4 class="text-[11px] font-bold text-[#1265A8] uppercase tracking-[0.2em]">Data Terbaru</h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Harga Sewa Baru</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-black text-[#1265A8]">Rp 200.000</span>
                                    <span class="text-[9px] font-bold text-green-600 bg-green-100 px-1.5 py-0.5 rounded-md leading-none">+33%</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-500">Slot Waktu Baru</span>
                                <span class="text-sm font-black text-[#1265A8]">08.00 - 09.00 WIB</span>
                            </div>

                            <div class="pt-6 mt-6 border-t border-blue-100/50 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Admin+2&background=1265A8&color=fff" class="w-8 h-8 rounded-full border border-white shadow-sm" alt="Admin">
                                <div class="text-[11px]">
                                    <p class="text-slate-400">Diperbarui oleh</p>
                                    <p class="font-bold text-[#1265A8] uppercase">Admin_Two</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="px-8 py-4 bg-white border-t border-slate-100 flex justify-between items-center">
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider">Terverifikasi oleh Sistem</span>
                    </div>
                    <div class="text-[10px] text-slate-300 font-medium">Ref ID: BOE-2026-X1</div>
                </div>
            </div>
        </section>
    </main>

    <div id="confirm-overlay" class="fixed inset-0 z-50 flex items-end justify-center p-6 sm:items-center pointer-events-none opacity-0 transition-all duration-300">
        <div class="absolute inset-0 bg-slate-900/20 backdrop-blur-sm"></div>
        
        <div class="relative bg-white w-full max-w-sm rounded-[2rem] shadow-2xl border border-slate-100 p-6 pointer-events-auto transform translate-y-10 transition-transform duration-300" id="confirm-box">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                
                <h3 class="text-lg font-bold text-slate-800">Hapus Data?</h3>
                <p class="text-sm text-slate-500 mt-2">Tindakan ini tidak dapat dibatalkan. Apakah Anda yakin ingin menghapus data ini?</p>
                
                <div class="flex gap-3 w-full mt-6" id="action-wrapper">
                    <button onclick="closeConfirm()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-colors">
                        Batal
                    </button>
                    <button onclick="startLoading()" class="flex-1 px-4 py-3 bg-red-500 text-white font-bold rounded-2xl shadow-lg shadow-red-200 hover:bg-red-600 transition-all">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

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
        document.addEventListener('DOMContentLoaded', () => {
            const selectAllBtn = document.getElementById('selectAll');
            const selectLabel = document.getElementById('selectLabel');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');
            const overlay = document.getElementById('confirm-overlay');
            const box = document.getElementById('confirm-box');
            const actionWrapper = document.getElementById('action-wrapper');
            const resetBtn = document.getElementById('resetBtn');
            const resetIcon = document.getElementById('resetIcon');
            const filterTanggal = document.getElementById('filterTanggal');
            const backToTopBtn = document.getElementById('backToTop');

            // Mengambil semua checkbox item yang ada saat ini
            const getItemCheckboxes = () => document.querySelectorAll('.itemCheckbox');

            // tampilan tombol Hapus Masal
            function toggleBulkActions() {
                const checkedBoxes = Array.from(getItemCheckboxes()).filter(cb => cb.checked);
                const count = checkedBoxes.length;

                if (count > 0) {
                    selectedCount.innerText = count;
                    bulkActions.classList.remove('hidden');
                    bulkActions.classList.add('flex');
                } else {
                    bulkActions.classList.add('hidden');
                    bulkActions.classList.remove('flex');
                }
            }

            // style kartu border & background saat dipilih
            function updateCardUI(checkbox) {
                const card = checkbox.closest('.max-w-5xl');
                if (card) {
                    const innerBox = card.querySelector('.bg-white.rounded-3xl');
                    if (innerBox) {
                        if (checkbox.checked) {
                            innerBox.classList.add('ring-2', 'ring-[#1265A8]/20', 'border-[#1265A8]/30', 'bg-blue-50/5');
                        } else {
                            innerBox.classList.remove('ring-2', 'ring-[#1265A8]/20', 'border-[#1265A8]/30', 'bg-blue-50/5');
                        }
                    }
                }
            }

            // logika select all
            if (selectAllBtn) {
                selectAllBtn.addEventListener('change', function() {
                    const isChecked = this.checked;
                    getItemCheckboxes().forEach(checkbox => {
                        checkbox.checked = isChecked;
                        updateCardUI(checkbox);
                    });

                    selectLabel.innerText = isChecked ? "Batalkan Semua" : "Pilih Semua";
                    selectLabel.classList.toggle('text-[#1265A8]', isChecked);
                    selectLabel.classList.toggle('text-slate-400', !isChecked);
                    toggleBulkActions();
                });
            }

            // logika checkbox individual
            document.addEventListener('change', (e) => {
                if (e.target.classList.contains('itemCheckbox')) {
                    const checkboxes = getItemCheckboxes();
                    updateCardUI(e.target);
                    
                    const allChecked = Array.from(checkboxes).every(c => c.checked);
                    const anyChecked = Array.from(checkboxes).some(c => c.checked);
                    
                    if (selectAllBtn) {
                        selectAllBtn.checked = allChecked;
                        selectAllBtn.indeterminate = anyChecked && !allChecked;
                    }
                    
                    if (selectLabel) {
                        selectLabel.innerText = allChecked ? "Batalkan Semua" : "Pilih Semua";
                        selectLabel.classList.toggle('text-[#1265A8]', anyChecked);
                    }
                    toggleBulkActions();
                }
            });

            // logika reset
            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    resetIcon.classList.add('rotate-[-180deg]');
                    setTimeout(() => resetIcon.classList.remove('rotate-[-180deg]'), 500);

                    if (filterTanggal) filterTanggal.value = '';
                    if (selectAllBtn) {
                        selectAllBtn.checked = false;
                        selectAllBtn.indeterminate = false;
                    }
                    if (selectLabel) {
                        selectLabel.innerText = "Pilih Semua";
                        selectLabel.classList.remove('text-[#1265A8]');
                        selectLabel.classList.add('text-slate-400');
                    }

                    getItemCheckboxes().forEach(cb => {
                        cb.checked = false;
                        updateCardUI(cb);
                    });
                    toggleBulkActions();
                });
            }

            // logika modal dan hapus massal
            window.triggerConfirm = () => {
                overlay.classList.remove('opacity-0', 'pointer-events-none');
                box.classList.remove('translate-y-10');
            };

            window.closeConfirm = () => {
                overlay.classList.add('opacity-0', 'pointer-events-none');
                box.classList.add('translate-y-10');
            };

            window.triggerBulkConfirm = () => {
                const count = Array.from(getItemCheckboxes()).filter(cb => cb.checked).length;
                const confirmTitle = overlay.querySelector('h3');
                const confirmDesc = overlay.querySelector('p');
                const confirmBtn = actionWrapper.querySelector('button:last-child');

                confirmTitle.innerText = "Hapus Massal?";
                confirmDesc.innerText = `Anda akan menghapus ${count} data terpilih secara permanen.`;
                confirmBtn.setAttribute('onclick', 'executeBulkDelete()');
                
                triggerConfirm();
            };

            window.executeBulkDelete = () => {
                startLoading();
                setTimeout(() => {
                    const checkedBoxes = document.querySelectorAll('.itemCheckbox:checked');
                    checkedBoxes.forEach(cb => {
                        const card = cb.closest('section'); 
                        if (card) {
                            card.classList.add('animate-out', 'fade-out', 'zoom-out', 'duration-500');
                            setTimeout(() => card.remove(), 500);
                        }
                    });

                    if (selectAllBtn) {
                        selectAllBtn.checked = false;
                        selectAllBtn.indeterminate = false;
                    }
                    selectLabel.innerText = "Pilih Semua";
                    selectLabel.classList.remove('text-[#1265A8]');
                    
                    closeConfirm();
                    setTimeout(toggleBulkActions, 600);
                    
                    // Kembalikan fungsi tombol Ya ke default 
                    setTimeout(() => {
                        const confirmBtn = actionWrapper.querySelector('button:last-child');
                        confirmBtn.setAttribute('onclick', 'startLoading()');
                    }, 700);
                }, 2000);
            };

            window.startLoading = () => {
                actionWrapper.innerHTML = `
                    <div class="w-full flex flex-col items-center py-2 animate-pulse">
                        <svg class="animate-spin h-6 w-6 text-[#1265A8] mb-2" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Memproses...</span>
                    </div>
                `;
            };

            // back to top
            window.addEventListener('scroll', () => {
                if (window.scrollY > 400) {
                    backToTopBtn.classList.replace('translate-y-20', 'translate-y-0');
                    backToTopBtn.classList.replace('opacity-0', 'opacity-100');
                } else {
                    backToTopBtn.classList.replace('translate-y-0', 'translate-y-20');
                    backToTopBtn.classList.replace('opacity-100', 'opacity-0');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>