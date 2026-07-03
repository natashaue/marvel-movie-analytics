<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Marvel Panel</title>

    @vite(['resources/css/app.css'])

    {{-- Custom Styles dari setiap halaman --}}
    @stack('styles')
</head>

<body class="bg-[#0B0B0B] text-white antialiased selection:bg-[#ED1D24] selection:text-white">

    <div class="flex min-h-screen w-full bg-[#0B0B0B]">

        {{-- Sidebar --}}
        <aside class="hidden lg:flex lg:flex-col w-64 shrink-0 bg-black border-r border-neutral-800">
            @include('components.sidebar')
        </aside>

        {{-- Main Content --}}
        <div class="flex flex-1 flex-col min-h-screen relative overflow-hidden">

            {{-- Background Decoration --}}
            <div class="pointer-events-none absolute -top-10 -right-10 w-40 h-40 bg-[#ED1D24]/10 rotate-45 blur-2xl"></div>

            {{-- Navbar --}}
            <header class="sticky top-0 z-40 border-b border-neutral-800 bg-[#0B0B0B]/95 backdrop-blur">
                @include('components.navbar')
            </header>

            {{-- Content --}}
            <main class="flex-1 w-full px-6 py-8 lg:px-10 lg:py-10">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="border-t border-neutral-800 bg-black">
                @include('components.footer')
            </footer>

        </div>
    </div>

    {{-- Custom Scripts dari setiap halaman (Chart.js, dsb.) --}}
    @stack('scripts')

</body>

</html>