<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Kost') - Kost Manager</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .active-nav { background-color: rgba(255,255,255,0.15); border-radius: 0.5rem; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out forwards; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="bg-gradient-to-r from-blue-600 to-indigo-600 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                {{-- Logo --}}
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4l4 2m-8-4l4-2"></path></svg>
                    </div>
                    <span class="text-lg font-bold text-white tracking-wide">Kost<span class="font-normal opacity-80">Manager</span></span>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}">Dashboard</a>
                    <a href="{{ route('kamar.index') }}" class="px-3 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->routeIs('kamar.*') ? 'active-nav' : '' }}">Data Kamar</a>
                    <a href="{{ route('penyewa.index') }}" class="px-3 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->routeIs('penyewa.*') ? 'active-nav' : '' }}">Penyewa</a>
                    <a href="{{ route('kontrak-sewa.index') }}" class="px-3 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->routeIs('kontrak-sewa.*') ? 'active-nav' : '' }}">Kontrak</a>
                    <a href="{{ route('pembayaran.index') }}" class="px-3 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition {{ request()->routeIs('pembayaran.*') ? 'active-nav' : '' }}">Pembayaran</a>
                </div>

                {{-- User Profile / Logout (Placeholder) --}}
                <div class="hidden md:flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-indigo-800 border-2 border-indigo-400 flex items-center justify-center text-xs text-white font-bold">
                        A
                    </div>
                </div>

                {{-- Mobile Button --}}
                <div class="md:hidden">
                    <button class="text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-grow max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

</body>
</html>