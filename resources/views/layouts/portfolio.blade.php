<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DevPrecious@Terminal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-green-500 font-mono antialiased h-full flex flex-col selection:bg-green-900 selection:text-white">
    <div class="scanlines"></div>
    
    <header class="border-b border-green-900 bg-black/90 backdrop-blur sticky top-0 z-40">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-lg font-bold hover:text-white transition flex items-center gap-2">
                <span class="text-blue-400">root@devprecious</span>:<span class="text-blue-600">~</span>$ <span class="cursor"></span>
            </a>
            <div class="space-x-6 text-sm">
                <a href="{{ route('home') }}" class="hover:text-white hover:underline decoration-green-500 underline-offset-4 transition {{ request()->routeIs('home') ? 'text-white underline' : 'text-gray-500' }}">./home</a>
                <a href="{{ route('about') }}" class="hover:text-white hover:underline decoration-green-500 underline-offset-4 transition {{ request()->routeIs('about') ? 'text-white underline' : 'text-gray-500' }}">./about</a>
                <a href="{{ route('projects.index') }}" class="hover:text-white hover:underline decoration-green-500 underline-offset-4 transition {{ request()->routeIs('projects.*') ? 'text-white underline' : 'text-gray-500' }}">./projects</a>
                <a href="{{ route('blog.index') }}" class="hover:text-white hover:underline decoration-green-500 underline-offset-4 transition {{ request()->routeIs('blog.*') ? 'text-white underline' : 'text-gray-500' }}">./blog</a>
            </div>
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-4 py-8 relative z-10">
        @yield('content')
    </main>

    <footer class="border-t border-green-900 py-4 mt-auto bg-black text-xs">
        <div class="container mx-auto px-4 flex justify-between text-gray-600">
            <p>STATUS: ONLINE | SYSTEM: LARAVEL v{{ Illuminate\Foundation\Application::VERSION }}</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-green-500 transition">[GITHUB]</a>
                <a href="#" class="hover:text-green-500 transition">[LINKEDIN]</a>
                <a href="#" class="hover:text-green-500 transition">[TWITTER]</a>
            </div>
        </div>
    </footer>
</body>
</html>
