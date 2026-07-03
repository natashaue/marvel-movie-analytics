<div class="flex items-center justify-between px-6 lg:px-10 h-20">

    {{-- Page Title --}}
    <div>
        <h1 class="text-2xl font-bold text-white">
            @yield('page-title', 'Dashboard')
        </h1>

        <p class="text-sm text-neutral-400 mt-1">
            @yield('page-subtitle')
        </p>
    </div>

    {{-- Search (Only Movies Page) --}}
    @hasSection('show-search')
        <form action="{{ route('movies.index') }}" method="GET" class="hidden md:block w-full max-w-sm">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-neutral-500"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/>
                </svg>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search movies..."
                    class="w-full bg-neutral-900 border border-neutral-700 rounded-lg py-2.5 pl-10 pr-4 text-sm text-white placeholder-neutral-500 focus:outline-none focus:border-red-600">
            </div>
        </form>
    @endif

</div>