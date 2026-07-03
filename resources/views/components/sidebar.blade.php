{{--
    resources/views/components/sidebar.blade.php
    Dipanggil dari layouts/app.blade.php via @include('components.sidebar')
--}}

<div class="flex flex-col h-full w-full">

    {{-- ============================== --}}
    {{-- LOGO / BRAND (Tegak & Stretch) --}}
    {{-- ============================== --}}
    <div class="flex items-center h-20 px-6 border-b border-neutral-800 shrink-0">
        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
            <span class="text-2xl font-black tracking-tighter uppercase scale-y-125 text-[#ED1D24] group-hover:text-white transition-colors duration-200">
                MARVEL
            </span>
            <span class="text-[10px] font-bold tracking-[0.2em] text-neutral-500 uppercase mt-1">
                Analytics
            </span>
        </a>
    </div>

    {{-- ============================== --}}
    {{-- NAVIGATION                      --}}
    {{-- ============================== --}}
    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1">

        <p class="px-3 mb-2 text-[10px] font-bold tracking-[0.15em] text-neutral-600 uppercase">
            Menu Utama
        </p>

        <!-- 1. DASHBOARD -->
        <a href="{{ route('dashboard') ?? '#' }}"
           class="group flex items-center gap-3 px-3 py-2.5 text-sm font-semibold border-l-2
                  {{ request()->routeIs('dashboard') ? 'text-white border-[#ED1D24] bg-white/5' : 'text-neutral-400 border-transparent hover:text-white hover:border-[#ED1D24] hover:bg-white/5' }}
                  transition-all duration-150">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6a2.25 2.25 0 012.25-2.25h12A2.25 2.25 0 0120.25 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
            Dashboard
        </a>

        <!-- 2. MOVIES -->
        <a href="{{ route('movies') ?? '#' }}"
           class="group flex items-center gap-3 px-3 py-2.5 text-sm font-semibold border-l-2
                  {{ request()->routeIs('movies') ? 'text-white border-[#ED1D24] bg-white/5' : 'text-neutral-400 border-transparent hover:text-white hover:border-[#ED1D24] hover:bg-white/5' }}
                  transition-all duration-150">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
            </svg>
            Movies Data
        </a>

        <!-- 3. ANALYTICS -->
        <a href="{{ route('analytics') ?? '#' }}"
           class="group flex items-center gap-3 px-3 py-2.5 text-sm font-semibold border-l-2
                  {{ request()->routeIs('analytics') ? 'text-white border-[#ED1D24] bg-white/5' : 'text-neutral-400 border-transparent hover:text-white hover:border-[#ED1D24] hover:bg-white/5' }}
                  transition-all duration-150">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
            Analytics
        </a>

        <!-- 4. ABOUT -->
        <a href="{{ route('about') ?? '#' }}"
           class="group flex items-center gap-3 px-3 py-2.5 text-sm font-semibold border-l-2
                  {{ request()->routeIs('about') ? 'text-white border-[#ED1D24] bg-white/5' : 'text-neutral-400 border-transparent hover:text-white hover:border-[#ED1D24] hover:bg-white/5' }}
                  transition-all duration-150">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
            About App
        </a>

    </nav>

</div>