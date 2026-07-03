@extends('layouts.app')

@section('page-title', 'MOVIES')
@section('page-subtitle', 'Seluruh koleksi data film Marvel Cinematic Universe.')

@section('content')

    <div class="bg-[#1A1A1A] border border-neutral-800 p-6">

        {{-- SEARCH + PAGINATION --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            {{-- Search Box --}}
            <div class="w-full md:w-72">
                <form action="{{ route('movies') }}" method="GET" class="relative">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari judul film..."
                           class="w-full bg-black border border-neutral-800 pl-10 pr-4 py-2 text-sm text-white placeholder-neutral-600 focus:outline-none focus:border-[#ED1D24] transition-colors duration-150" />
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-neutral-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </form>
            </div>

            {{-- Pagination Controls --}}
            @if($movies->hasPages())
                <div class="flex items-center gap-3 flex-wrap">
                    {{-- Info --}}
                    <span class="text-xs text-neutral-500 whitespace-nowrap">
                        <span class="text-white font-semibold">{{ $movies->firstItem() }}</span>–<span class="text-white font-semibold">{{ $movies->lastItem() }}</span>
                        dari <span class="text-white font-semibold">{{ $movies->total() }}</span>
                    </span>

                    {{-- Pagination Links --}}
                    <nav class="flex items-center gap-1" aria-label="Pagination">
                        {{-- First Page --}}
                        @if ($movies->onFirstPage())
                            <span class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-600 cursor-not-allowed text-xs" aria-hidden="true">«</span>
                        @else
                            <a href="{{ $movies->url(1) }}"
                               class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-400 hover:border-[#ED1D24] hover:text-white transition-colors duration-150 text-xs"
                               aria-label="First page">«</a>
                        @endif

                        {{-- Previous --}}
                        @if ($movies->onFirstPage())
                            <span class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-600 cursor-not-allowed" aria-hidden="true">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $movies->previousPageUrl() }}"
                               class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-400 hover:border-[#ED1D24] hover:text-white transition-colors duration-150"
                               aria-label="Previous page">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                        @endif

                        {{-- Pages with ellipsis --}}
                        @php
                            $currentPage = $movies->currentPage();
                            $lastPage = $movies->lastPage();
                            $start = max(1, $currentPage - 2);
                            $end = min($lastPage, $currentPage + 2);

                            if ($start > 1) {
                                echo '<span class="w-7 h-7 flex items-center justify-center text-neutral-500 text-xs">…</span>';
                            }

                            for ($page = $start; $page <= $end; $page++) {
                                $url = $movies->url($page);
                                if ($page == $currentPage) {
                                    echo '<span class="w-7 h-7 flex items-center justify-center bg-[#ED1D24] text-white text-xs font-bold" aria-current="page">' . $page . '</span>';
                                } else {
                                    echo '<a href="' . $url . '" class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-400 text-xs hover:border-[#ED1D24] hover:text-white transition-colors duration-150">' . $page . '</a>';
                                }
                            }

                            if ($end < $lastPage) {
                                echo '<span class="w-7 h-7 flex items-center justify-center text-neutral-500 text-xs">…</span>';
                            }
                        @endphp

                        {{-- Next --}}
                        @if ($movies->hasMorePages())
                            <a href="{{ $movies->nextPageUrl() }}"
                               class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-400 hover:border-[#ED1D24] hover:text-white transition-colors duration-150"
                               aria-label="Next page">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @else
                            <span class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-600 cursor-not-allowed" aria-hidden="true">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        @endif

                        {{-- Last Page --}}
                        @if ($movies->currentPage() == $movies->lastPage())
                            <span class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-600 cursor-not-allowed text-xs" aria-hidden="true">»</span>
                        @else
                            <a href="{{ $movies->url($movies->lastPage()) }}"
                               class="w-7 h-7 flex items-center justify-center border border-neutral-800 text-neutral-400 hover:border-[#ED1D24] hover:text-white transition-colors duration-150 text-xs"
                               aria-label="Last page">»</a>
                        @endif
                    </nav>
                </div>
            @endif

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-neutral-800 text-left text-neutral-500 uppercase text-xs tracking-widest">
                        <th class="py-3 pr-4 w-12">No</th>
                        <th class="py-3 pr-4">Title</th>
                        <th class="py-3 pr-4">Distributor</th>
                        <th class="py-3 pr-4">Release Date</th>
                        <th class="py-3 pr-4">Budget</th>
                        <th class="py-3 pr-4">Worldwide Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movies as $movie)
                        <tr class="border-b border-neutral-800 hover:bg-white/5 transition-colors duration-150">
                            <td class="py-3 pr-4 text-neutral-500">
                                {{ $movies->firstItem() + $loop->index }}
                            </td>
                            <td class="py-3 pr-4 text-white font-semibold">
                                {{ $movie->title }}
                            </td>
                            <td class="py-3 pr-4 text-neutral-400">
                                {{ $movie->distributor }}
                            </td>
                            <td class="py-3 pr-4 text-neutral-400">
                                {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d M Y') : '-' }}
                            </td>
                            <td class="py-3 pr-4 text-neutral-400">
                                ${{ number_format($movie->budget) }}
                            </td>
                            <td class="py-3 pr-4 text-[#FFCC00]">
                                ${{ number_format($movie->worldwide) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-neutral-600">
                                Tidak ada data film yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection