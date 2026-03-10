<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/image/logo/tutwuri-logo.svg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .smooth-transition {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
    <title>BOE-SportSpace</title>
</head>

<body class="bg-[#FFFFFF]">
    <x-layout.navbar />
    {{-- Hero Section --}}
    <section class="relative w-full h-screen bg-[#FFFFFF] overflow-hidden flex flex-col items-center justify-center text-center px-6">
        {{-- Background Image --}}
        <div data-aos="zoom-out" data-aos-duration="2000" class="absolute inset-0 z-0">
            <img src="/image/pictures/bgImage-boe.svg" alt="bg-section" class="w-full h-full object-cover opacity-90">
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/20"></div>
        </div>

        {{-- Content Container --}}
        <div class="relative z-10 flex flex-col items-center">
            <h2
                data-aos="fade-down"
                data-aos-delay="100"
                class="inline-block px-5 py-2 mb-6 text-sm font-semibold text-blue-500 bg-white/10 backdrop-blur-md border border-white/20 rounded-full shadow-lg tracking-wide uppercase">
                Demo Version
            </h2>
            <h1 data-aos="fade-down" data-aos-delay="200" class="text-white drop-shadow-2xl text-[45px] lg:text-[60px] font-black leading-[1.1] uppercase tracking-tighter mb-6">
                SELAMAT DATANG <br> DI <span class="text-blue-400">BOE-SPORT SPACE</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="400" class="text-white/90 text-[18px] lg:text-[22px] drop-shadow-lg font-medium max-w-4xl leading-relaxed mb-10">
                Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi<br class="hidden md:block">
                Bidang Otomotif dan Elektronika Malang
            </p>

            <div data-aos="zoom-in" data-aos-delay="600" class="flex flex-col sm:flex-row gap-5">
                <a href="/formBooking"
                    id="btn-booking-now"
                    class="inline-flex items-center justify-center bg-[#276AD7] text-white px-12 py-4 rounded-2xl font-bold text-xl hover:bg-black transition-all duration-300 shadow-[0_10px_30px_rgba(39,106,215,0.4)] hover:shadow-none transform hover:-translate-y-1 active:scale-95 text-center relative overflow-hidden min-w-[240px]">

                    <svg id="loading-spinner" class="hidden animate-spin h-6 w-6 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <span id="btn-text" class="transition-all duration-300">Booking Now</span>
                </a>

                <a href="/schedule_booking"
                    id="btn-schedule"
                    class="inline-flex items-center justify-center bg-white/10 backdrop-blur-md border border-white/30 text-white px-12 py-4 rounded-2xl font-bold text-xl hover:bg-white hover:text-black transition-all duration-300 transform hover:-translate-y-1 active:scale-95 text-center relative overflow-hidden min-w-[240px]">

                    <svg id="schedule-spinner" class="hidden animate-spin h-6 w-6 text-current absolute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <span id="schedule-text" class="transition-all duration-300">Check Schedule</span>
                </a>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div id="scroll-indicator" class="absolute bottom-10 left-0 right-0 flex flex-col items-center gap-2 z-20 transition-opacity duration-300">
            <div class="animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-15 w-15 text-white drop-shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="relative overflow-hidden bg-white py-24 px-6 lg:px-20">
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-50"></div>

        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center gap-16 mb-20">
                {{-- Image Side --}}
                <div class="relative w-full lg:w-1/2 group" data-aos="fade-right" data-aos-duration="1000">
                    <div class="absolute -bottom-6 -right-6 w-full h-full border-2 border-[#1d6fa5] rounded-[2.5rem] transition-all duration-500 group-hover:-bottom-4 group-hover:-right-4"></div>
                    <div class="relative overflow-hidden rounded-[2.5rem] shadow-2xl">
                        <img src="/image/pictures/imgAbout.svg" alt="Gedung BOE" class="w-full h-[450px] object-cover transform transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="absolute -bottom-2 lg:bottom-10 -left-4 lg:-left-10 bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hidden sm:block">
                        <p class="text-3xl font-black text-[#1d6fa5]">20+</p>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Tahun Pengalaman</p>
                    </div>
                </div>

                {{-- Content Side --}}
                <div class="w-full lg:w-1/2 flex flex-col items-start" data-aos="fade-left" data-aos-duration="1000">
                    <div class="mb-8">
                        <span class="text-[#1d6fa5] font-bold uppercase tracking-[0.3em] text-sm mb-3 block">Discover Us</span>
                        <h2 class="text-5xl lg:text-6xl font-black text-gray-800 tracking-tight leading-none">About</h2>
                        <div class="w-20 h-2 bg-[#1d6fa5] mt-6 rounded-full"></div>
                    </div>

                    <div class="space-y-6">
                        <p class="text-xl leading-relaxed text-gray-600 font-medium">
                            BBPPMPV BOE Malang tidak hanya berperan sebagai pusat pengembangan pendidikan vokasi,
                            tetapi juga menyediakan <span class="text-gray-900 font-bold underline decoration-[#1d6fa5]/30 decoration-4">fasilitas sewa lapangan olahraga</span> dengan kualitas terbaik.
                        </p>
                        <p class="text-lg leading-relaxed text-gray-500">
                            Kami hadir sebagai bentuk dukungan terhadap gaya hidup sehat dan aktivitas kebersamaan bagi masyarakat umum. Dengan fasilitas yang terawat dan standar tinggi, kami menjamin pengalaman olahraga terbaik bagi Anda.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Footer Section: Developed By --}}
            <div class="pt-12 border-t border-gray-100" data-aos="fade-up">
                <div class="flex flex-col md:flex-row gap-8 lg:gap-12">
                    <div class="max-w-xs shrink-0">
                        <h3 class="text-[#1d6fa5] font-black uppercase tracking-widest text-sm mb-2">Developed By</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">Sistem ini dikembangkan oleh talenta muda berbakat melalui program kolaborasi industri dan pendidikan vokasi.</p>
                    </div>

                    <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-8 gap-x-6">
                        @php
                        $devs = [
                        ['name' => 'Mohammad Dirgo Marchellino', 'school' => 'SMKN 1 KRAKSAAN', 'role' => 'Backend Developer'],
                        ['name' => 'Moh. Romsi Ramadani', 'school' => 'SMKN 1 KRAKSAAN', 'role' => 'UI/UX Designer'],
                        ['name' => 'Ardan Ramadhan P.H', 'school' => 'SMKN 1 PURWOSARI', 'role' => 'Frontend Developer'],
                        ['name' => 'Syafiq Labib', 'school' => 'SMKN 1 PURWOSARI', 'role' => 'UI/UX Designer'],
                        ['name' => 'Muhammad Farchan', 'school' => 'SMKN 8 MALANG', 'role' => 'Backend Developer'],
                        ['name' => 'Feriska Agustina Fitria', 'school' => 'SMKN 8 MALANG', 'role' => 'UI/UX Designer'],
                        ];
                        @endphp

                        @foreach($devs as $dev)
                        <div class="flex items-start gap-4 group transition-all">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-50 text-[#1d6fa5] rounded-xl flex items-center justify-center group-hover:bg-[#1d6fa5] group-hover:text-white transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-[13px] font-black text-gray-800 uppercase leading-none mb-1 group-hover:text-[#1d6fa5] transition-colors">{{ $dev['name'] }}</p>
                                <p class="text-[10px] text-gray-400 font-bold tracking-tight mb-2">{{ $dev['school'] }}</p>
                                <span class="inline-block w-fit px-2 py-0.5 bg-gray-100 text-gray-600 text-[9px] font-black uppercase rounded-md tracking-tighter">
                                    {{ $dev['role'] }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Booking Section --}}
    <div id="booking" class="bg-[#FFFFFF] py-24 px-6 min-h-screen" data-aos="fade-down">
        <div class="max-w-6xl mx-auto mb-12 text-center">
            <h1 class="text-4xl md:text-5xl font-black text-gray-800 uppercase tracking-tighter">
                Boo<span class="text-[#1d6fa5]">king</span>
            </h1>
            <div class="h-1.5 w-20 bg-[#1d6fa5] mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="flex justify-center items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 max-w-6xl w-full">

                @foreach ($lapangan as $item)
                <div data-aos="fade-up" data-aos-delay="200" class="group bg-white rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col border border-gray-100">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full shadow-sm">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-[#1d6fa5]">Premium Venue</p>
                        </div>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-2xl font-black text-gray-800 leading-tight">
                                {{ $item->nama_lapangan }} <span class="text-[#1d6fa5]">Court</span>
                            </h2>
                        </div>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                            Nikmati pengalaman bermain {{ $item->nama_lapangan }} yang maksimal di lapangan berstandar tinggi. Permukaan lapangan dirancang untuk memberikan kenyamanan dan performa optimal.
                        </p>

                        <div class="mt-auto pt-6 border-t border-gray-50 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 sm:gap-0">
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-tight">Mulai Dari</p>
                                <p class="text-2xl font-black text-gray-900">
                                    Rp {{ number_format($item->harga) }}<span class="text-xs font-medium text-gray-400 pl-1">/ Sesi</span>
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4 w-full sm:w-auto">
                                <button
                                    onclick="openDescription('{{ $item->nama_lapangan }}', 'Nikmati pengalaman bermain {{ $item->nama_lapangan }} yang maksimal di lapangan berstandar tinggi. Permukaan lapangan dirancang untuk memberikan kenyamanan dan performa optimal, baik untuk pemula maupun atlet profesional. Dilengkapi pencahayaan modern dan fasilitas pendukung, memastikan setiap sesi olahraga menjadi menyenangkan dan aman. Cocok untuk latihan, kompetisi, maupun kegiatan komunitas.', '{{ asset('storage/'.$item->thumbnail) }}')"
                                    class="text-[#1d6fa5] border border-[#1d6fa5] hover:bg-[#1d6fa5] hover:text-white px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 text-center flex-1 sm:flex-none">
                                    Detail
                                </button>

                                <a href="/formBooking?id_lap={{ $item->id_lap }}"
                                    class="btn-book-now relative inline-flex items-center justify-center bg-[#1d6fa5] hover:bg-black text-white px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 transform active:scale-95 shadow-lg shadow-blue-200 hover:shadow-none text-center flex-1 sm:flex-none overflow-hidden min-w-[120px]">
                                    <svg class="loading-spinner hidden animate-spin h-4 w-4 text-white absolute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="btn-label transition-all duration-300">Book Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Contact Section --}}
    <section id="contact" class="relative bg-[#1d6fa5] py-24 px-6 lg:px-20 text-white overflow-hidden border-t border-white/5">
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[500px] h-[500px] bg-blue-400/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-[400px] h-[400px] bg-black/20 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-20 mb-20" data-aos="fade-up" data-aos-duration="1200">

                <div class="md:col-span-5 flex flex-col space-y-8">
                    <div>
                        <h2 class="text-4xl font-black tracking-tighter leading-[0.9] uppercase cursor-default">
                            BBPPMPV <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">BOE Malang</span>
                        </h2>
                        <div class="h-1.5 w-16 bg-blue-300 mt-4 rounded-full shadow-[0_0_15px_rgba(147,197,253,0.5)]"></div>
                    </div>

                    <p class="text-blue-50/80 leading-relaxed text-lg font-light max-w-md">
                        Bukan sekadar pusat keunggulan vokasi, kami menyediakan ekosistem pendukung performa terbaik bagi para peserta pelatihan dan komunitas. Kami percaya bahwa ketajaman pikiran di bidang otomotif dan elektronika harus didukung oleh kebugaran fisik yang prima.
                    </p>

                    <div class="flex gap-4 pt-4">
                        <a href="#" class="group relative w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 hover:bg-white hover:scale-110 hover:-translate-y-1 shadow-xl">
                            <ion-icon name="logo-whatsapp" class="text-2xl group-hover:text-[#1d6fa5] transition-colors"></ion-icon>
                        </a>
                        <a href="#" class="group relative w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 hover:bg-white hover:scale-110 hover:-translate-y-1 shadow-xl">
                            <ion-icon name="logo-instagram" class="text-2xl group-hover:text-[#1d6fa5] transition-colors"></ion-icon>
                        </a>
                        <a href="#" class="group relative w-12 h-12 flex items-center justify-center rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 hover:bg-white hover:scale-110 hover:-translate-y-1 shadow-xl">
                            <ion-icon name="logo-facebook" class="text-2xl group-hover:text-[#1d6fa5] transition-colors"></ion-icon>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-4 flex flex-col" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-extrabold mb-10 tracking-widest uppercase flex items-center gap-3">
                        Contact Info
                        <span class="flex-grow h-[1px] bg-gradient-to-r from-white/30 to-transparent"></span>
                    </h3>
                    <ul class="space-y-8">
                        <li class="flex items-start gap-5 group">
                            <div class="bg-white/10 p-3.5 rounded-2xl border border-white/10 group-hover:bg-blue-400/20 group-hover:border-blue-300/50 transition-all duration-300">
                                <ion-icon name="location-outline" class="text-2xl text-blue-200"></ion-icon>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-blue-300 mb-1">Lokasi</span>
                                <span class="text-blue-50/90 leading-relaxed font-medium text-sm">Jl. Teluk Mandar Tromol Arjosari, Malang, Jawa Timur 65126</span>
                            </div>
                        </li>
                        <li class="flex items-center gap-5 group">
                            <div class="bg-white/10 p-3.5 rounded-2xl border border-white/10 group-hover:bg-blue-400/20 transition-all">
                                <ion-icon name="call-outline" class="text-2xl text-blue-200"></ion-icon>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-blue-300 mb-1">Telepon</span>
                                <span class="text-blue-50/90 font-semibold group-hover:text-white transition-colors text-sm">081 2321 3780</span>
                                <span class="text-blue-50/90 font-semibold group-hover:text-white transition-colors text-sm">CP: Donny Lesmana</span>
                            </div>
                        </li>
                        <li class="flex items-center gap-5 group">
                            <div class="bg-white/10 p-3.5 rounded-2xl border border-white/10 group-hover:bg-blue-400/20 transition-all">
                                <ion-icon name="mail-outline" class="text-2xl text-blue-200"></ion-icon>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-blue-300 mb-1">Email</span>
                                <span class="text-blue-50/90 font-semibold group-hover:text-white transition-colors text-sm break-all">info@bbppmpvboe-malang.ac.id</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="md:col-span-3 flex flex-col" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-xl font-extrabold mb-10 tracking-widest uppercase flex items-center gap-3">
                        Menu
                        <span class="flex-grow h-[1px] bg-gradient-to-r from-white/30 to-transparent"></span>
                    </h3>
                    <nav>
                        <ul class="space-y-5">
                            <li>
                                <a href="#about" class="group flex items-center text-lg font-medium text-blue-100 hover:text-white transition-all duration-300">
                                    <span class="w-0 group-hover:w-6 h-[2px] bg-blue-300 mr-0 group-hover:mr-3 transition-all duration-300"></span>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="#booking" class="group flex items-center text-lg font-medium text-blue-100 hover:text-white transition-all duration-300">
                                    <span class="w-0 group-hover:w-6 h-[2px] bg-blue-300 mr-0 group-hover:mr-3 transition-all duration-300"></span>
                                    Booking
                                </a>
                            </li>
                            <li>
                                <a href="#contact" class="group flex items-center text-lg font-medium text-blue-100 hover:text-white transition-all duration-300">
                                    <span class="w-0 group-hover:w-6 h-[2px] bg-blue-300 mr-0 group-hover:mr-3 transition-all duration-300"></span>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-6" data-aos="zoom-in">
                <p class="text-blue-200/80 text-xs font-medium tracking-widest uppercase">
                    © 2026 BOE. ALL RIGHTS RESERVED.
                </p>

                <div class="flex items-center gap-4 bg-black/20 px-6 py-3 rounded-2xl border border-white/5 backdrop-blur-sm">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-blue-300/40 uppercase">Powered By</span>
                    <div class="flex items-center gap-3 border-l border-white/10 pl-4">
                        <img src="/image/logo/tutwuri-logo.svg" alt="Logo" class="h-8 w-auto brightness-125">
                        <span class="text-xs font-semibold tracking-wider uppercase leading-tight">
                            BBPPMPV <br> BOE MALANG
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            offset: 120,
            delay: 0,
            duration: 800,
            easing: 'ease-out-back',
            once: false,
            mirror: false,
        });

        // Peningkatan Scroll Indicator Logic
        window.addEventListener('scroll', function() {
            const scrollIndicator = document.getElementById('scroll-indicator');
            if (scrollIndicator) {
                const scrollValue = window.scrollY;

                let opacity = 1 - (scrollValue / 200);
                scrollIndicator.style.opacity = Math.max(0, opacity);

                // Efek Turun 
                if (opacity > 0) {
                    scrollIndicator.style.transform = `translateY(${scrollValue * 0.5}px)`;
                    scrollIndicator.style.pointerEvents = 'auto';
                } else {
                    scrollIndicator.style.pointerEvents = 'none';
                }
            }
        });


        let currentPreviewImg = ""; // Variabel global untuk menyimpan gambar aktif

        function openDescription(title, body, imgUrl) {
            const modal = document.getElementById('descModal');
            const modalContent = document.getElementById('modalContent');

            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalBody').innerText = body;

            currentPreviewImg = imgUrl;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            document.body.style.overflow = 'hidden';
        }

        function handlePreview() {
            const overlay = document.getElementById('imagePreviewOverlay');
            const container = document.getElementById('previewContainer');
            const fullImg = document.getElementById('previewFullImage');

            fullImg.src = currentPreviewImg;

            overlay.classList.remove('hidden');
            overlay.classList.add('flex');

            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                container.classList.remove('scale-90');
                container.classList.add('scale-100');
            }, 10);
        }

        function closePreview() {
            const overlay = document.getElementById('imagePreviewOverlay');
            const container = document.getElementById('previewContainer');

            overlay.classList.add('opacity-0');
            container.classList.remove('scale-100');
            container.classList.add('scale-90');

            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
            }, 500);
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === "Escape") closePreview();
        });

        function closeDescription() {
            const modal = document.getElementById('descModal');
            const modalContent = document.getElementById('modalContent');

            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        window.onclick = function(event) {
            const modal = document.getElementById('descModal');
            if (event.target == modal) {
                closeDescription();
            }
        }

        // Fungsi Helper untuk Animasi Loading
        function handleButtonClick(e, buttonId, textId, spinnerId) {
            e.preventDefault();

            const btn = document.getElementById(buttonId);
            const btnText = document.getElementById(textId);
            const spinner = document.getElementById(spinnerId);
            const targetUrl = btn.getAttribute('href');

            if (!btn || !btnText || !spinner) return;

            btn.classList.add('pointer-events-none', 'brightness-90');
            btn.style.transform = "scale(0.95)";

            btnText.classList.add('opacity-0', 'scale-90', 'translate-y-2');

            setTimeout(() => {
                spinner.classList.remove('hidden');
                spinner.classList.add('block');

                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 800);
            }, 150);
        }

        const scheduleBtn = document.getElementById('btn-schedule');
        if (scheduleBtn) {
            scheduleBtn.addEventListener('click', function(e) {
                handleButtonClick(e, 'btn-schedule', 'schedule-text', 'schedule-spinner');
            });
        }

        const bookingBtn = document.getElementById('btn-booking-now');
        if (bookingBtn) {
            bookingBtn.addEventListener('click', function(e) {
                handleButtonClick(e, 'btn-booking-now', 'btn-text', 'loading-spinner');
            });
        }

        document.querySelectorAll('.btn-book-now').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const btn = this;
                const label = btn.querySelector('.btn-label');
                const spinner = btn.querySelector('.loading-spinner');
                const targetUrl = btn.getAttribute('href');

                btn.classList.add('pointer-events-none', 'opacity-90');
                btn.style.transform = "scale(0.95)";

                label.classList.add('opacity-0', 'translate-y-2');

                setTimeout(() => {
                    spinner.classList.remove('hidden');

                    setTimeout(() => {
                        window.location.href = targetUrl;
                    }, 800);
                }, 100);
            });
        });

        // Logika Back to Top
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
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <div id="descModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
        <div class="bg-white w-full max-w-lg rounded-[2.5rem] overflow-hidden shadow-2xl transform transition-all scale-95 opacity-0 duration-300" id="modalContent">
            <div class="p-8 md:p-10">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="text-[#1d6fa5] font-bold uppercase tracking-widest text-xs">Informasi Fasilitas</span>
                        <h2 id="modalTitle" class="text-3xl font-black text-gray-800 mt-1 uppercase">Judul Card</h2>
                    </div>
                    <button onclick="closeDescription()" class="bg-gray-100 hover:bg-red-500 hover:text-white p-2 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="h-1.5 w-16 bg-[#1d6fa5] rounded-full mb-6"></div>

                <p id="modalBody" class="text-gray-600 leading-relaxed text-lg font-medium">
                    Deskripsi akan muncul di sini...
                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <button onclick="handlePreview()" class="flex-1 bg-[#1d6fa5] text-white py-4 rounded-2xl font-bold hover:bg-[#165a85] transition-all flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Lihat Preview
                    </button>

                    <button onclick="closeDescription()" class="flex-1 bg-gray-100 text-gray-700 py-4 rounded-2xl font-bold hover:bg-gray-200 transition-all">
                        Tutup Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="imagePreviewOverlay"
        class="fixed inset-0 z-[150] hidden items-center justify-center bg-black/40 backdrop-blur-xl p-4 transition-all duration-500 ease-in-out opacity-0"
        onclick="closePreview()">

        <div class="relative max-w-5xl w-full transform scale-90 transition-transform duration-500 ease-out"
            id="previewContainer"
            onclick="event.stopPropagation()">
            <button onclick="closePreview()"
                class="absolute top-6 right-6 z-[160] group flex items-center justify-center">

                <div class="absolute inset-0 bg-white/10 backdrop-blur-md border border-white/20 rounded-full scale-100 group-hover:scale-110 group-active:scale-95 transition-all duration-300 shadow-2xl"></div>

                <div class="relative p-3 text-white group-hover:text-red-400 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 transform group-hover:rotate-90 transition-transform duration-500 ease-out"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </button>

            <div class="overflow-hidden rounded-[2rem] shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/10 bg-gray-900">
                <img id="previewFullImage"
                    src="/image/pictures/tenis-boe.svg"
                    alt="Full Preview"
                    class="mx-auto max-h-[80vh] w-full object-contain">
            </div>

            <div class="mt-4 text-center">
                <p class="text-white/50 text-xs uppercase tracking-[0.3em] font-medium">Press ESC to close</p>
            </div>
        </div>
    </div>
</body>

</html>