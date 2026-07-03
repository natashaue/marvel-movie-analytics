@extends('layouts.app')

@section('page-title', 'DASHBOARD')
@section('page-subtitle', 'Overview of movie statistics and analytics.')
@section('content')


<div class="space-y-8">

    {{-- ============================== --}}
    {{-- 1. KARTU STATISTIK             --}}
    {{-- ============================== --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Card 1: Total Film --}}
        <div class="bg-[#1A1A1A] border-l-4 border-[#ED1D24] p-6 relative overflow-hidden group">
            <div class="absolute right-0 bottom-0 text-neutral-800 text-7xl font-black opacity-10 select-none translate-x-4 translate-y-4">MCU</div>
            <p class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Total Film</p>
            <h3 class="text-4xl font-black text-white mt-2 tracking-tight">
                {{ $totalMovies ?? 0 }}
            </h3>
            <p class="text-[10px] text-neutral-600 uppercase tracking-wider mt-2">Arsip Berkas Aktif</p>
        </div>

        {{-- Card 2: Total Pendapatan --}}
        <div class="bg-[#1A1A1A] border-l-4 border-[#ED1D24] p-6 relative overflow-hidden group">
            <div class="absolute right-0 bottom-0 text-neutral-800 text-7xl font-black opacity-10 select-none translate-x-4 translate-y-4">USD</div>
            <p class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Total Pendapatan</p>
            <h3 class="text-4xl font-black text-[#FFCC00] mt-2 tracking-tight">
                ${{ number_format($totalRevenue ?? 0) }}
            </h3>
            <p class="text-[10px] text-neutral-600 uppercase tracking-wider mt-2">Akumulasi Box Office</p>
        </div>

        {{-- Card 3: Rata-Rata / Film --}}
        <div class="bg-[#1A1A1A] border-l-4 border-[#FFCC00] p-6 relative overflow-hidden group">
            <p class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Rata-Rata / Film</p>
            <h3 class="text-4xl font-black text-white mt-2 tracking-tight">
                ${{ ($totalMovies ?? 0) > 0 ? number_format($totalRevenue / $totalMovies) : 0 }}
            </h3>
            <p class="text-xs text-neutral-500 mt-2 truncate">
                Top: <span class="text-neutral-300 font-medium">{{ $topMovie->title ?? '-' }}</span>
            </p>
        </div>

    </div>

    {{-- ============================== --}}
    {{-- 2. GRAFIK ANALISIS DINAMIS (LINE) --}}
    {{-- ============================== --}}
    <div class="bg-[#1A1A1A] border border-neutral-800 p-6">

        {{-- Header Grafik --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-neutral-900 pb-4">
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-white flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#ED1D24] inline-block animate-pulse"></span>
                    Top 10 Film Pendapatan Tertinggi
                </h3>
                <p class="text-[11px] text-neutral-500 mt-1 uppercase font-mono">Terminal: MCU_WORLDWIDE_MONITOR</p>
            </div>
            <div class="flex items-center gap-4 text-[10px] font-bold tracking-wider uppercase font-mono">
                <div class="flex items-center gap-1.5">
                    <span class="w-3 h-0.5 bg-[#ED1D24]"></span>
                    <span class="text-neutral-400">Gross Worldwide (USD)</span>
                </div>
            </div>
        </div>

        {{-- Chart Wrapper --}}
        @if(($moviesForChart ?? collect())->isNotEmpty())
            <div class="relative bg-black/40 border border-neutral-900 p-4">
                <div class="h-72 sm:h-96">
                    <canvas id="mcuWorldwideChart"></canvas>
                </div>
            </div>
        @else
            <div class="flex items-center justify-center h-64 border border-dashed border-neutral-800 text-neutral-600 text-xs uppercase tracking-widest font-mono">
                Data grafik belum tersedia
            </div>
        @endif

    </div>

</div>

@if(($moviesForChart ?? collect())->isNotEmpty())
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const movieLabels = @json($moviesForChart->pluck('title'));
                const movieData   = @json($moviesForChart->pluck('worldwide'));

                const canvas = document.getElementById('mcuWorldwideChart');
                const ctx = canvas.getContext('2d');

                const gradient = ctx.createLinearGradient(0, 0, 0, canvas.clientHeight || 300);
                gradient.addColorStop(0, 'rgba(237, 29, 36, 0.35)');
                gradient.addColorStop(1, 'rgba(237, 29, 36, 0.0)');

                // Potong judul panjang biar label sumbu X tidak berantakan,
                // judul lengkap tetap muncul lewat tooltip.
                const shortLabels = movieLabels.map(title =>
                    title.length > 14 ? title.substring(0, 14) + '…' : title
                );

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: shortLabels,
                        datasets: [{
                            label: 'Gross Worldwide',
                            data: movieData,
                            borderColor: '#ED1D24',
                            borderWidth: 2.5,
                            pointBackgroundColor: '#1A1A1A',
                            pointBorderColor: '#ED1D24',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            pointHoverBackgroundColor: '#FFCC00',
                            pointHoverBorderColor: '#1A1A1A',
                            fill: true,
                            backgroundColor: gradient,
                            tension: 0.3,
                            cubicInterpolationMode: 'monotone',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        layout: {
                            padding: { top: 10, right: 10, bottom: 0, left: 0 }
                        },
                        interaction: { mode: 'index', intersect: false },
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1A1A1A',
                                titleColor: '#FFCC00',
                                bodyColor: '#FFFFFF',
                                titleFont: { family: 'monospace', size: 11, weight: 'bold' },
                                bodyFont: { family: 'monospace', size: 11 },
                                borderColor: '#333',
                                borderWidth: 1,
                                padding: 10,
                                displayColors: false,
                                callbacks: {
                                    title: function (context) {
                                        // Tampilkan judul lengkap (tidak dipotong) di tooltip
                                        return movieLabels[context[0].dataIndex];
                                    },
                                    label: function (context) {
                                        return 'Worldwide: $' + context.parsed.y.toLocaleString();
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                border: { color: 'rgba(255,255,255,0.08)' },
                                ticks: {
                                    color: '#737373',
                                    font: { family: 'monospace', size: 9, weight: 'bold' },
                                    maxRotation: 0,
                                    minRotation: 0,
                                    autoSkip: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(255,255,255,0.05)' },
                                border: { display: false },
                                ticks: {
                                    color: '#525252',
                                    font: { family: 'monospace', size: 9 },
                                    maxTicksLimit: 6,
                                    callback: function (value) {
                                        if (value >= 1e9) return '$' + (value / 1e9).toFixed(1) + 'B';
                                        if (value >= 1e6) return '$' + (value / 1e6).toFixed(0) + 'M';
                                        return '$' + value;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endif
@endsection