@extends('layouts.app')

@section('page-title', 'ABOUT')
@section('page-subtitle', 'Informasi tentang project Marvel Movie Analytics.')

@section('content')

    <div class="space-y-6">

        {{-- Project Overview --}}
        <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-3">Project Overview</h3>
            <p class="text-sm text-neutral-400 leading-relaxed">
                <span class="text-white font-medium">Marvel Movie Analytics</span> adalah dashboard analisis data 
                yang dibangun menggunakan <span class="text-white font-medium">Laravel</span> untuk menampilkan 
                insight dari dataset film Marvel Cinematic Universe. Website ini dirancang untuk memberikan 
                gambaran menyeluruh tentang performa film-film Marvel, mulai dari pendapatan kotor, 
                distributor, hingga analisis tren secara visual.
            </p>
            <p class="text-sm text-neutral-400 leading-relaxed mt-2">
                Project ini dikembangkan sebagai bagian dari kegiatan Praktik Kerja Lapangan (PKL) 
                dengan tujuan mengimplementasikan pengetahuan tentang pengembangan web menggunakan 
                framework Laravel dan teknologi pendukung lainnya.
            </p>
        </div>

        {{-- Technology Stack & Dataset --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Technology Stack --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Technology Stack</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">Laravel 11</span>
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">PHP</span>
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">MySQL</span>
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">Tailwind CSS</span>
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">Chart.js</span>
                    <span class="px-3 py-1.5 bg-neutral-800 text-white text-xs font-medium border border-neutral-700 rounded">JavaScript</span>
                </div>
                <p class="text-xs text-neutral-500 mt-4">
                    Framework &amp; library yang digunakan untuk membangun aplikasi ini.
                </p>
            </div>

            {{-- Dataset Information --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-3">Dataset Information</h3>
                <p class="text-sm text-neutral-400 leading-relaxed">
                    Dataset yang digunakan adalah <span class="text-white font-medium">Marvel Movies Dataset</span> 
                    yang diperoleh dari <span class="text-white font-medium">Kaggle</span>. Dataset ini berisi 
                    informasi lengkap tentang film-film Marvel Cinematic Universe, termasuk:
                </p>
                <ul class="mt-3 space-y-1.5">
                    <li class="text-sm text-neutral-400 flex items-start gap-2">
                        <span class="text-[#ED1D24] mt-1">•</span>
                        Judul film dan distributor
                    </li>
                    <li class="text-sm text-neutral-400 flex items-start gap-2">
                        <span class="text-[#ED1D24] mt-1">•</span>
                        Tanggal rilis dan budget produksi
                    </li>
                    <li class="text-sm text-neutral-400 flex items-start gap-2">
                        <span class="text-[#ED1D24] mt-1">•</span>
                        Pendapatan kotor (worldwide revenue)
                    </li>
                </ul>
            </div>

        </div>

        {{-- Features --}}
        <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Features</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="text-sm text-white">Dashboard Overview</span>
                </div>
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="text-sm text-white">Movies List</span>
                </div>
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="text-sm text-white">Search Movies</span>
                </div>
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-sm text-white">Pagination</span>
                </div>
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    <span class="text-sm text-white">Revenue Analytics</span>
                </div>
                <div class="flex items-center gap-3 bg-neutral-800/30 border border-neutral-800 px-4 py-3 rounded">
                    <svg class="w-4 h-4 text-[#ED1D24] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-white">Top Grossing Movies</span>
                </div>
            </div>
        </div>

    </div>

@endsection