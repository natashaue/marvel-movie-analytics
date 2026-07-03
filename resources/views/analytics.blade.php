@extends('layouts.app')

@section('page-title', 'ANALYTICS')
@section('page-subtitle', 'Insight dan statistik dari seluruh koleksi data film Marvel Cinematic Universe.')

@section('content')

    <div class="space-y-6">

        {{-- Statistics Overview --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Total Movies --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <p class="text-xs text-neutral-500 uppercase tracking-wider mb-1">Total Movies</p>
                <p class="text-2xl font-bold text-white">{{ number_format($totalMovies) }}</p>
            </div>

            {{-- Highest Revenue --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <p class="text-xs text-neutral-500 uppercase tracking-wider mb-1">Highest Revenue</p>
                <p class="text-2xl font-bold text-[#FFCC00]">${{ number_format($highestRevenue) }}</p>
            </div>

            {{-- Lowest Revenue --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <p class="text-xs text-neutral-500 uppercase tracking-wider mb-1">Lowest Revenue</p>
                <p class="text-2xl font-bold text-neutral-400">${{ number_format($lowestRevenue) }}</p>
            </div>

            {{-- Average Revenue --}}
            <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                <p class="text-xs text-neutral-500 uppercase tracking-wider mb-1">Average Revenue</p>
                <p class="text-2xl font-bold text-white">${{ number_format($averageRevenue) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Top 10 Highest Grossing Movies --}}
            <div class="lg:col-span-2 bg-[#1A1A1A] border border-neutral-800 p-6">
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Top 10 Highest Grossing Movies</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-neutral-800 text-left text-neutral-500 uppercase text-xs tracking-widest">
                                <th class="py-2 pr-4 w-12">#</th>
                                <th class="py-2 pr-4">Title</th>
                                <th class="py-2 pr-4 text-right">Worldwide Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topMovies as $index => $movie)
                                <tr class="border-b border-neutral-800/50 hover:bg-white/5 transition-colors duration-150">
                                    <td class="py-2.5 pr-4 text-neutral-500 text-xs">{{ $index + 1 }}</td>
                                    <td class="py-2.5 pr-4 text-white font-medium">{{ $movie->title }}</td>
                                    <td class="py-2.5 pr-4 text-right text-[#FFCC00] font-medium">${{ number_format($movie->worldwide) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-6 text-center text-neutral-600 text-sm">
                                        Tidak ada data film.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="space-y-6">

                {{-- Top Distributors --}}
                <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Top Distributors</h3>
                    <div class="space-y-3">
                        @forelse($topDistributors as $distributor)
                            <div class="flex items-center justify-between border-b border-neutral-800/50 pb-3 last:border-0 last:pb-0">
                                <span class="text-sm text-white">{{ $distributor->distributor }}</span>
                                <span class="text-xs text-neutral-400 bg-neutral-800 px-2.5 py-0.5 rounded">{{ $distributor->total }} film</span>
                            </div>
                        @empty
                            <p class="text-center text-neutral-600 text-sm py-4">Tidak ada data distributor.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Dataset Summary --}}
                <div class="bg-[#1A1A1A] border border-neutral-800 p-6">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Dataset Summary</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between border-b border-neutral-800/50 pb-3">
                            <span class="text-sm text-neutral-400">Total Movies</span>
                            <span class="text-sm text-white font-semibold">{{ number_format($totalMovies) }}</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-neutral-800/50 pb-3">
                            <span class="text-sm text-neutral-400">Total Distributors</span>
                            <span class="text-sm text-white font-semibold">{{ number_format($totalDistributors) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-neutral-400">Highest Revenue Movie</span>
                            <span class="text-sm text-[#FFCC00] font-semibold text-right truncate max-w-[140px]">
                                {{ $highestRevenueMovie->title ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection