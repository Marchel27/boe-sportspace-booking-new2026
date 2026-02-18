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
                                Data Penyewa
                            </span>
                            
                            <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1265A8] border border-blue-100 uppercase tracking-widest animate-pulse">
                                Live
                            </span>
                        </h2>
                        
                        <p class="mt-1 text-slate-400 text-xs md:text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#1265A8]/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Selamat datang di <span class="text-slate-600 font-semibold mx-1">manajemen data penyewa</span>.
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

        <section class="mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- 1 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-3241</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Tennis BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">09.00 - 11.30 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- 2 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-5036</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Voli BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">11.30 - 14.00 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-3029</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Football BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">07.30 - 09.30 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-7934</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Badminton BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">14.30 - 16.30 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-1023</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Tenis BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">13.30 - 15.30 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="group bg-white rounded-[2.5rem] p-6 border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-100 transition-all duration-500 hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#1265A8] shadow-inner group-hover:bg-[#1265A8] group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex flex-col items-end gap-2">
                            <span class="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                In Progress
                            </span>
                            <span class="text-[9px] text-slate-400 font-medium italic">ID: #BOE-4039</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <div>
                            <h4 class="text-lg font-black text-slate-800 group-hover:text-[#1265A8] transition-colors leading-tight">
                                Swimming BOE-Sport space
                            </h4>
                            <p class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-bold mt-1">Booking Sesi</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-4 border border-dashed border-slate-200 group-hover:bg-blue-50/50 group-hover:border-blue-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <svg class="w-4 h-4 text-[#1265A8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-extrabold text-slate-700">09.30 - 11.30 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-50">
                        <button onclick="confirmDelete(this)" 
                            class="p-3.5 rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 shadow-sm" 
                            title="Batalkan Booking">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        
                        <a href="/admin/dashboard/detail/detailPenyewa" 
                        onclick="handleNavClick(event, this)"
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-3.5 bg-[#1265A8] text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-100 hover:bg-[#0d4d82] hover:shadow-blue-200 transition-all active:scale-95 decoration-none min-w-[160px]">
                            
                            <span class="btn-content flex items-center gap-2">
                                <svg class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="btn-text">Detail Penyewa</span>
                            </span>
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
        const isBlueBtn = el.classList.contains('bg-[#1265A8]');
        const spinnerColor = (isDarkBtn || isBlueBtn) ? 'text-white' : 'text-blue-500';

        function handleNavClick(event, el) {
            const targetUrl = el.getAttribute('href');
            if (!targetUrl || targetUrl === '#') return;

            event.preventDefault();

            const content = el.querySelector('.btn-content');
            content.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="animate-pulse tracking-wide text-[11px] font-black uppercase">Memuat...</span>
            `;

            el.classList.add('pointer-events-none', 'opacity-80');

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 800);
        }

        function confirmDelete(button) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data booking ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1265A8', 
                cancelButtonColor: '#ef4444',  
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl px-6 py-3 font-bold',
                    cancelButton: 'rounded-xl px-6 py-3 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Logika penghapusan visual kartu
                    const card = button.closest('.group');
                    if (card) {
                        card.style.transform = 'scale(0.9) opacity(0)';
                        card.style.transition = 'all 0.5s ease';
                        setTimeout(() => card.remove(), 500);
                    }

                    // Notifikasi sukses yang hilang otomatis
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data telah berhasil dihapus.',
                        icon: 'success',
                        showConfirmButton: false, 
                        timer: 1500,               
                        timerProgressBar: true,    
                        customClass: {
                            popup: 'rounded-[2rem]'
                        }
                    });
                }
            })
        }

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